<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Dish</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form wire:submit.prevent="submit">
        <div class="card-body">
            
            <div class="form-group">
                <label for="name">Dish English Name</label>
                <input wire:model="dish.name_en"
                       type="text" class="form-control" id="dish.name_en" placeholder="Enter Dish English name">
                @error('dish.name_en')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="name">Dish Arabic Name</label>
                <input wire:model="dish.name_ar"
                       type="text" class="form-control" id="name" placeholder="Enter Arabic Dish name">
                @error('dish.name_ar')<span class="error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="name">Dish Price</label>
                <input wire:model="dish.price"
                       type="text" class="form-control" id="price" placeholder="Enter Dish price">
            </div>
            <div class="form-group">
                <label>{{__('Dish Image')}}</label>
                <x-media-library-attachment name="dish_image"/>
            </div>
            <div class="form-group">
                <label>{{__('English Description')}}</label>
                <textarea name="" id="description_en"  wire:model="dish.description_en" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>{{__('Arabic Description')}}</label>
                <textarea name="" id="description_ar"  wire:model="dish.description_ar" class="form-control" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label>Cuisines</label>
                <select class="form-control" style="width: 100%;"
                        id="cuisines" wire:model="selected_cuisine"
                        data-placeholder="Select cuisine(s)" >
                    <option value="0">{{__('Select Cuisine')}}</option>
                    @foreach($cuisines as $cuisine)
                        <option value="{{$cuisine->id}}">{{$cuisine->name_en}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Menu</label>
                <select  style="width: 100%;" class="form-control"
                        id="menus"  wire:model="selected_menu"
                        data-placeholder="Select menu" >
                    <option value="0">{{__('Select Menu')}}</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($selected_menu)
            <div class="form-group" >
                <label>Category</label>
                <select  style="width: 100%;" class="form-control"
                        id="categories"  wire:model="selected_category"
                        data-placeholder="Select menu" >
                    <option value="0">{{__('Select Category')}}</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name_en}}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="form-group">
                <label for="name">Preparation Time</label>
                <input wire:model="dish.prep_time"
                       type="text" class="form-control" id="name" placeholder="Enter Preparation Time">
                @error('dish.prep_time')<span class="error">{{ $message }}</span>@enderror
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
