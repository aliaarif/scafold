const mongoose = require('mongoose');

const imagesLimit = (val) => {
    return ((val.length <= 5) && (val.length > 0));
}

// Define the Product schema
const productSchema = new mongoose.Schema({

    vendor_id: {
        type: String,
        required: true,
    },
    store_id: {
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
    },
    price: {
        type: String,
        required: true,
    },
    discount: {
        type: String,
        required: true,
    },
    category_id: {
        type: String,
        required: true,
    },
    subcategory_id: {
        type: String,
        required: true,
    },
    images: {
        type: Array,
        required: true,
        validate: [imagesLimit, 'You can pass only 5 product images']
    }

});

// Create models
module.exports = mongoose.model('Product', productSchema);
