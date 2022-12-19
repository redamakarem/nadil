<div class="container">
    <div class="row">
        <div class="py-5"></div>
    </div>
    <div class="row">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-8">
            <div class="form-container ">
                <form wire:submit.prevent="register">
                    <div class="mb-3 shadow input-container flex flex-col">
                        <input wire:model.lazy="form_data.name"
                        type="text" class="form-control"
                        placeholder="Restaurant Name">
                        @error('form_data.name') <span class="danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3 shadow input-container flex flex-col">
                        <input wire:model.lazy="form_data.owner"
                        type="text" class="form-control"
                        placeholder="Owner Name">
                        @error('form_data.owner') <span class="danger">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-3 shadow input-container flex flex-col">
                        <input wire:model.lazy="form_data.locations"
                        type="text" class="form-control"
                        placeholder="Number of Locations">
                        @error('form_data.locations') <span class="danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3 shadow input-container flex flex-col">
                        <input wire:model.lazy="form_data.email"
                        type="text" class="form-control"
                        placeholder="E-mail">
                        @error('form_data.email') <span class="danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3 shadow input-container flex flex-col">
                        <input wire:model.lazy="form_data.phone"
                        type="text" class="form-control"
                        placeholder="Phone Number">
                        @error('form_data.phone') <span class="danger">{{$message}}</span> @enderror
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
