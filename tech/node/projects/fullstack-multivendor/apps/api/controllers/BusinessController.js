const Business = require('../models/Business');
const CategoryController = require('../controllers/CategoryController');

const create = async (req, res) => {
    try {
        // if (!req.file) {
        //     return res.status(400).send({ success: false, msg: "Business Logo required" });
        // }

        if (!req.files || !Array.isArray(req.files)) {
            return res.status(400).send({ success: false, msg: "Files not provided or invalid format" });
        }
        let arrImages = [];
        for (let i = 0; i < req.files.length; i++) {
            arrImages[i] = req.files[i].filename;
        }
        const businessData = new Business({
            user_id: req.body.user_id,
            category_id: req.body.category_id,
            subcategory_id: req.body.subcategory_id,

            name: req.body.name,
            slug: req.body.slug,
            email: req.body.email,
            locality: req.body.locality,
            city: req.body.city,
            state: req.body.state,
            pin: req.body.pin,
            location: {
                type: "Point",
                coordinates: [parseFloat(req.body.longitude), parseFloat(req.body.latitude)]
            },
            // logo: req.file.filename,
            images: arrImages
        });
        const business = await businessData.save();
        res.status(200).send({ success: true, msg: "New business Saved!", data: business });
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
                const businesssData = [];
                const catId = categories[i]['_id'].toString();
                const catbusinesss = await Business.find({ category_id: catId });
                if (catbusinesss.length > 0) {
                    businesssData.push({
                        "name": catbusinesss[i]['name'],
                        "slug": catbusinesss[i]['slug'],
                        "images": catbusinesss[i]['images'],
                    });
                }
                responseData.push({
                    "category": categories[i]['name'],
                    "businesss": businesssData
                });
            }
            res.status(200).send({ success: true, msg: "Businesss Details", data: responseData });
        } else {
            res.status(200).send({ success: false, msg: "Businesss Details", data: responseData });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const search = async (req, res) => {
    try {
        const search = req.body.search;
        const businesssData = await business.find({ "name": { $regex: ".*" + search + ".*", $options: 'i' } });
        if (businesssData.length > 0) {
            res.status(200).send({ success: true, msg: "Search Results", data: businesssData });
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
        let businesss;
        let skip = (page <= 1) ? 0 : (page - 1) * 2;
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
            businesss = await Business.find().sort(customsort).skip(skip).limit(2);
        } else {
            businesss = await Business.find().skip(skip).limit(2);
        }

        res.status(200).send({ success: true, msg: "Businesss Details", data: businesss });

    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const nearest = async (req, res) => {
    try {
        const latitude = req.body.latitude;
        const longitude = req.body.longitude;
        const BusinesssData = await Business.aggregate([
            {
                $geoNear: {
                    near: { type: "Point", coordinates: [parseFloat(longitude), parseFloat(latitude)] },
                    key: "location",
                    maxDistance: parseFloat(100) * 1609,
                    distanceField: "dist.calculated",
                    spherical: true
                }
            }
        ]);
        res.status(200).send({ success: true, msg: "Business Results", data: BusinesssData });
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const single = async (id) => {
    try {
        return await Business.findOne({ _id: id });
    } catch (err) {
    }
}

module.exports = {
    create, search, list, paginate, nearest, single
}