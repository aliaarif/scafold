const auth = require('../middleware/auth')
const bodyParser = require('body-parser')
const express = require('express');

const router = express.Router();

router.use(bodyParser.json())
router.use(bodyParser.urlencoded({ extended: true }))

const SubcategoryController = require('../controllers/SubcategoryController');

router.post('/create', auth, SubcategoryController.create);

module.exports = router;