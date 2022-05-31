@push('styles')

@endpush

<div wire:ignore>
    <input type="text" id="{{ $attributes['id'] }}">
</div>

@push('scripts')
    <script src="{{asset('pickadate/lib/compressed/picker.js')}}"></script>
    <script src="{{asset('pickadate/lib/compressed/picker.date.js')}}"></script>
    <script src="{{asset('pickadate/lib/compressed/picker.time.js')}}"></script>
    <script src="{{asset('pickadate/lib/compressed/legacy.js')}}"></script>
<script>
        document.addEventListener("livewire:load", () => {
            let el = jQuery('#{{ $attributes['id'] }}');
                        el.pickatime({
                            onSet: function () {
                                console.log(this.get('select', 'HH:i'));
                            @this.set('{{ $attributes['wire:model'] }}', this.get('select', 'HH:i'));
                            }
                        });

        });




    </script>
@endpush
