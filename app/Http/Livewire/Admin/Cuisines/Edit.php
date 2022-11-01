<?php

namespace App\Http\Livewire\Admin\Cuisines;

use App\Models\Cuisine;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Edit extends Component
{
    use WithMedia;
    public Cuisine $cuisine;
    public $mediaComponentNames = ['cuisine_image'];
    public $cuisine_image;
    public function mount(Cuisine $cuisine)
    {
        $this->cuisine= $cuisine;
        // dd($this->cuisine->getFirstMediaUrl('cuisine_images'));
    }

    public function render()
    {
        return view('livewire.admin.cuisines.edit');
    }

    public function rules():array {
        return [
            'cuisine.name_en' => ['required'],
            'cuisine.name_ar' => ['required'],
        ];
    }

    protected $listeners = ['cuisineUpdated' => 'goToCuisines'];


    public function submit()
    {
        $this->validate();
        $this->cuisine->save();
        if ($this->cuisine_image){
            $this->cuisine->syncFromMediaLibraryRequest($this->cuisine_image)->toMediaCollection('cuisine_images');
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Cuisine created Successfully!!"
        ]);
    }


    public function goToCuisines()
    {
        $this->redirect(route('admin.cuisines.index'));
    }
}
