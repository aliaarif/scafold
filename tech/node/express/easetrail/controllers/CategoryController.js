const Category = require('../models/Category');

const create = async (req, res) => {
    try {
        const categories = await Category.find();
        if (categories.length > 0) {
            let checking = false;
            for (let i = 0; i < categories.length; i++) {
                if (categories[i]['slug'].toLowerCase() === req.body.slug.toLowerCase()) {
                    checking = true;
                    break;
                }
            }
            // console.log(checking);
            if (checking === false) {
                const category = new Category({
                    name: req.body.name,
                    slug: req.body.slug,
                });
                const categoryData = await category.save();
                res.status(200).send({ success: true, msg: "Category data saved", data: categoryData });
            } else {
                res.status(200).send({ success: true, msg: "This category (" + req.body.name + ") is already exists" });
            }
        } else {
            const category = new Category({
                name: req.body.name,
                slug: req.body.slug,
            });
            const categoryData = await category.save();
            res.status(200).send({ success: true, msg: "Category data saved", data: categoryData });
        }

    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }

}

const listAll = async (req, res) => {
    try {
        const categories = await Category.find();
        res.status(200).send({ success: true, msg: "List of categories data", data: categories });
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const list = async (req, res) => {
    try {
        return await Category.find();
        // res.status(200).send({success:true, msg:"List of categories data", data:categories});
    } catch (err) {
        // res.status(400).send({success: false, msg: err.message});
    }
}

module.exports = {
    create, listAll, list
}