const mongoose = require('mongoose');

// Define the store schema
const storeSchema = new mongoose.Schema({

  vendor_id: {
    type: String,
    required: true,
  },
  logo: {
    type: String,
    required: true,
  },
  business_email: {
    type: String,
    required: true,
  },
  address: {
    type: String,
    required: true,
  },
  pin: {
    type: String,
    required: true,
  },
  location: {
    type: { type: String, required: true },
    coordinates: [],
  }

});

storeSchema.index({ location: "2dsphere" })

// Create model
module.exports = mongoose.model('Store', storeSchema);
