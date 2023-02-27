<div class="w-full rounded-[19px] shadow-md font-lato uppercase py-4 md:max-w-6xl bg-nadilBtn-100 mx-auto my-8 px-6">
    <div class="row">
        <div class="py-5"></div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="form-container ">
                <h2 class="ltr:font-lato rtl:font-ahlan text-center font-bold uppercase text-lg ltr:tracking-[4px] rtl:tracking-normal mb-8">{{__('Create an account')}}</h2>
                <form wire:submit.prevent="register">
                    <div class="mb-3 shadow input-container">
                        @error('profile.name') <span class="danger">{{$message}}</span> @enderror

                        <input wire:model.lazy="profile.name"
                               type="text" class="w-full rounded-[19px] shadow-md font-lato uppercase py-4"
                               placeholder="Your Name">
                    </div>

                    <div class="mb-3 shadow input-container">
                        @error('profile.email') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="profile.email"
                               type="text" class="w-full rounded-[19px] shadow-md font-lato uppercase py-4"
                               placeholder="Your E-mail">
                    </div>
                    <div class="mb-3 shadow input-container">
                        @error('profile.gender') <span class="danger">{{$message}}</span> @enderror
                        <select class="w-full rounded-[19px] shadow-md font-lato uppercase py-4" aria-label="Gender" wire:model="profile.gender">
                            <option selected>Select Gender</option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                    <div class="mb-3" wire:ignore>
                        @error('date_of_birth') <span class="danger">{{$message}}</span> @enderror
                        <input  id="dob"
                               type="text" class="w-full rounded-[19px] shadow-md font-lato uppercase py-4"
                               placeholder="Date of birth">
                    </div>
                    <div class="mb-3 shadow input-container">
                        @error('profile.phone') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="profile.phone"
                               type="text" class="w-full rounded-[19px] shadow-md font-lato uppercase py-4"
                               placeholder="Phone Number">
                    </div>

                    <div class="mb-3 shadow input-container">
                        @error('password') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="password"
                               type="password" class="w-full rounded-[19px] shadow-md font-lato uppercase py-4"
                               placeholder="Password">
                    </div>
                    <div class="mb-3 shadow input-container">
                        @error('password_confirmation') <span class="danger">{{$message}}</span> @enderror
                        <input wire:model.lazy="password_confirmation"
                               type="password" class="w-full rounded-[19px] shadow-md font-lato uppercase py-4"
                               placeholder="Password Confirmation">
                    </div>
                    <div class="flex justify-end">
                        <button class="bg-nadilBg-100 uppercase px-6 py-4 rounded-md font-lato rtl:font-ahlan" type="submit">All Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="py-3"></div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .flatpickr-day.selected{
            background: #0a0e14;
        }
        .flatpickr-day.selected:hover{
            background: #666666;
        }
    </style>

@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ar.js"></script>
<script>
    var booking_date = flatpickr("#dob", {
        "locale": "{{app()->getLocale()}}",
        dateFormat: 'y-m-d',
    });
    booking_date.config.onChange.push(function(selectedDates,dateStr,instance) {
        console.log(dateStr);
    @this.date_of_birth = dateStr;
    } );

</script>

@endpush
