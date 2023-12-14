
const Address = require('../models/Address');
const User = require('../models/User');

const create = async (req, res) => {
    try {
        const data = await Address.findOne({ user_id: req.body.user_id });
        if (data) {
            const addresses = [];
            for (let i = 0; i < data.address.length; i++) {
                addresses.push(data.address[i]);
            }
            addresses.push(req.body.address);
            const updatedAddress = await Address.findOneAndUpdate(
                { user_id: req.body.user_id },
                { $set: { address: addresses } },
                { returnDocument: "after" }
            );
            res.status(200).send({ success: true, msg: "Address Detaild", data: updatedAddress });
        } else {
            const address = new Address({
                user_id: req.body.user_id,
                address: req.body.address
            });
            const addressData = await address.save();
            res.status(200).send({ success: true, msg: "Address Detaild", data: addressData });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

module.exports = {
    create
}