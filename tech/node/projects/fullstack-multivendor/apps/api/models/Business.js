const mongoose = require('mongoose');

const imagesLimit = (val) => {
  return ((val.length <= 5) && (val.length > 0));
}

// Define the Business schema
const businessSchema = new mongoose.Schema({
  user_id: {
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
  name: {
    type: String,
    required: true
  },
  slug: {
    type: String,
    required: true,
  },
  email: {
    type: String,
    required: true,
  },
  locality: {
    type: String,
    required: true,
  },
  city: {
    type: String,
    required: true,
  },
  state: {
    type: String,
    required: true,
  },
  country: {
    type: String,
    default: "India"
  },
  pin: {
    type: String,
    required: true,
  },
  location: {
    type: { type: String, required: true },
    coordinates: [],
  },
  logo: {
    type: String,
    required: false,
    default: null
  },
  images: {
    type: Array,
    required: true,
    validate: [imagesLimit, 'You can pass only 5 product images']
  }
  // Add other business-related fields as needed
});

businessSchema.index({ location: "2dsphere" })

// Create model
module.exports = mongoose.model('Business', businessSchema);

