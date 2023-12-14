
const Order = require('../models/Order');

const create = async (req, res) => {
    try {
        const order = new Order({
            product_id: req.body.product_id,
            transaction_id: req.body.transaction_id,
            vendor_id: req.body.vendor_id,
            store_id: req.body.store_id,
            customer_id: req.body.customer_id
        });
        const orderData = await order.save();
        res.status(200).send({ success: true, msg: "Order Details", data: orderData });

    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

module.exports = {
    create
}