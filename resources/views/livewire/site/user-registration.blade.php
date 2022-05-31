<div class="container">
    <div class="row">
        <div class="py-5"></div>
    </div>
    <div class="row">
{{--        <div class="col-md-4">--}}
{{--            <div class="buttons-container">--}}
{{--                <div class="d-grid gap-2 col-8 mx-auto">--}}
{{--                    <a href="#" class="btn btn-primary shadow rounded-lg">Button</a>--}}
{{--                    <a href="#" class="btn btn-primary shadow">Button</a>--}}
{{--                    <a href="#" class="btn btn-primary shadow">Button</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-md-12">
            <div class="form-container ">
                <form wire:submit.prevent="register">
                    <div class="mb-3 shadow input-container">
                        @error('profile.name') <span class="danger">{{$message}}</span> @enderror

                        <input wire:model.lazy="profile.name"
                               type="text" class="form-control"
                               placeholder="Your Name">
                    </div>

                    <div class="mb-3 shadow input-container">
                        @error('profile.email') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="profile.email"
                               type="text" class="form-control"
                               placeholder="Your E-mail">
                    </div>
                    <div class="mb-3 shadow input-container">
                        @error('profile.gender') <span class="danger">{{$message}}</span> @enderror
                        <select class="form-select" aria-label="Gender" wire:model="profile.gender">
                            <option selected>Select Gender</option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        @error('date_of_birth') <span class="danger">{{$message}}</span> @enderror
                        <div id='inlinePicker'  wire:ignore>
                    </div>
                    <div class="mb-3 shadow input-container">
                        @error('profile.phone') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="profile.phone"
                               type="text" class="form-control"
                               placeholder="Phone Number">
                    </div>

                    <div class="mb-3 shadow input-container">
                        @error('password') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="password"
                               type="password" class="form-control"
                               placeholder="Password">
                    </div>
                    <div class="mb-3 shadow input-container">
                        @error('password_confirmation') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="password_confirmation"
                               type="password" class="form-control"
                               placeholder="Password Confirmation">
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


@push('scripts')
    <script>
        jQuery('#inlinePicker').datepicker({
            format: 'yyyy-mm-dd'
        })
            .on('changeDate', function(e) {
            @this.date_of_birth = e.format();

            });
        // jQuery('#inlinePicker').datepicker('setDate',new Date());
        // jQuery('#inlinePicker').datepicker('update',new Date());
        @this.date_of_birth = moment().format('YYYY-MM-DD');
        console.log(moment().format('YYYY-MM-DD'))

    </script>

@endpush
