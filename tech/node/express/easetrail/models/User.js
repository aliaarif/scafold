const mongoose = require('mongoose');

// Define the User schema
const userSchema = new mongoose.Schema({

  name: {
    type: String,
    required: true,
  },
  email: {
    type: String,
    required: true,
  },
  mobile: {
    type: String,
    required: true,
  },
  password: {
    type: String,
    required: true,
  },
  avatar: {
    type: String,
    required: true,
  },
  role: {
    type: String,
    required: true,
    default: "User"
  },
  token: {
    type: String,
    default: ''
  }

});

// Create model
module.exports = mongoose.model('User', userSchema);