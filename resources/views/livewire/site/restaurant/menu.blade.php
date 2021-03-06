




<div>
    <div class="bg-[#f5f5f5] min-h-[500px] rounded-[64px] py-8 shadow-md">
        @foreach($restaurant->menus[0]->categories as $category)
        <div class="category-container my-4">
            <div class="font-lato font-bold uppercase tracking-widest text-4xl text-center">{{  $category->name  }}</div>
            @foreach($category->dishes  as $dish)
                @if (!$dish->is_featured)
                <div class="dish-container my-4 ">
                    <div class="flex flex-col font-lato font-bold uppercase tracking-[4px] text-2xl text-center">{{ $dish->{'name_'.app()->getLocale()} }}</div>
                    <div class="flex flex-col font-lato tracking-[4px] text-[22px] text-center">{{$dish->description}}</div>
                </div>

                @else
                <div class="dish-container flex w-2/3 mx-auto bg-[#e0e0e0] px-8 py-12 rounded-[19px] shadow-md">
                    <div class="w-1/4 flex justify-center">
                        <img src="{{$dish->getFirstMediaUrl('dish_images')}}" alt="" class="rounded-full h-24 w-24 shadow-md">
                    </div>
                    <div class="w-3/4 flex flex-col ">
                        <div class="flex flex-col font-lato font-bold uppercase tracking-[4px] text-[22px] text-center">{{ $dish->{'name_'.app()->getLocale()} }}</div>
                        <div class="flex flex-col font-lato tracking-[4px] text-[22px] text-center">{{$dish->description}}</div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        @endforeach
    </div>

</div>


@push('scripts')
    <script>
        jQuery('#menu>div').addClass('flex-grow')
    </script>

@endpush
