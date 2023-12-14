const mongoose = require('mongoose');

// Define the Business schema
const businessSchema = new mongoose.Schema({
  name: {
    type: String,
    required: true,
  },
  category: {
    type: mongoose.Schema.Types.ObjectId,
    ref: 'Category',
    required: true,
  },
  // Add other business-related fields as needed
});

// Create models
const Business = mongoose.model('Business', businessSchema);

module.exports = { Business };
