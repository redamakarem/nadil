<?php

use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RestaurantsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CuisineController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\RestaurantAdmin\CatalogueCategory\CatalogueCategoryController;
use App\Http\Controllers\RestaurantAdmin\Dish\DishesController as RADishesController;
use App\Http\Controllers\RestaurantAdmin\Restaurant\RestaurantController;
use App\Http\Controllers\RestaurantAdmin\ScheduleController as RAScheduleController;
use App\Http\Controllers\RestaurantAdmin\Booking\BookingController as RABookingController;
use App\Http\Controllers\RestaurantAdmin\Table\TableController;
use App\Models\Restaurant;
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
Route::get('/restaurants/cuisine/{cuisine}',[\App\Http\Controllers\SiteController::class,'restaurants_by_cuisine'])
    ->name('site.restaurants.cuisine');
Route::get('/restaurant/{id}',[\App\Http\Controllers\SiteController::class,'show_restaurant'])
    ->name('site.restaurants.view');

    Route::post('/restaurants/search',[\App\Http\Controllers\SiteController::class,'check_booking'])
    ->name('site.restaurants.search');


Route::get('/contact',[\App\Http\Controllers\SiteController::class,'contact'])
    ->name('site.contact');
Route::get('/user-register',[\App\Http\Controllers\SiteController::class,'userRegister'])
    ->name('site.user-register');
Route::get('/about',[\App\Http\Controllers\SiteController::class,'about'])
    ->name('site.about');


Route::get('/test-map', function (){
    return view('site.test-map');

});

Route::get('restaurant-registration',[\App\Http\Controllers\RestaurantRegistrationController::class,'index']);



Route::mediaLibrary();


Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle'])->name('site.auth.google');
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback'])->name('site.auth.google-callback');

Route::get('auth/facebook', [\App\Http\Controllers\FacebookSocialiteController::class, 'redirectToFacebook'])->name('site.auth.facebook');
Route::get('callback/facebook', [\App\Http\Controllers\FacebookSocialiteController::class, 'handleCallback'])->name('site.auth.facebook-callback');

Route::get('auth/twitter', [\App\Http\Controllers\TwitterSocialiteController::class, 'redirectToTwitter']);
Route::get('callback/twitter', [\App\Http\Controllers\TwitterSocialiteController::class, 'handleCallback']);

Route::get('/home',[\App\Http\Controllers\SiteController::class,'index'])->name('home');
Route::get('user/leave-impersonate', [UserController::class,'leaveImpersonate'])->name('users.leave-impersonate');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix' => 'admin', 'middleware'=>['auth','role:super-admin']],function()
{
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
    Route::get('/restaurants/wizard-create/',[RestaurantsController::class,'wizard_create'])
        ->name('admin.restaurants.wizard-create');

    Route::post('/restaurants/store/',[RestaurantsController::class,'store'])
        ->name('admin.restaurants.store');
    //Users
    Route::get('/users/',[UserController::class,'index'])
        ->name('admin.users.index');
    Route::get('/users/create/',[UserController::class,'create'])
        ->name('admin.users.create');
    Route::get('/users/edit/{id}',[UserController::class,'edit'])
        ->name('admin.users.edit');
    Route::get('/users/role/{id}',[UserController::class,'byRole'])
        ->name('admin.users.roles');

    //Roles

    Route::get('/roles',[RolesController::class,'index'])
        ->name('admin.roles.index');
    Route::get('/roles/create/',[RolesController::class,'create'])
        ->name('admin.roles.create');
    Route::get('/roles/edit/{id}',[RolesController::class,'edit'])
        ->name('admin.role.edit');

        //Permissions

    Route::get('/permissions',[PermissionsController::class,'index'])
        ->name('admin.permissions.index');
    Route::get('/permissions/create/',[PermissionsController::class,'create'])
        ->name('admin.permissions.create');
    Route::get('/permissions/edit/{id}',[PermissionsController::class,'edit'])
        ->name('admin.permission.edit');

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

    Route::get('/bookings/{booking}/edit',[\App\Http\Controllers\Admin\BookingController::class,'edit'])
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
    Route::get('/restaurant/{restaurant}/dishes/',
        [\App\Http\Controllers\Admin\DishesController::class,'restaurant_dishes'])
        ->name('admin.restaurant.dishes.index');

    Route::get('/restaurant/{restaurant}/dishes/create',
        [\App\Http\Controllers\Admin\DishesController::class,'create'])
        ->name('admin.restaurant.dishes.create');

    Route::get('contact-messages',[\App\Http\Controllers\Admin\ContactMessagesController::class,'index'])
        ->name('admin.contact-messages.index');

    // Areas

    Route::get('areas',[AreaController::class,'index'])->name('admin.areas.index');
    Route::get('areas/create',[AreaController::class,'create'])->name('admin.areas.create');
    Route::get('areas/edit/{id}',[AreaController::class,'edit'])->name('admin.areas.edit');
});






