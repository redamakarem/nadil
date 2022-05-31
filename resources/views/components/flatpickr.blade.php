
        <div id="booking-date" ></div>


@once
@push('scripts')


    <script>
        document.addEventListener("livewire:load", () => {




            function initFlatpickr () {
                var booking_date = flatpickr("#booking_date", {
                    inline: true,
                    dateFormat: 'y-m-d',
                    minDate:'today'
                });
                console.log(booking_date);
                booking_date.config.onChange.push(function(selectedDates,dateStr,instance) {
                    console.log(dateStr);
                @this.set('{{ $attributes['wire:model'] }}', dateStr)
                } );
            }

            initFlatpickr()

            Livewire.hook('message.processed', (message, component) => {
                initFlatpickr()
            });

            {{--el.on('change', function (e) {--}}
            {{--    let data = $(this).select2("val")--}}
            {{--    if (data === "") {--}}
            {{--        data = null--}}
            {{--    }--}}
            {{--@this.set('{{ $attributes['wire:model'] }}', data)--}}
            {{--});--}}
        });
    </script>
@endpush
@endonce
