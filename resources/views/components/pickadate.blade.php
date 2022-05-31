<div wire:ignore>
    <input
           type="text" class="form-control pdate" id="booking_date" placeholder="Choose booking date">
</div>

@once
@push('styles')
    <link rel="stylesheet" href="{{asset('pickadate/lib/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('pickadate/lib/themes/default.date.css')}}">
    <link rel="stylesheet" href="{{asset('pickadate/lib/themes/default.time.css')}}">
@endpush
@push('scripts')
    <script src="{{asset('pickadate/lib/compressed/picker.js')}}"></script>
    <script src="{{asset('pickadate/lib/compressed/picker.date.js')}}"></script>
    {{--    <script src="{{asset('pickadate/lib/compressed/picker.time.js')}}"></script>--}}
    <script src="{{asset('pickadate/lib/compressed/legacy.js')}}"></script>
    <script>
        document.addEventListener("livewire:load", () => {
            let el = jQuery('#{{ $attributes['id'] }}')
            function initPickadate () {
                el.pickadate({
                    onSet: function () {
                        console.log(this.get('select', 'yyyy-mm-dd'));
                    @this.set('{{ $attributes['wire:model'] }}', this.get('select', 'yyyy-mm-dd'));
                    }
                });
            }

            initPickadate()


            Livewire.hook('message.processed', (message, component) => {
                initPickadate();
            });

        });
    </script>
@endpush
@endonce
