const User = require('../models/User');
const bcryptjs = require('bcryptjs');
const config = require('../config/common');
const jwt = require('jsonwebtoken');
const nodemailer = require('nodemailer');
const randomstring = require('randomstring');
const fs = require('fs')

const sendResetPasswordMail = async (name, email, token) => {
    try {
        const transport = nodemailer.createTransport({
            host: "smtp.gmail.com",
            port: 587,
            secure: false,
            requireTLS: true,
            auth: {
                user: "aarif.theoneandonly@gmail.com",
                pass: "P@ssw0rd4912"
            }
        });
        const mailOptions = {
            from: config.mail.auth.user,
            to: email,
            subject: 'For Rest Password',
            html: '<p> Hi ' + name + ', <br/> Please click the below link to reset your password. <br/><a href="http://localhost:3000/api/reset-password?token=' + token + '" target="_blank"> Reset Password </a></p>'
        }
        transport.sendMail(mailOptions, (err, info) => {
            if (err) {
                console.log(err.message);
            } else {
                console.log("Mail has been sent:- ", info.response);
            }
        });
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const createToken = async (id) => {
    try {
        const token = jwt.sign({ _id: id }, config.secret_jwt)
        return token;
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const securePassword = async (password) => {
    try {
        const passwordHashed = await bcryptjs.hash(password, 10);
        return passwordHashed;
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const passwordCheck = async (userPassword, dbPassword) => {
    try {
        const passwordMatch = await bcryptjs.compare(userPassword, dbPassword);
        return passwordMatch;
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const register = async (req, res) => {
    try {
        const spassword = await securePassword(req.body.password);
        const user = new User({
            name: req.body.name,
            email: req.body.email,
            mobile: req.body.mobile,
            password: spassword,
            avatar: req.file.filename,
            role: req.body.role
        });
        const userExist = await User.findOne({ email: req.body.email });
        if (!userExist) {
            const userData = await user.save();
            res.status(200).send({ success: true, data: userData });
        } else {
            res.status(400).send({ success: false, msg: "User already exists" });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const login = async (req, res) => {
    try {
        const email = req.body.email;
        const password = req.body.password;
        const user = await User.findOne({ email: req.body.email });
        if (user) {
            const passwordMatched = await passwordCheck(password, user.password);
            if (passwordMatched) {
                const tokenData = await createToken(user._id);
                const userData = {
                    _id: user._id,
                    name: user.name,
                    email: user.email,
                    mobile: user.mobile,
                    password: user.password,
                    avatar: user.avatar,
                    role: user.role,
                    token: tokenData
                };
                const response = {
                    success: true,
                    msg: "User Details",
                    data: userData
                };
                res.status(200).send(response);
            } else {
                res.status(400).send({ success: false, msg: "Invalid login credentials" });
            }
        } else {
            res.status(400).send({ success: false, msg: "Invalid login credentials" });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const updatePassword = async (req, res) => {
    try {
        const userId = req.body.user_id;
        const password = req.body.password;
        const data = await User.findOne({ _id: userId });
        if (data) {
            const newPassword = await securePassword(password);
            const userData = await User.findByIdAndUpdate({ _id: userId }, {
                $set: {
                    password: newPassword
                }
            });
            res.status(200).send({ success: true, msg: "Your password has been updated" })
        } else {
            res.status(200).send({ success: false, msg: "User not found" });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const forgetPassword = async (req, res) => {
    try {
        const email = req.body.email;
        const userData = await User.findOne({ email: email });
        if (userData) {
            const newToken = randomstring.generate();
            const data = await User.updateOne({ email: email }, {
                $set: {
                    token: newToken
                }
            });
            await sendResetPasswordMail(userData.name, userData.email, newToken);
            res.status(200).send({ success: true, msg: "Please check your email inbox for reset your password" });
        } else {
            res.status(200).send({ success: false, msg: "This email does not exists" });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const resetPassword = async (req, res) => {
    try {
        const token = req.query.token;
        const tokenData = await User.findOne({ token: token });
        if (tokenData) {
            const password = req.body.password;
            const newPassword = await securePassword(password);
            const updateduser = User.findByIdAndUpdate({ _id: tokenData.id }, {
                $set: {
                    password: newPassword,
                    token: ''
                }
            }, { new: true });
            return res.status(200).send({ success: true, msg: "Password Reset Successfully", data: updateduser });
        } else {
            return res.status(200).send({ success: true, msg: "Password Reset link has been expired" });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const renewToken = async (id) => {
    try {
        const secret_jwt = config.secret_jwt;
        const newSecretJwt = randomstring.generate();
        fs.readFile('config/common.js', 'utf-8', (err, data) => {
            if (err) throw err;
            const newVal = data.replace(new RegExp(secret_jwt, "g"), newSecretJwt);
            fs.writeFile('config/common.js', newVal, 'utf-8', (err, data) => {
                if (err) throw err;
                console.log('Done!')
            });
        });
        const token = jwt.sign({ _id: id }, newSecretJwt);
        return token;
    } catch (error) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const refreshToken = async (req, res) => {
    try {
        const userId = req.body.user_id;
        const userData = await User.findById({ _id: userId });
        if (userData) {
            const tokenData = await renewToken(userId);
            const response = {
                user_id: userId,
                token: tokenData
            }
            return res.status(200).send({ success: true, msg: "Refresh Token Details", data: response });
        } else {
            return res.status(200).send({ success: true, msg: "User not found" });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

module.exports = {
    register, login, updatePassword, forgetPassword, resetPassword, refreshToken
}