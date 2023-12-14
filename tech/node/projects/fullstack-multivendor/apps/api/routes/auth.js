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
    cb(null, path.join(__dirname, '../public/images/avatars'), (error1, success1) => {
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

const UserController = require('../controllers/UserController');

router.get('/', async (req, res, next) => {
  res.send({ 'Restfull API In': 'Node.js using Express.js' });
})

router.post('/register', upload.single('avatar'), UserController.register);
router.post('/login', UserController.login);
router.post('/update-password', auth, UserController.updatePassword);
router.post('/forget-password', UserController.forgetPassword);
router.get('/reset-password', UserController.resetPassword);
router.post('/refresh-token', auth, UserController.refreshToken);

module.exports = router;