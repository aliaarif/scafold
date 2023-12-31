const config = require('../config/common')
const jwt = require('jsonwebtoken');

const verifyToken = async (req, res, next) => {
    const token = req.body.token || req.query.token || req.headers['authorization'];

    if (!token) {
        res.status(200).send({ success: false, msg: "A token is required for authentication." })
    }

    try {

        const decode = jwt.verify(token, config.secret_jwt);
        req.user = decode;

    } catch (err) {
        res.status(400).send({ success: false, msg: "Invalid Token" });
    }

    return next();

}

module.exports = verifyToken