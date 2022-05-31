<?php

use App\Http\Controllers\Admin\RestaurantsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CuisineController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\RestaurantAdmin\CatalogueCategory\CatalogueCategoryController;
use App\Http\Controllers\RestaurantAdmin\Dish\DishesController as RADishesController;
use App\Http\Controllers\RestaurantAdmin\ScheduleController as RAScheduleController;
use App\Http\Controllers\RestaurantAdmin\Table\TableController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[\App\Http\Controllers\SiteController::class,'index']);
Route::get('/restaurants',[\App\Http\Controllers\SiteController::class,'restaurants']);
Route::get('/restaurant/{id}',[\App\Http\Controllers\SiteController::class,'show_restaurant'])
    ->name('site.restaurants.view');
Route::get('/restaurant/{id}/book',[\App\Http\Controllers\SiteController::class,'book_restaurant'])
    ->name('site.restaurants.book');
Route::get('/contact',[\App\Http\Controllers\SiteController::class,'contact'])
    ->name('site.contact');
Route::get('/user-register',[\App\Http\Controllers\SiteController::class,'userRegister'])
    ->name('site.user-register');

Route::get('/test-mail', function (){
    \Illuminate\Support\Facades\Mail::to('test@test.com')->send(new \App\Mail\RestaurantRegistered());

});



Route::get('/test-map', function (){
    return view('site.test-map');

});

Route::get('restaurant-registration',[\App\Http\Controllers\RestaurantRegistrationController::class,'index']);



Route::mediaLibrary();


Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

Route::get('auth/facebook', [\App\Http\Controllers\FacebookSocialiteController::class, 'redirectToFacebook']);
Route::get('callback/facebook', [\App\Http\Controllers\FacebookSocialiteController::class, 'handleCallback']);

Route::get('auth/twitter', [\App\Http\Controllers\TwitterSocialiteController::class, 'redirectToTwitter']);
Route::get('callback/twitter', [\App\Http\Controllers\TwitterSocialiteController::class, 'handleCallback']);

Route::get('/home',[\App\Http\Controllers\SiteController::class,'index'])->name('home');
Route::get('user/leave-impersonate', [UserController::class,'leaveImpersonate'])->name('users.leave-impersonate');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix' => 'admin', 'middleware'=>['auth','role:admin']],function(){
    Route::get('/',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.index');

    Route::get('user/{user}/impersonate', [UserController::class,'impersonate'])->name('users.impersonate');

//Restaurants
    Route::get('/restaurants',[\App\Http\Controllers\Admin\RestaurantsController::class,'index'])
        ->name('admin.restaurants.index');

    Route::get('/restaurants/edit/{id}',[RestaurantsController::class,'edit'])
        ->name('admin.restaurants.edit');

    Route::post('/restaurants/update/{id}',[RestaurantsController::class,'update']);

    Route::get('/restaurants/create/',[RestaurantsController::class,'create'])
        ->name('admin.restaurants.create');

    Route::post('/restaurants/store/',[RestaurantsController::class,'store'])
        ->name('admin.restaurants.store');
//Users
    Route::get('/users/',[UserController::class,'index'])
        ->name('admin.users.index');
    Route::get('/users/create/',[UserController::class,'create'])
        ->name('admin.users.create');
    Route::get('/users/edit/{id}',[UserController::class,'edit'])
        ->name('admin.users.edit');


//    Schedules

    Route::get('/restaurant/{restaurant}/schedules',
        [\App\Http\Controllers\Admin\ScheduleController::class,'index'])
    ->name('admin.restaurant.schedules.index');

    Route::get('/restaurant/{restaurant}/schedules/create',
        [\App\Http\Controllers\Admin\ScheduleController::class,'create'])
        ->name('admin.restaurant.schedules.create');

    Route::get('/restaurant/{restaurant}/schedules/{schedule}/edit',
        [\App\Http\Controllers\Admin\ScheduleController::class,'edit'])
        ->name('admin.restaurant.schedules.edit');




//    Bookings
    Route::get('/bookings',[\App\Http\Controllers\Admin\BookingController::class,'index'])
        ->name('admin.bookings.index');
    Route::get('/bookings-calendar',[\App\Http\Controllers\Admin\BookingController::class,'calendar'])
        ->name('admin.bookings.calendar');

    Route::get('/bookings/view/{id}',[\App\Http\Controllers\Admin\BookingController::class,'show'])
        ->name('admin.bookings.show');


    Route::get('/bookings/create',[\App\Http\Controllers\Admin\BookingController::class,'create'])
        ->name('admin.bookings.create');

    Route::get('/bookings/{id}/edit',[\App\Http\Controllers\Admin\BookingController::class,'edit'])
        ->name('admin.bookings.edit');


//Cuisines
    Route::get('/cuisines', [CuisineController::class,'index'])->name('admin.cuisines.index');

    Route::get('/cuisines/edit/{id}',[CuisineController::class,'edit'])
        ->name('admin.cuisines.edit');

    Route::get('/cuisines/create/',[CuisineController::class,'create'])
        ->name('admin.cuisines.create');

    Route::post('/cuisines/store/',[CuisineController::class,'store'])
        ->name('admin.cuisines.store');

    Route::post('/cuisines/update/{id}',[CuisineController::class,'update'])
        ->name('admin.cuisines.update');

//    Menus
    Route::get('/restaurant/{restaurant}/menu/',[\App\Http\Controllers\DishesMenuController::class,'index'])
    ->name('admin.restaurants.menus');
    Route::get('/restaurant/{restaurant}/menu/show/{menu}',[\App\Http\Controllers\DishesMenuController::class,'show'])
        ->name('admin.restaurants.menus.show');
    Route::get('/restaurant/{restaurant}/menu/create',[\App\Http\Controllers\DishesMenuController::class,'create'])
        ->name('admin.restaurants.menus.create');
    Route::post('/restaurant/{restaurant}/menu/store',[\App\Http\Controllers\DishesMenuController::class,'store']);
    Route::get('/restaurant/{restaurant}/menu/{id}/edit',[\App\Http\Controllers\DishesMenuController::class,'edit'])
    ->name('admin.restaurants.menus.edit');
    Route::post('/restaurant/{restaurant}/menu/{id}/update',[\App\Http\Controllers\DishesMenuController::class,'update']);
    Route::delete('/restaurant/{restaurant}/menu/{id}/',[\App\Http\Controllers\DishesMenuController::class,'update']);

//Menu categories
    Route::get('/restaurant/{restaurant}/menu/{id}/categories',[\App\Http\Controllers\DishesCategoryController::class,'index'])
        ->name('admin.restaurants.menus.categories');

    Route::get('/restaurant/{restaurant}/menu/{menu}/categories/create',[\App\Http\Controllers\DishesCategoryController::class,'create'])
        ->name('admin.restaurants.menus.categories.create');



//    Dishes
    Route::get('/restaurant/{restaurant}/menu/{menu}/categories/{category}/dishes/',
        [\App\Http\Controllers\Admin\DishesController::class,'index'])
        ->name('admin.dishes.index');

    Route::get('/restaurant/{restaurant}/menu/{menu}/categories/{category}/dishes/create',
        [\App\Http\Controllers\Admin\DishesController::class,'create'])
        ->name('admin.dishes.create');

    Route::get('contact-messages',[\App\Http\Controllers\Admin\ContactMessagesController::class,'index'])
        ->name('admin.contact-messages.index');
});






