<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeVidController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Models\Blog;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', );
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');
Route::get('/shop', function () {
    return view('shop');
})->name('shop');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//  mail
Route::controller(ContactController::class)->group( function() {
    Route::post('/contactsend', 'sendContactForm');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::controller(ServiceController::class)->group( function() {
    Route::get('/all/service', 'AllServices')->name('all.service');
    Route::get('/edit/service/{id}', 'EditServices')->name('edit.service');
    Route::get('/edit/main/{id}', 'EditMain')->name('edit.main');
    Route::post('/service/submit/{id}', 'ServiceSubmit')->name('service.submit');

});


Route::controller(HomeVidController::class)->group( function() {
    Route::get('/all/vid', 'AllVid')->name('all.vid');
    Route::get('/add/vid', 'AddVid')->name('add.vid');
    Route::post('/add/store', 'Store')->name('add.store');
    Route::get('/edit/vid/{id}', 'EditVid')->name('edit.vid');
    Route::post('/homevid/update/{id}', 'HomevidUpdate')->name('homevid.update');

});

Route::controller(ShopController::class)->group( function() {
    Route::get('/shop/all', 'AllShop')->name('all.shop');
    Route::get('/shop/add', 'AddShop')->name('add.shop');
    Route::post('/store/shop', 'StoreShop')->name('shop.store');
    Route::get('/edit/shop/{id}', 'EditShop')->name('edit.shop');
    Route::post('/shop/update/{id}', 'UpdateShop')->name('shop.update');
  

});

Route::controller(CollectionController::class)->group( function() {
    Route::get('/all/collection', 'AllCollection')->name('all.collection');
    Route::get('/add/collection', 'AddCollection')->name('add.collection');
    Route::post('/collection/store', 'StoreCollection')->name('collection.store');
    Route::get('/edit/collection/{id}', 'EditCollection')->name('edit.collection');
    Route::post('/collection/update/{id}', 'UpdateCollection')->name('collection.update');

});

Route::controller(CategoryController::class)->group( function() {
    Route::get('/all/category', 'AllCategory')->name('all.category');
    Route::get('/add/category', 'AddCategory')->name('add.category');
    Route::post('/category/store', 'StoreCategory')->name('category.store');
    Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
    Route::post('/category/update/{id}', 'UpdateCategory')->name('category.update');

});

Route::controller(TestimonialController::class)->group( function() {
    Route::get('/all/testimonial', 'AllTestimonial')->name('all.testimonial');
    Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
    Route::post('/testimonial/update/{id}', 'UpdateTestimonial')->name('testimonial.update');
    // Route::get('/add/collection', 'AddCollection')->name('add.collection');
    // Route::post('/collection/store', 'StoreCollection')->name('collection.store');

});

Route::controller(AboutController::class)->group( function() {
    Route::get('/about/all', 'About')->name('admin.about');
    Route::get('/add/about/', 'AddAbout')->name('add.about');
    Route::post('/store/about', 'StoreAbout')->name('about.store');
    Route::get('/edit/about/{id}', 'EditAbout')->name('edit.about');
    Route::post('/about/update/{id}', 'UpdateAbout')->name('update.about');
    Route::get('/logout-user', 'perform')->name('logout.user');
    // Route::get('/add/collection', 'AddCollection')->name('add.collection');

});

Route::controller(BlogController::class)->group( function() {
    Route::get('/blog', 'Blog')->name('blog');
    Route::get('/all/blog', 'Allblog')->name('all.blog');
    Route::get('/add/blog', 'Addblog')->name('add.blog');
    Route::post('/blog/store', 'Storeblog')->name('blog.store');
    Route::get('/edit/blog/{id}', 'Editblog')->name('blog.edit');
    Route::post('/blog/update/{id}', 'Updateblog')->name('blog.update');
    Route::get('/delete/blog/{id}', 'Deleteblog')->name('blog.delete');

});

Route::controller(ProductController::class)->group( function() {
    Route::get('/all/port', 'AllPort')->name('all.port');
    Route::get('/add/port', 'AddPort')->name('add.port');
    Route::post('/port/store', 'StorePort')->name('port.store');
    Route::get('/edit/port/{id}', 'EditPort')->name('port.edit');
    Route::post('/port/update/{id}', 'UpdatePort')->name('port.update');


});


    Route::controller(ProfileController::class)->group( function() {
    Route::get('/profile',  'edit')->name('profile.edit');
    Route::patch('/profile',  'update')->name('profile.update');
    Route::delete('/profile',  'destroy')->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
