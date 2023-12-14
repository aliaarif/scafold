const auth = require('../middleware/auth')
const bodyParser = require('body-parser')
const express = require('express');
const path = require('path');

const router = express.Router();

router.use(bodyParser.json())
router.use(bodyParser.urlencoded({ extended: true }))

const CartController = require('../controllers/CartController');

router.post('/add-to-cart', auth, CartController.addToCart);

module.exports = router;