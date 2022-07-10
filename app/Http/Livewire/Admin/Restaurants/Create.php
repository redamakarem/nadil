<?php

namespace App\Http\Livewire\Admin\Restaurants;

use App\Models\Cuisine;
use App\Models\MealType;
use App\Models\Restaurant;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Create extends Component
{
    use WithMedia;
    public $mediaComponentNames = ['restaurant_image','restaurant_bg'];
    public $form_data =[];
    public $restaurant_image;
    public $restaurant_bg;
    public $users;
    public $cuisines;
    public $meal_types;
    public $coordinates= '';
    public $is_active = false;



    protected $listeners = ['restaurantAdded' => 'goToRestaurants'];
    protected $rules = [
        'form_data.name_en' => 'required',
        'form_data.name_ar' => 'required',
        'form_data.email' => 'required|email|unique:restaurants,email,',
        'form_data.cuisines' => 'required',
        'form_data.meal_types' => 'required',
        'form_data.address' => 'required',
        'form_data.phone' => 'required',
        'form_data.user_id' => 'required',
        'form_data.max_party_size' => 'required|numeric',
        'form_data.estimated_dining_time' => 'required|numeric',
        'restaurant_image' => 'required',
        'coordinates' => 'required',
        'form_data.facebook' => 'sometimes',
        'form_data.instagram' => 'sometimes',
        'is_active' => 'sometimes',

    ];

    public function goToRestaurants()
    {
        $this->redirect(route('admin.restaurants.index'));
    }

    public function mount($cuisines,$users)
    {
        $this->cuisines = $cuisines;
        $this->meal_types = MealType::all();
        $this->users = $users;

        $this->coordinates= '';
        $this->form_data['name_en'] = '';
        $this->form_data['name_ar'] = '';
        $this->form_data['email'] = '';
        $this->form_data['address'] = '';
        $this->form_data['max_party_size'] = 4;
        $this->form_data['phone'] = '';
        $this->form_data['user_id'] = null;
        $this->form_data['cuisines'] = [];
        $this->form_data['meal_types'] = [];
        $this->form_data['facebook'] = '';
        $this->form_data['instagram'] = '';
        $this->users = User::role('restaurant-admin')->get();
    }



    public function submit()
    {

//        dd($this->form_data);

        $coords_json = json_decode($this->coordinates);
//        dd($coords_json->lat);
        $this->validate();


        $new_restaurant = Restaurant::create(
            [
                'name_en' => $this->form_data['name_en'],
                'name_ar' => $this->form_data['name_ar'],
                'email' => $this->form_data['email'],
                'coordinates' => $coords_json->lat.','.$coords_json->lng,
                'address' => $this->form_data['address'],
                'phone' => $this->form_data['phone'],
                'user_id' => $this->form_data['user_id'],
                'max_party_size' => $this->form_data['max_party_size'],
                'estimated_dining_time' => $this->form_data['estimated_dining_time'],
                'facebook' => $this->form_data['facebook'],
                'instagram' => $this->form_data['instagram'],
            ]
        );
        $new_restaurant->cuisines()->attach($this->form_data['cuisines']);
        $new_restaurant->meal_types()->attach($this->form_data['meal_types']);
        $new_restaurant->addFromMediaLibraryRequest($this->restaurant_image)
            ->toMediaCollection('restaurant_images');
        $new_restaurant->addFromMediaLibraryRequest($this->restaurant_bg)
            ->toMediaCollection('restaurant_bgs');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Restaurant created Successfully!!"
        ]);
    }
    public function render()
    {
        $cuisines = Cuisine::all();
        $meal_types = MealType::all();
        $users = User::role('restaurant-admin')->get();
        return view('livewire.admin.restaurants.create',compact(['cuisines','users']));
    }
}
