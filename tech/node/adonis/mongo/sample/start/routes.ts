/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| This file is dedicated for defining HTTP routes. A single file is enough
| for majority of projects, however you can define routes in different
| files and just make sure to import them inside this file. For example
|
| Define routes in following two files
| ├── start/routes/cart.ts
| ├── start/routes/customer.ts
|
| and then import them inside `start/routes.ts` as follows
|
| import './routes/cart'
| import './routes/customer'
|
*/

import Route from '@ioc:Adonis/Core/Route'

// Greeting you
Route.get('/', async () => { return { salam: 'world' }})

Route.resource('users', 'UserController')


Route.post('/register', 'AuthController.register')

Route.post('/login', 'AuthController.login')


// Categories API Resources
// Create
Route.post('/categories', 'CategoryController.store')

// List All
Route.get('/categories', 'CategoryController.index')

// Find One
Route.get('/categories/:id', 'CategoryController.findOne')

// Find One
Route.put('/categories', 'CategoryController.update')

// Find One
Route.delete('/categories', 'CategoryController.delete')

// List All Subcategories
Route.get('/subcategories/:slug', 'CategoryController.getSubCategoriesBySlug')



// Businesses API Resources
// Create
Route.post('/businesses', 'BusinessController.create')

// List All
Route.get('/businesses', 'BusinessController.index')

// Find One
Route.get('/businesses:id', 'BusinessController.findOne')

// Find One
Route.put('/businesses', 'BusinessController.update')

// Find One
Route.delete('/businesses', 'BusinessController.delete')








// Route.get('/:city/:query', async ({ params }) => {
//     return `Viewing post using slug ${params.city}`
//   }).where('slug', /^[a-z0-9_-]+$/)