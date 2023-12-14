const mongoose = require('mongoose');

// Define the Address schema
const addressSchema = new mongoose.Schema({

    user_id: {
        type: String,
        required: true,
    },
    address: {
        type: Array,
        required: true
    }
});

// Create model
module.exports = mongoose.model('Address', addressSchema);