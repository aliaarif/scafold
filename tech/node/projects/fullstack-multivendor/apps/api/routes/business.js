const auth = require('../middleware/auth')
const bodyParser = require('body-parser')
const express = require('express');
const multer = require('multer');
const path = require('path');

const router = express.Router();

router.use(bodyParser.json())
router.use(bodyParser.urlencoded({ extended: true }))
router.use(express.static('./public'));

// const logoStorage = multer.diskStorage({
//     destination: (req, file, cb) => {
//         cb(null, path.join(__dirname, '../public/images/businesses/logos'), (error1, success1) => {
//             if (error1) throw error1
//         })
//     },
//     filename: (req, file, cb) => {
//         const name = Date.now() + '-' + file.originalname;
//         cb(null, name, (error2, success2) => {
//             if (error2) throw error2
//         })
//     }
// });


const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, path.join(__dirname, '../public/images/businesses'), (error1, success1) => {
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

// const logoUpload = multer({ storage: logoStorage });
const upload = multer({ storage: storage });

const BusinessController = require('../controllers/BusinessController');

router.post('/create', auth, upload.array('images'), BusinessController.create);

router.get('/search', auth, BusinessController.search);
router.get('/nearest', auth, BusinessController.nearest);
router.get('/list', auth, BusinessController.list);
router.post('/paginate', auth, BusinessController.paginate);

module.exports = router;