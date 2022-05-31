<div class="row">
    <div class="col-12">

        <!-- form start -->
        <form wire:submit.prevent="submit">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Booking</h3>
                </div>
                <!-- /.card-header -->
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
                        <label for="restaurant">Restaurant</label>
                        <x-select-list id="restaurant" wire:model="booking.restaurant_id"
                                       :options="$this->listsForFields['restaurant']"></x-select-list>
                    </div>
                    <div class="form-group">
                        <label for="user">User</label>
                        <x-select-list id="user" wire:model="booking.user_id"
                                       :options="$this->listsForFields['user']"></x-select-list>
                    </div>
                    <div class="form-group">
                        <label for="booking_date">Booking Date</label>
                        <div wire:ignore>
                            <input type="text" id="booking_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">

                            @foreach($slot_options as $key =>$value)
                                <label class="btn btn-secondary {{$slot_options[$key]==$selected_time?'active':''}}">
                                    <input type="radio" wire:model="selected_time" value="{{$value}}"> {{$value}}
                                </label>
                            @endforeach


                    </div>


                    <div class="form-group">
                        <label for="booking_phone">Phone</label>
                        <input wire:model="booking.phone"
                               type="text" class="form-control" id="booking_phone" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label for="booking_seats">Seats</label>
                        <input wire:model="booking.seats"
                               type="text" class="form-control" id="booking_seats" placeholder="Enter number of seats">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>


    </div>
</div>



@push('styles')
    <link rel="stylesheet" href="{{asset('pickadate/lib/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('pickadate/lib/themes/default.date.css')}}">
    <link rel="stylesheet" href="{{asset('pickadate/lib/themes/default.time.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endpush
@push('scripts')

    <script src="{{asset('pickadate/lib/compressed/picker.js')}}"></script>
    <script src="{{asset('pickadate/lib/compressed/picker.date.js')}}"></script>
    <script src="{{asset('pickadate/lib/compressed/picker.time.js')}}"></script>
    <script src="{{asset('pickadate/lib/compressed/legacy.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        jQuery(document).ready(function () {
            jQuery('#booking_date').pickadate({
                onSet: function () {
                    console.log(this.get('select', 'yyyy-mm-dd'));
                @this.set('selected_date', this.get('select', 'yyyy-mm-dd'));
                }
            });
            jQuery('#end_date').pickadate({
                onSet: function () {
                    console.log(this.get('select', 'yyyy-mm-dd'));
                @this.set('end_date', this.get('select', 'yyyy-mm-dd'));
                }
            });
            jQuery('#booking_time').pickatime({
                onSet: function () {
                    console.log(this.get('select', 'HH:i'));
                @this.set('booking_time', this.get('select', 'HH:i'));
                }
            });
            jQuery('#end_time').pickatime({
                onSet: function () {
                    console.log(this.get('select', 'HH:i'));
                @this.set('end_time', this.get('select', 'HH:i'));
                }
            });
            // var booking_date = flatpickr("#booking-date", {
            //     inline: true,
            //     dateFormat: 'y-m-d',
            //     minDate:'today'
            // });
            // booking_date.config.onChange.push(function(selectedDates,dateStr,instance) {
            //     console.log(dateStr);
            // @this.selected_date = dateStr;
            // } );
            window.addEventListener('alert', ({detail: {type, message}}) => {
                if (type === 'success') {
                    toastr.success(message);
                } else {
                    toastr.error(message);
                }
            });

            toastr.options.onHidden = function () {
                Livewire.emit('ScheduleAdded');
            }
        })
    </script>
@endpush

