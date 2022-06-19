<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Step {{$current_step +1}}/{{count($steps)}} - {{$steps[$current_step]}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="name_en">English Name</label>
                        <input type="text" name="name_en" class="form-control"
                               id="name_en" placeholder="Enter name" wire:model="restaurant.name_en">
                        @error('restaurant.name_en')<p class="error">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="name_en">Arabic Name</label>
                        <input type="text" name="name_en" class="form-control"
                               id="name_en" placeholder="Enter name" wire:model="restaurant.name_ar">
                        @error('restaurant.name_ar')<p class="error">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control"
                               id="email" placeholder="Enter email" wire:model.defer="restaurant.email">
                        @error('restaurant.name_ar')<p class="error">{{$message}}</p>@enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" wire:click = 'next_step' class="btn btn-primary">Submit</button>
                </div>
            </form>


        </div>
        <!-- /.card -->
    </div>
</div>
