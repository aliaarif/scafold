const addressRouter = require('./routes/address');
const authRouter = require('./routes/auth');
const commonRouter = require('./routes/common');
const cartRouter = require('./routes/cart');
const categoryRouter = require('./routes/category');
const subcategoryRouter = require('./routes/subcategory');
const storeRouter = require('./routes/store');
const productRouter = require('./routes/product');
const businessRouter = require('./routes/business');
const requirementRouter = require('./routes/requirement');
const orderRouter = require('./routes/order');

const createError = require('http-errors');
const express = require('express');
const logger = require('morgan');

// const cookieParser = require('cookie-parser');
// const bodyParser = require('body-parser')
// const path = require('path');

const app = express();



const mongoose = require('mongoose');
// Connect to MongoDB
mongoose.connect('mongodb://localhost:27017/sample');
// Handle connection events
const db = mongoose.connection;
db.on('error', console.error.bind(console, 'MongoDB connection error:'));
db.once('open', () => { console.log('Connected to MongoDB'); });

app.use(logger('dev'));
app.use(express.json());

// view engine setup
// app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
// app.use(express.static('./public'));
// app.use(express.static(path.join(__dirname, 'public')));
// app.use(cookieParser());
// app.use(bodyParser);
// app.use(express.urlencoded({ extended: true }));



app.use('/api', authRouter);
app.use('/api/addresses', addressRouter);
app.use('/api', cartRouter);
app.use('/api/common', commonRouter);
app.use('/api/categories', categoryRouter);
app.use('/api/subcategories', subcategoryRouter);
app.use('/api/products', productRouter);
app.use('/api/businesses', businessRouter);
app.use('/api/requirements', requirementRouter);
app.use('/api/stores', storeRouter);
app.use('/api/orders', orderRouter);



// catch 404 and forward to error handler
app.use(function (req, res, next) {
  next(createError(404));
});

// error handler
app.use(function (err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

// Start the server
const PORT = process.env.PORT || 8000;
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});


// app.listen(PORT, () => console.log(`Server running on port ${PORT}`));

// module.exports = app;
