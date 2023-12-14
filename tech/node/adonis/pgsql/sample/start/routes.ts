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


// Categories API Resources
// Create
Route.post('/categories', 'CategoriesController.create')

// List All
// Route.get('/categories', 'CategoriesController.index')

// Find One
// Route.get('/categories/:id', 'CategoriesController.findOne')

// Find One
// Route.put('/categories', 'CategoriesController.update')

// Find One
// Route.delete('/categories', 'CategoriesController.delete')

// List All Subcategories
// Route.get('/subcategories/:slug', 'CategoriesController.getSubCategoriesBySlug')



// Businesses API Resources
// Create
Route.post('/businesses', 'BusinessesController.create')

// List All
Route.get('/businesses', 'BusinessesController.index')

// Find One
Route.get('/businesses:id', 'BusinessesController.findOne')

// Find One
Route.put('/businesses', 'BusinessesController.update')

// Find One
Route.delete('/businesses', 'BusinessesController.delete')








// Route.get('/:city/:query', async ({ params }) => {
//     return `Viewing post using slug ${params.city}`
//   }).where('slug', /^[a-z0-9_-]+$/)