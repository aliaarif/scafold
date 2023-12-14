var express = require('express');
var router = express.Router();

const { Category } = require('../models/Category');


// router.use(function(req, res, next){
//   next();
// });

router.get('/', async (req, res, next) => {  
  const categories =  await Category.find({parent_id: 0});
  res.render('categories', { title: 'Business Categories :: Easetrail',  categories: categories});
});


/* GET home page. */
// router.get('/', async (req, res, next) => {  
//   const categories = Category.find({ parent: []  }, (err, categories) => {
//     if (err) {
//       console.error(err);
//       // Handle the error
//     } else {
//       // console.log(categories);
//       res.render('categories', { title: 'Business Categories :: Easetrail',  categories: categories});
//       // Process the categories with an empty array of subcategories
//     }
//   });
// });




/* GET all page. */
router.get('/:city/:query?', async (req, res, next) => {
  // const firstParam = req.params.city
  const secondParam = req.params.query

  if (!secondParam) {
    const categories =  await Category.find({parentId: 0});
    res.render('categories', { title: 'Business Categories :: Easetrail',  categories: categories});
  } else {
    if (!secondParam.includes('-in-') && !secondParam.includes('-id-')) {
        const category =  await Category.findOne({slug: secondParam});
        const id = category._id;
        res.send(id)
        // const categories =  await Category.find({parent_id: category._id});
        
        // if(categories){
        //   res.send(categories)
        //   // res.render('categories', { title: 'Business Categories :: Easetrail',  categories: categories});
        // }else{
        //   res.send('No');
        //   // res.render('businesses', { title: 'Business List' });
          
        // }
    } else {

      if (secondParam.includes('-in-') && !secondParam.includes('-id-')) {
        res.render('businesses', { title: 'Business List' });
      } else {
        res.render('details', { title: 'Business Detail' });
      }
    }
  }
});





module.exports = router;
