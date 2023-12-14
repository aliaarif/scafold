import type { HttpContextContract } from '@ioc:Adonis/Core/HttpContext'
import { prisma } from '@ioc:Adonis/Addons/Prisma'

export default class UserController {

    public async index(){
        return { list: 'all users'}
    }
    

    public async store({request}:HttpContextContract) {
        const user = await prisma.user.create({
            data: request.only(['name', 'email', 'password'])
        })
        return user
    }

}
