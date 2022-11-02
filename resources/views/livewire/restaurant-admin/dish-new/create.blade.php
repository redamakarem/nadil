<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Dish</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form wire:submit.prevent="submit">
        <div class="card-body">
            <div class="form-group">
                <label for="name_en">Restaurant</label>
                <select class="form-control" wire:model='selected_restaurant_id'>
                    <option value="">{{__('Select Restaurant')}}</option>
                    @foreach ($restaurants as $restaurant)
                        <option value="{{$restaurant->id}}">{{$restaurant->name_en}}</option>
                    @endforeach
                </select>
            </div>
            @if ($menus)
            <div class="form-group">
                <label for="name_en">Menu</label>
                <select class="form-control" wire:model='selected_menu'>
                    <option value="">{{__('Select Menu')}}</option>
                    @foreach ($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            @if ($menus)
            <div class="form-group">
                <label for="name_en">Cuisine</label>
                <select class="form-control" wire:model='selected_cuisine'>
                    <option value="">{{__('Select Cuisine')}}</option>
                    @foreach ($cuisines as $cuisine)
                        <option value="{{$cuisine->id}}">{{$cuisine->name_en}}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if ($menus)
            <div class="form-group">
                <label for="name_en">English Name</label>
                <input type="text" class="form-control" wire:model='new_dish.name_en'>
            </div>
            @endif
            @if ($menus)
            <div class="form-group">
                <label for="name_en">Arabic Name</label>
                <input type="text" class="form-control" wire:model='new_dish.name_ar'>
            </div>
            @endif
            @if ($menus)
            <div class="form-group">
                <label for="name_en">English Description</label>
                <textarea type="text" class="form-control" wire:model='new_dish.description_en' rows="3"></textarea>
            </div>
            @endif
            @if ($menus)
            <div class="form-group">
                <label for="name_en">Arabic Description</label>
                <textarea type="text" class="form-control" wire:model='new_dish.description_ar' rows="3"></textarea>
            </div>
            @endif
            @if ($menus)
            <div class="form-group">
                <label for="name_en">Prep Time</label>
                <input type="text" class="form-control" wire:model='new_dish.prep_time'>
            </div>
            @endif
            
            <div class="form-group">
                
                <x-media-library-attachment name="cuisine_image"/>
            </div>
            <div class="form-group">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>



<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>

@push('scripts')
    <script>
        jQuery(document).ready(function () {
            window.addEventListener('alert', ({detail: {type, message}}) => {
                if (type === 'success') {
                    toastr.success(message);
                } else {
                    toastr.error(message);
                }
            });

            toastr.options.onHidden = function () {
                Livewire.emit('cuisineAdded');
            }
        });


    </script>
@endpush
