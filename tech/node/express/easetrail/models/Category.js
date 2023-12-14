const mongoose = require('mongoose');

// Define the Category schema
const categorySchema = new mongoose.Schema({

  name: {
    type: String,
    required: true,
  },
  slug: {
    type: String,
    unique: true,
    required: true,
  },
  status: {
    type: String,
    default: "Inactive"
  },
  // parent: { type: mongoose.Schema.Types.ObjectId, ref: 'Category', default: null },

});

// Create model
module.exports = mongoose.model('Category', categorySchema);