Route::group(['prefix' => 'restaurant-admin', 'middleware'=>['auth','role:restaurant-admin']],function(){
    Route::get('/',[App\Http\Controllers\RestaurantAdmin\RestaurantAdminController::class,'index'])
    ->name('restaurant-admin.index');

    Route::get('/restaurants',[\App\Http\Controllers\RestaurantAdmin\Restaurant\RestaurantController::class,'index'])
        ->name('restaurant-admin.restaurants.index');

    Route::get('restaurant/{restaurant}/menus/',
        [\App\Http\Controllers\RestaurantAdmin\Catalogue\CatalogueController::class,'index'])
        ->name('restaurant-admin.restaurant.menus');

    Route::get('/restaurant/{restaurant}/menu/create',
    [\App\Http\Controllers\RestaurantAdmin\Catalogue\CatalogueController::class,'create'])
        ->name('restaurant-admin.restaurant.menus.create');

    Route::get('/restaurant/{restaurant}/menu/{menu}/edit',
        [\App\Http\Controllers\RestaurantAdmin\Catalogue\CatalogueController::class,'edit'])
        ->name('restaurant-admin.restaurant.menus.edit');

//    Catalogue categories
    Route::get('/restaurant/{restaurant}/menu/{menu}/categories',
        [CatalogueCategoryController::class,'index'])
        ->name('restaurant-admin.restaurant.menu.categories.index');

    Route::get('/restaurant/{restaurant}/menu/{menu}/categories/create',
        [CatalogueCategoryController::class,'create'])
        ->name('restaurant-admin.restaurant.menu.categories.create');

//    Dishes
    Route::get('/restaurant/{restaurant}/menu/{menu}/categories/{category}/dishes',
        [RADishesController::class,'index'])
        ->name('restaurant-admin.restaurant.menu.categories.dishes');

    Route::get('/restaurant/{restaurant}/menu/{menu}/categories/{category}/dishes/create',
        [RADishesController::class,'create'])
        ->name('restaurant-admin.restaurant.menu.categories.dishes.create');

//    Schedules
    Route::get('/restaurant/{restaurant}/schedules',
        [RAScheduleController::class,'index'])
        ->name('restaurant-admin.restaurant.schedules.index');

    Route::get('restaurant/{restaurant}/tables',[TableController::class,'index'])->name('restaurant-admin.restaurant.tables.index');
    Route::get('restaurant/{restaurant}/tables/create',[TableController::class,'create'])->name('restaurant-admin.restaurant.tables.create');
});


Route::group(['prefix' => 'user', 'middleware'=>['auth','role:user']],function(){
    Route::get('/profile',[\App\Http\Controllers\SiteController::class,'profile'])->name('user.profile.show');
});




require __DIR__ . '/auth.php';
