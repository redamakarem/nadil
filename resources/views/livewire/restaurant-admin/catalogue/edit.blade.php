<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Menu for restaurant {{$restaurant->name}}</h3>
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
                <label for="name">Menu Name</label>
                <input wire:model="menu.name"
                       type="text" class="form-control" id="name" placeholder="Enter cuisine name">
            </div>
            <div class="form-group" wire:ignore>
                <label for="start_date">Start Date</label>
                <input wire:model="start_date"
                       type="text" class="form-control pdate" id="start_date" placeholder="Choose start date">
            </div>
            <div class="form-group"  wire:ignore>
                <label for="end_date">End Date</label>
                <input wire:model="end_date"
                       type="text" class="form-control pdate" id="end_date" placeholder="Choose end date">
            </div>
            <div class="form-group"  wire:ignore>
                <label for="start_time">Start Time</label>
                <input wire:model="start_time"
                       type="text" class="form-control ptime" id="start_time" placeholder="Choose start time">
            </div>
            <div class="form-group"  wire:ignore>
                <label for="end_time">End Time</label>
                <input wire:model="end_time"
                       type="text" class="form-control ptime" id="end_time" placeholder="Choose end time">
            </div>

        </div>



        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>



@push('styles')
    <link rel="stylesheet" href="{{asset('pickadate/lib/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('pickadate/lib/themes/default.date.css')}}">
    <link rel="stylesheet" href="{{asset('pickadate/lib/themes/default.time.css')}}">
@endpush
@push('scripts')

    <script src="{{asset('pickadate/lib/compressed/picker.js')}}"></script>
    <script src="{{asset('pickadate/lib/compressed/picker.date.js')}}"></script>
    <script src="{{asset('pickadate/lib/compressed/picker.time.js')}}"></script>
    <script src="{{asset('pickadate/lib/compressed/legacy.js')}}"></script>

    <script>
        jQuery(document).ready(function () {
            var start_date;
            var end_date;
            var start_time;
            var end_time;

            var sdate;
            var edate;
            var stime;
            var etime;
            sdate = @this.start_date;
            start_date = jQuery('#start_date').pickadate({

                onSet: function() {
                    sdate = this.get('select', 'yyyy-mm-dd');
                @this.set('start_date',this.get('select', 'yyyy-mm-dd'));
                }
            });
            start_date.pickadate('set').set('select', new Date(sdate) , { format: 'yyyy-mm-dd' })

            edate = @this.end_date;
            end_date = jQuery('#end_date').pickadate({
                onSet: function() {
                @this.set('end_date',this.get('select', 'yyyy-mm-dd'));
                }
            });
            end_date.pickadate('set').set('select', new Date(edate) , { format: 'yyyy-mm-dd' })

            stime = @this.start_time;
            console.log(stime);
            start_time = jQuery('#start_time').pickatime({
                onSet: function() {
                @this.set('start_time',this.get('select', 'HH:i'));
                }
            });
            start_time.pickatime('picker').set('select', stime , { format: 'HH:i' })


            etime = @this.end_time;
            end_time = jQuery('#end_time').pickatime({
                onSet: function() {
                @this.set('end_time',this.get('select', 'HH:i'));
                }
            });
            end_time.pickatime('picker').set('select', etime , { format: 'HH:i' })


            window.addEventListener('alert', ({detail: {type, message}}) => {
                if (type === 'success') {
                    toastr.success(message);
                } else {
                    toastr.error(message);
                }
            });

            toastr.options.onHidden = function () {
                Livewire.emit('menuAdded');
            }
        })
    </script>
@endpush


