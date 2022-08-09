<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit dish for category {{$category->name}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form wire:submit.prevent="submit">
        <div class="card-body">
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

            <div class="form-group">
                <label for="name">Dish English Name</label>
                <input wire:model="dish.name_en"
                       type="text" class="form-control" id="name" placeholder="Enter Dish English name">
            </div>
            <div class="form-group">
                <label for="name">Dish Arabic Name</label>
                <input wire:model="dish.name_ar"
                       type="text" class="form-control" id="name" placeholder="Enter Dish Arabic name">
            </div>
            <div class="form-group">
                <label for="name">English Description</label>
                <textarea wire:model="dish.description_en"
                          type="text" class="form-control" id="description_en" rows="3" placeholder="Enter Dish description"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Arabic Description</label>
                <textarea wire:model="dish.description_ar"
                          type="text" class="form-control" id="description_ar" rows="3" placeholder="Enter Dish description"></textarea>
            </div>

            <div class="form-group">
                <label for="name">Dish Price</label>
                <input wire:model="dish.price"
                       type="text" class="form-control" id="price" placeholder="Enter Dish price">
            </div>
            <div class="form-group">
                <label for="name">Restaurant</label>
                <input type="text" class="form-control" id="restaurant_id" placeholder="{{$restaurant->name_en}}" disabled>
            </div>
            <div class="form-group">
                <label for="name">Prep Time</label>
                <input type="text" class="form-control" id="prep_time" placeholder="Eg: 20 min" wire:model="dish.prep_time">
            </div>

            <div class="form-group">
                <label for="name">Menu</label>
                <input type="text" class="form-control" id="restaurant_id" placeholder="{{$dishesMenu->name}}" disabled>
            </div>
            <div class="form-group">
                <label for="name">Image</label>
                <x-media-library-attachment name="dish_image" />
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
                <label>{{__('Active')}}</label>
                <livewire:components.toggle-button
                    :model="$dish"
                    field="isActive"
                    key="{{ $dish->id }}"/>
            </div>


        </div>



        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

