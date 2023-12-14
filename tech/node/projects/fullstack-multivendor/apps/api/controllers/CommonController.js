
const User = require('../models/User');
const Category = require('../models/Category');
const Subcategory = require('../models/Subcategory');
const Store = require('../models/Store');
const Product = require('../models/Product');

const counts = async (req, res) => {
    try {
        const countsData = [];
        const usersCounts = await User.find().count();
        const vendorsCounts = await User.find({ role: "Vendor" }).count();
        const categoriesCounts = await Category.find().count();
        const subcategoriesCounts = await Subcategory.find().count();
        const storesCounts = await Store.find().count();
        const productsCounts = await Product.find().count();
        countsData.push({
            users: usersCounts,
            vendors: vendorsCounts,
            categories: categoriesCounts,
            subcategories: subcategoriesCounts,
            stores: storesCounts,
            products: productsCounts
        });
        res.status(200).send({ success: true, msg: `Total`, data: countsData });
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

module.exports = {
    counts
}

