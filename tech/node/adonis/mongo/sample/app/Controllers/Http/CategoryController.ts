// import type { HttpContextContract } from '@ioc:Adonis/Core/HttpContext'



// import {prisma} from '@ioc:Adonis/Addons/Prisma'

// import { PrismaClient } from '@prisma/client'
// const prisma = new PrismaClient()


export default class CategoryController {

    public async index(){

        const categories = [
            {
                id: 1,
                name: "Hire On",
                slug: "hire-on",
                parent_id: 0
            },
            {
                id: 2,
                name: "Daily Need",
                slug: "daily-need",
                parent_id: 0
            },
            {
                id: 3,
                name: "Personal Care",
                slug: "personal-care",
                parent_id: 0
            },
            {
                id: 4,
                name: "Medical",
                slug: "medical",
                parent_id: 0
            },
            {
                id: 5,
                name: "Education",
                slug: "education",
                parent_id: 0
            },
            {
                id: 6,
                name: "House Hold",
                slug: "house-hold",
                parent_id: 0
            },
            {
                id: 7,
                name: "Public Services",
                slug: "public-services",
                parent_id: 0
            },
            {
                id: 8,
                name: "Marriage",
                slug: "marriage",
                parent_id: 0
            },
            {
                id: 9,
                name: "Sports Hobbies",
                slug: "sports-hobbies",
                parent_id: 0
            },
            {
                id: 10,
                name: "Internet",
                slug: "internet",
                parent_id: 0
            },
            {
                id: 11,
                name: "Restaurant",
                slug: "restaurant",
                parent_id: 0
            },
            {
                id: 12,
                name: "Electronic Store",
                slug: "electronic-store",
                parent_id: 0
            },
        ]

        return categories
    }


    public async getSubCategoriesBySlug({params}){

        return params.slug
        
    }


    // public async store ({request}:HttpContextContract) {

    //     const category = await prisma.category.create({

    //         data: request.only(['name', 'slug', 'parent_id']),

    //     })

    //     return category

    // }
}
