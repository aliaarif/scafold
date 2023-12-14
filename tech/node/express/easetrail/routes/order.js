const auth = require('../middleware/auth')
const bodyParser = require('body-parser')
const express = require('express');

const router = express.Router();

router.use(bodyParser.json())
router.use(bodyParser.urlencoded({ extended: true }))

const OrderController = require('../controllers/OrderController');

router.post('/create', auth, OrderController.create);

module.exports = router;