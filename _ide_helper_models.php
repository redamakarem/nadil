<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Area
 *
 * @property int $id
 * @property string $name_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name_ar
 * @property int $governate_id
 * @property-read \App\Models\Governate $governate
 * @method static \Database\Factories\AreaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereGovernateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedAt($value)
 */
	class Area extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Booking
 *
 * @property int $id
 * @property int $restaurant_id
 * @property int|null $user_id
 * @property string $phone
 * @property string $booking_date
 * @property string $booking_time
 * @property int $seats
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $booking_end_time
 * @property string $booking_code
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DiningTable[] $reserved_tables
 * @property-read int|null $reserved_tables_count
 * @property-read \App\Models\Restaurant $restaurant
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\BookingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereBookingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereBookingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereBookingEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereBookingTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUserId($value)
 */
	class Booking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BookingsTables
 *
 * @property int $booking_id
 * @property int $table_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $booking_date
 * @property string $booking_time
 * @property int $id
 * @property int $restaurant_id
 * @property string $booking_end_time
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Booking[] $bookings
 * @property-read int|null $bookings_count
 * @property-read \App\Models\Restaurant $restaurant
 * @property-read \App\Models\DiningTable|null $table
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables whereBookingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables whereBookingEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables whereBookingTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables whereTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingsTables whereUpdatedAt($value)
 */
	class BookingsTables extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cuisine
 *
 * @property int $id
 * @property string $name_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name_ar
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Restaurant[] $restaurants
 * @property-read int|null $restaurants_count
 * @method static \Database\Factories\CuisineFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine whereUpdatedAt($value)
 */
	class Cuisine extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\DiningTable
 *
 * @property int $id
 * @property string $name
 * @property int $capacity
 * @property int $restaurant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Booking[] $bookings
 * @property-read int|null $bookings_count
 * @property-read \App\Models\Restaurant $restaurant
 * @method static \Database\Factories\DiningTableFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DiningTable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiningTable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiningTable query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiningTable whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiningTable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiningTable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiningTable whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiningTable whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiningTable whereUpdatedAt($value)
 */
	class DiningTable extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Dish
 *
 * @property int $id
 * @property string $name_en
 * @property string $description_en
 * @property int $price
 * @property string $prep_time
 * @property int $restaurant_id
 * @property int $menu_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $cuisine_id
 * @property int $is_featured
 * @property string|null $name_ar
 * @property int $isActive
 * @property string $description_ar
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DishesCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Cuisine|null $cuisine
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\DishesMenu $menu
 * @property-read \App\Models\Restaurant $restaurant
 * @method static \Illuminate\Database\Eloquent\Builder|Dish newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dish newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dish query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereCuisineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereDescriptionAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish wherePrepTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dish whereUpdatedAt($value)
 */
	class Dish extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\DishesCategory
 *
 * @property int $id
 * @property string $name_en
 * @property int $catalogue_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name_ar
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Dish[] $dishes
 * @property-read int|null $dishes_count
 * @property-read \App\Models\DishesMenu $menu
 * @method static \Database\Factories\DishesCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DishesCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DishesCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|DishesCategory whereCatalogueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesCategory whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesCategory whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesCategory whereUpdatedAt($value)
 */
	class DishesCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DishesMenu
 *
 * @property int $id
 * @property string $name
 * @property int $restaurant_id
 * @property \Illuminate\Support\Carbon $from_date
 * @property \Illuminate\Support\Carbon $to_date
 * @property string $from_time
 * @property string $to_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DishesCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Restaurant $restaurant
 * @method static \Database\Factories\DishesMenuFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu whereFromTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu whereToTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DishesMenu whereUpdatedAt($value)
 */
	class DishesMenu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Governate
 *
 * @property int $id
 * @property string $name_en
 * @property string $name_ar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Area[] $areas
 * @property-read int|null $areas_count
 * @method static \Illuminate\Database\Eloquent\Builder|Governate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Governate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Governate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Governate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governate whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governate whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Governate whereUpdatedAt($value)
 */
	class Governate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MealType
 *
 * @property int $id
 * @property string $name_en
 * @property string $name_ar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Restaurant[] $restaurants
 * @property-read int|null $restaurants_count
 * @method static \Database\Factories\MealTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MealType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MealType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MealType query()
 * @method static \Illuminate\Database\Eloquent\Builder|MealType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MealType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MealType whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MealType whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MealType whereUpdatedAt($value)
 */
	class MealType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Profile
 *
 * @property int $id
 * @property string $name
 * @property string $dob
 * @property string $phone
 * @property string $email
 * @property int $gender
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $address
 * @property-read string $initials
 * @method static \Database\Factories\ProfileFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 */
	class Profile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Restaurant
 *
 * @property int $id
 * @property string $name_en
 * @property string $email
 * @property string $address
 * @property string $coordinates
 * @property string $phone
 * @property int $user_id
 * @property int $is_active
 * @property int $is_featured
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $max_party_size
 * @property int $estimated_dining_time
 * @property string $name_ar
 * @property string|null $facebook
 * @property string|null $instagram
 * @property int|null $area
 * @property int|null $block
 * @property string|null $street_en
 * @property string|null $street_ar
 * @property int|null $building
 * @property int|null $floor
 * @property int|null $flat
 * @property-read \App\Models\Area|null $areaa
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Booking[] $bookings
 * @property-read int|null $bookings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cuisine[] $cuisines
 * @property-read int|null $cuisines_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DiningTable[] $diningTables
 * @property-read int|null $dining_tables_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Dish[] $dishes
 * @property-read int|null $dishes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MealType[] $meal_types
 * @property-read int|null $meal_types_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DishesMenu[] $menus
 * @property-read int|null $menus_count
 * @property-read \App\Models\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BookingsTables[] $reserved_tables
 * @property-read int|null $reserved_tables_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Schedule[] $schedules
 * @property-read int|null $schedules_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $staff
 * @property-read int|null $staff_count
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant active()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant byCuisine($cuisine)
 * @method static \Database\Factories\RestaurantFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant hasScheduleForDate($date)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant publishable()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant slotBookable()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereCoordinates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereEstimatedDiningTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereFlat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereMaxPartySize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereStreetAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereStreetEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereUserId($value)
 */
	class Restaurant extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\RestaurantRegistration
 *
 * @property int $id
 * @property string $name
 * @property string $owner_name
 * @property int $num_locations
 * @property string $email
 * @property string $phone
 * @property string|null $social_media
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RestaurantRegistrationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration query()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration whereNumLocations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration whereOwnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration whereSocialMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantRegistration whereUpdatedAt($value)
 */
	class RestaurantRegistration extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Schedule
 *
 * @property int $id
 * @property string $name
 * @property int $slot_length
 * @property string $from_date
 * @property string $to_date
 * @property string $from_time
 * @property string $to_time
 * @property int $restaurant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ScheduleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereFromTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereSlotLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereToTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereUpdatedAt($value)
 */
	class Schedule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SiteContact
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SiteContactFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteContact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteContact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteContact whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteContact whereUpdatedAt($value)
 */
	class SiteContact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $mobile
 * @property string|null $landline
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $area_id
 * @property string|null $social_id
 * @property string|null $social_type
 * @property int|null $restaurant_id
 * @property int $is_dark_mode
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Booking[] $bookings
 * @property-read int|null $bookings_count
 * @property-read string $initials
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Profile|null $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Restaurant[] $restaurants
 * @property-read int|null $restaurants_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\Restaurant|null $workplace
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsDarkMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLandline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSocialType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

