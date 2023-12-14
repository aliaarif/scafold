const auth = require('../middleware/auth')
const bodyParser = require('body-parser')
const express = require('express');
const path = require('path');

const router = express.Router();

router.use(bodyParser.json())
router.use(bodyParser.urlencoded({ extended: true }))

const CategoryController = require('../controllers/CategoryController');

router.post('/create', auth, CategoryController.create);

module.exports = router;