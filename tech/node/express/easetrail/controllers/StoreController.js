const Store = require('../models/Store');
const User = require('../models/User');

const create = async (req, res) => {
    try {
        const storeData = await User.findOne({ _id: req.body.vendor_id });
        if (storeData) {
            if (!req.body.latitude || !req.body.longitude) {
                res.status(400).send({ success: false, msg: "Lat Long is not found" });
            } else {
                const vendorData = await Store.findOne({ vendor_id: req.body.vendor_id })
                if (vendorData) {
                    res.status(200).send({ success: false, msg: "This vendor already create a store" });
                } else {
                    const storeData = new Store({
                        vendor_id: req.body.vendor_id,
                        logo: req.file.filename,
                        business_email: req.body.business_email,
                        address: req.body.address,
                        pin: req.body.pin,
                        location: {
                            type: "Point",
                            coordinates: [parseFloat(req.body.longitude), parseFloat(req.body.latitude)]
                        }
                    });
                    const store = await storeData.save();
                    res.status(200).send({ success: true, msg: "Store data saved", data: store });
                }
            }
        } else {
            res.status(200).send({ success: false, msg: "Vendor ID does not exists" });
        }
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}
const nearest = async (req, res) => {
    try {
        const latitude = req.body.latitude;
        const longitude = req.body.longitude;
        const storesData = await Store.aggregate([
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
        res.status(200).send({ success: true, msg: "Store Results", data: storesData });
    } catch (err) {
        res.status(400).send({ success: false, msg: err.message });
    }
}

const single = async (id) => {
    try {
        return await Store.findOne({ _id: id });
        // res.status(200).send({success:true, msg:"Single store data", data:store});req
    } catch (err) {
        // res.status(400).send({success: false, msg: err.message});
    }
}

module.exports = {
    create, nearest, single
}