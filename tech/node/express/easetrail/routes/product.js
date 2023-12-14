const auth = require('../middleware/auth')
const bodyParser = require('body-parser')
const express = require('express');
const multer = require('multer');
const path = require('path');

const router = express.Router();

router.use(bodyParser.json())
router.use(bodyParser.urlencoded({ extended: true }))
router.use(express.static('./public'));

const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, path.join(__dirname, '../public/images/products'), (error1, success1) => {
      if (error1) throw error1
    })
  },
  filename: (req, file, cb) => {
    const name = Date.now() + '-' + file.originalname;
    cb(null, name, (error2, success2) => {
      if (error2) throw error2
    })
  }
});

const upload = multer({ storage: storage });

const ProductController = require('../controllers/ProductController');

router.post('/create', auth, upload.array('images'), ProductController.create);
router.get('/search', auth, ProductController.search);
router.get('/list', auth, ProductController.list);
router.post('/paginate', auth, ProductController.paginate);

module.exports = router;