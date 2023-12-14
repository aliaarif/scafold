const mongoose = require('mongoose');

// Define the Subcategory schema
const subcategorySchema = new mongoose.Schema({

    category_id: {
        type: String,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    slug: {
        type: String,
        unique: true,
        required: true,
    }

});

// Create model
module.exports = mongoose.model('Subcategory', subcategorySchema);