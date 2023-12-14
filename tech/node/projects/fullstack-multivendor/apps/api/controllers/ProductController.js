const Product = require('../models/Product');
const CategoryController = require('../controllers/CategoryController');
const StoreController = require('../controllers/StoreController');

const create = async (req, res) => {
    try {
        if (!req.files || !Array.isArray(req.files)) {
            return res.status(400).send({ success: false, msg: "Files not provided or invalid format" });
        }
        let arrImages = [];
        for (let i = 0; i < req.files.length; i++) {
            arrImages[i] = req.files[i].filename;
        }
        const productData = new Product({
            vendor_id: req.body.vendor_id,
            store_id: req.body.store_id,
            name: req.body.name,
            slug: req.body.slug,
            price: req.body.price,
            discount: req.body.discount,
            category_id: req.body.category_id,
            subcategory_id: req.body.subcategory_id,
            images: arrImages
        });
        const product = await productData.save();
        res.status(200).send({ success: true, msg: "New Product Saved!", data: product });
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const list = async (req, res) => {
    try {
        const responseData = [];
        const categories = await CategoryController.list();
        if (categories.length > 0) {
            for (let i = 0; i < categories.length; i++) {
                const productsData = [];
                const catId = categories[i]['_id'].toString();
                const catProducts = await Product.find({ category_id: catId });
                if (catProducts.length > 0) {
                    for (let j = 0; j < catProducts.length; j++) {
                        const storeData = await StoreController.single(catProducts[j]['store_id']);
                        productsData.push({
                            "name": catProducts[j]['name'],
                            "slug": catProducts[j]['slug'],
                            "address": storeData['address'],
                            "images": catProducts[j]['images'],
                        });
                    }
                }
                responseData.push({
                    "category": categories[i]['name'],
                    "products": productsData
                });
            }
            res.status(200).send({ success: true, msg: "Products Details", data: responseData });
        } else {
            res.status(200).send({ success: false, msg: "Products Details", data: responseData });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const search = async (req, res) => {
    try {
        const search = req.body.search;
        const productsData = await Product.find({ "name": { $regex: ".*" + search + ".*", $options: 'i' } });
        if (productsData.length > 0) {
            res.status(200).send({ success: true, msg: "Search Results", data: productsData });
        } else {
            res.status(200).send({ success: true, msg: "Search Results not found" });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const paginate = async (req, res) => {
    try {
        const page = req.body.page;
        const sort = req.body.sort;
        let products;
        let skip = (page <= 1) ? 0 : (page - 1) * 2;
        // if (page <= 1) {
        //     skip = 0;
        // } else {
        //     skip = (page - 1) * 2;
        // }

        if (sort) {
            let customsort;

            if (sort == 'name') {
                customsort = {
                    name: 1
                }
            } else if (sort == '_id') {
                customsort = {
                    _id: -1
                }
            }
            products = await Product.find().sort(customsort).skip(skip).limit(2);
            // res.status(200).send({ success: true, msg: "All Products", data: products });
        } else {
            products = await Product.find().skip(skip).limit(2);
            // res.status(200).send({ success: true, msg: "All Products", data: products });
        }

        res.status(200).send({ success: true, msg: "Products Details", data: products });

    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

module.exports = {
    create, search, list, paginate
}