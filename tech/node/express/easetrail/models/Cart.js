const mongoose = require('mongoose');

// Define the Cart schema
const cartSchema = new mongoose.Schema({

    product_id: {
        type: String,
        required: true,
    },
    price: {
        type: String,
        required: true,
    },
    vendor_id: {
        type: String,
        required: true,
    },
    store_id: {
        type: String,
        required: true,
    },

});

// Create model
module.exports = mongoose.model('Cart', cartSchema);