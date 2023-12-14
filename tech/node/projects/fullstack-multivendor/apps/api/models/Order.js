const mongoose = require('mongoose');

// Define the Order schema
const orderSchema = new mongoose.Schema({

    product_id: {
        type: String,
        required: true,
    },
    transaction_id: {
        type: String,
        required: true
    },
    vendor_id: {
        type: String,
        required: true
    },
    store_id: {
        type: String,
        required: true
    },
    customer_id: {
        type: String,
        required: true
    }
});

// Create model
module.exports = mongoose.model('Order', orderSchema);