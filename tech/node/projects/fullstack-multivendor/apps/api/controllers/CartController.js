
const Product = require('../models/Product');
const Cart = require('../models/Cart');

const addToCart = async (req, res) => {
    try {
        const cartObj = new Cart({
            product_id: req.body.product_id,
            price: req.body.price,
            vendor_id: req.body.vendor_id,
            store_id: req.body.store_id
        });
        const cartData = await cartObj.save();
        res.status(200).send({ success: true, msg: 'Product Added into Cart', data: cartData });
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

module.exports = {
    addToCart
}