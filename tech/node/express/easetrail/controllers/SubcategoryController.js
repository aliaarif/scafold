const Subcategory = require('../models/Subcategory');
const Category = require('../models/Category');

const create = async (req, res) => {
    try {
        const subcategories = await Subcategory.find({ category_id: req.body.category_id });
        const category = await Category.findById({ _id: req.body.category_id });
        if (subcategories.length > 0) {
            let checking = false;
            for (let i = 0; i < subcategories.length; i++) {
                if (subcategories[i]['slug'].toLowerCase() === req.body.slug.toLowerCase()) {
                    checking = true;
                    break;
                }
            }
            // console.log(checking);
            if (checking === false) {
                const subcategory = new Subcategory({
                    category_id: req.body.category_id,
                    name: req.body.name,
                    slug: req.body.slug,
                });
                const subcategoryData = await subcategory.save();
                res.status(200).send({ success: true, msg: "Subcategory data saved", data: subcategoryData });
            } else {
                res.status(200).send({ success: true, msg: "This subcategory (" + req.body.name + ") is already exists in category (" + category.name + ")" });
            }
        } else {
            const subcategory = new Subcategory({
                category_id: req.body.category_id,
                name: req.body.name,
                slug: req.body.slug,
            });
            const subcategoryData = await subcategory.save();
            res.status(200).send({ success: true, msg: "Subcategory data saved", data: subcategoryData });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const list = async (req, res) => {
    try {
        return await Subcategory.find();
        // res.status(200).send({success:true, msg:"Single store data", data:store});req
    } catch (err) {
        // res.status(400).send({success: false, msg: err.message});
    }
}


const single = async (id) => {
    try {
        return await Subcategory.findOne({ _id: id });
        // res.status(200).send({success:true, msg:"Single store data", data:store});req
    } catch (err) {
        // res.status(400).send({success: false, msg: err.message});
    }
}

module.exports = {
    create, single, list
}