Route::group(['prefix' => 'restaurant-admin', 'middleware'=>['auth','role:restaurant-super-admin|restaurant-admin']],function(){
    Route::get('/',[App\Http\Controllers\RestaurantAdmin\RestaurantAdminController::class,'index'])
    ->name('restaurant-admin.index');
    // Restaurants
    Route::get('/restaurants',[\App\Http\Controllers\RestaurantAdmin\Restaurant\RestaurantController::class,'index'])
        ->name('restaurant-admin.restaurants.index');
    Route::get('/restaurant/{id}/edit',[\App\Http\Controllers\RestaurantAdmin\Restaurant\RestaurantController::class,'edit'])
        ->name('restaurant-admin.restaurants.edit');
    // Menus
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
    Route::get('/restaurant/{restaurant}/menu/{menu}/categories/{category}/dishes/{dish}/edit',
        [RADishesController::class,'edit'])
        ->name('restaurant-admin.restaurant.menu.categories.dishes.edit');

        Route::get('dishes/new',[RADishesController::class,'new_dish'])->name('restaurant-admin.new-dish');

    //    Schedules
    Route::get('/restaurant/{restaurant}/schedules',
        [RAScheduleController::class,'index'])
        ->name('restaurant-admin.restaurant.schedules.index');
    Route::get('/restaurant/{restaurant}/schedules/create',
        [RAScheduleController::class,'create'])
        ->name('restaurant-admin.restaurant.schedules.create');
    // Tables
    Route::get('restaurant/{restaurant}/tables',[TableController::class,'index'])->name('restaurant-admin.restaurant.tables.index');
    Route::get('restaurant/{restaurant}/tables/create',[TableController::class,'create'])->name('restaurant-admin.restaurant.tables.create');

    // Staff
    Route::get('restaurant/{restaurant}/staff', [RestaurantController::class,'showStaff'])
    ->name('restaurant-admin.restaurant.staff');
    Route::get('restaurant/{restaurant}/staff/create', [RestaurantController::class,'createStaff'])
    ->name('restaurant-admin.restaurant.staff.create');
    Route::get('restaurant/{restaurant}/staff/{staff}/edit', [RestaurantController::class,'editStaff'])
    ->name('restaurant-admin.restaurant.staff.edit');

    // Booking

    Route::get('bookings',[RABookingController::class,'index'])->name('restaurant-admin.bookings');
    Route::get('bookings/create',[RABookingController::class,'create'])->name('restaurant-admin.bookings.create');
});


Route::group(['prefix' => 'user', 'middleware'=>['auth','role:user','ensure_password_changed']],function(){
    Route::get('/profile',[\App\Http\Controllers\Site\UserController::class,'profile'])->name('user.profile.show');
    Route::get('/profile/edit',[\App\Http\Controllers\Site\UserController::class,'profile_edit'])->name('user.profile.edit');
    Route::get('/history',[\App\Http\Controllers\Site\UserController::class,'history'])->name('user.history.show');

    Route::get('/restaurant/{id}/book',[\App\Http\Controllers\SiteController::class,'book_restaurant'])
    ->name('site.restaurants.book');
    Route::get('/booking/{id}/thanks',[\App\Http\Controllers\SiteController::class,'show_booking_confirmation'])
    ->name('site.bookings.confirmation');
});

Route::get('/restaurant/{id}/book',[\App\Http\Controllers\SiteController::class,'book_restaurant'])
    ->name('site.restaurants.book');




require __DIR__ . '/auth.php';
