import type { HttpContextContract } from '@ioc:Adonis/Core/HttpContext'
import { prisma  } from '@ioc:Adonis/Addons/Prisma'
// import {  PrismaClient } from '@prisma/client';
// import Hash from '@ioc:Adonis/Core/Hash'

export default class AuthController {

    // private prisma = new PrismaClient();

    public async register({  response }: HttpContextContract) {
        try {
        // Example: Query for a document
        const result = await prisma.user.findFirst()

           
        // const user = await prisma.user.create({
        //             data: {
        //                 name: request.input('name'),
        //                 // email: request.input('email'),
        //                 // password: await Hash.make(request.input('password')),
        
        //             }
        //         })
        
        //         const token = await auth.login(user)
        
               
            

        // Example: Insert a document (this is just an example, you can use any operation)
        // await this.prisma.someModel.create({ data: { /* your data here */ } })

        response.status(200).send({ message: 'MongoDB connection is OK', result })
        } catch (error) {
        console.error('MongoDB connection error:', error);
        response.status(500).send({ message: 'MongoDB connection error', error: error.message })
        } finally {
        // Close the Prisma client to release resources
        await prisma.$disconnect()
        }
    }


    // public async register({request, auth}:HttpContextContract) {
    //     const user = await prisma.user.create({
    //         data: {
    //             name: request.input('name'),
    //             email: request.input('email'),
    //             password: await Hash.make(request.input('password')),

    //         }
    //     })

    //     const token = await auth.login(user)

    //     return token
    // }

    public async login(){
        
    }
    

   

}
