<div class="container">
    <div class="row">
        <div class="py-5"></div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="buttons-container">
                <div class="d-grid gap-2 col-8 mx-auto">
                    <a href="#" class="btn btn-primary shadow rounded-lg">Button</a>
                    <a href="#" class="btn btn-primary shadow">Button</a>
                    <a href="#" class="btn btn-primary shadow">Button</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-container ">
                <form wire:submit.prevent="register">
                    <div class="mb-3 shadow input-container">
                        @error('form_data.name') <span class="danger">{{$message}}</span> @enderror

                        <input wire:model.lazy="form_data.name"
                            type="text" class="form-control"
                               placeholder="Restaurant Name">
                    </div>
                    <div class="mb-3 shadow input-container">
                        @error('form_data.owner') <span class="danger">{{$message}}</span> @enderror

                        <input wire:model.lazy="form_data.owner"
                            type="text" class="form-control"
                               placeholder="Owner Name">
                    </div>

                    <div class="mb-3 shadow input-container">
                        @error('form_data.locations') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="form_data.locations"
                            type="text" class="form-control"
                               placeholder="Number of Locations">
                    </div>
                    <div class="mb-3 shadow input-container">
                        @error('form_data.email') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="form_data.email"
                            type="text" class="form-control"
                               placeholder="E-mail">
                    </div>
                    <div class="mb-3 shadow input-container">
                        @error('form_data.phone') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="form_data.phone"
                            type="text" class="form-control"
                               placeholder="Phone Number">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn-nadil" type="submit">All Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="py-3"></div>
    </div>
</div>
