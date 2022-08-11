<?php

namespace App\Http\Livewire\Admin\Cuisines;

use App\Models\Cuisine;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Create extends Component
{
    use WithMedia;
    public $name_en;
    public $name_ar;
    public $mediaComponentNames = ['cuisine_image'];
    public $cuisine_image;


    protected $rules = [
        'name_en' => ['required'],
        'name_ar' => ['required'],
        'cuisine_image' => ['required'],

    ];

    protected $listeners = ['cuisineAdded' => 'goToCuisines'];

    protected $messages = [
        'form_data.name.required' => 'Cuisine name is required'
    ];


    public function goToCuisines()
    {
        $this->redirect(route('admin.cuisines.index'));
    }

    public function submit()
    {
        $this->validate();
        $new_cuisine = Cuisine::create([
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
        ]);
        $new_cuisine->addFromMediaLibraryRequest($this->cuisine_image)->toMediaCollection('cuisine_images');

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Cuisine created Successfully!!"
        ]);

    }


    public function render()
    {
        return view('livewire.admin.cuisines.create');
    }
}
