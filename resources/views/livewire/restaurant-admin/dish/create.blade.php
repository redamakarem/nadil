<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add a dish for category {{$category->name}}</h3>
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
                <label for="name">Dish Name</label>
                <input wire:model="dish.name"
                       type="text" class="form-control" id="name" placeholder="Enter Dish name">
            </div>
            <div class="form-group">
                <label for="name">Dish Description</label>
                <textarea wire:model="dish.description"
                          type="text" class="form-control" id="description" rows="3" placeholder="Enter Dish description"></textarea>
            </div>

            <div class="form-group">
                <label for="name">Dish Price</label>
                <input wire:model="dish.price"
                       type="text" class="form-control" id="price" placeholder="Enter Dish price">
            </div>
            <div class="form-group">
                <label for="name">Restaurant</label>
                <input type="text" class="form-control" id="restaurant_id" placeholder="{{$restaurant->name}}" disabled>
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
                <label>Custom Select</label>
                <x-select-list class="form-control" required id="cuisine" name="cuisine" :options="$this->listsForFields['cuisine']" wire:model="dish.cuisine_id" />

            </div>


        </div>



        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
