const auth = require('../middleware/auth')
const bodyParser = require('body-parser')
const express = require('express');

const router = express.Router();

router.use(bodyParser.json())
router.use(bodyParser.urlencoded({ extended: true }))

const AddressController = require('../controllers/AddressController');

router.post('/create', auth, AddressController.create);

module.exports = router;