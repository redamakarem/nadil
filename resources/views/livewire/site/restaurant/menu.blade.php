{{--<div class="row">--}}

{{--    @foreach($restaurant->menus[0]->categories as $category)--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="selected-date btn-restaurant menu-category text-center">--}}
{{--                    {{  $category->name  }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}

{{--            <div class="container">--}}

{{--                @foreach($category->dishes->chunk(3) as $row)--}}
{{--                    <div class="row">--}}
{{--                        @foreach($row as $dish)--}}

{{--                            <div class="col">--}}
{{--                                <div class="dish mt-4 py-8 px-4">--}}

{{--                                    <div class="row">--}}
{{--                                        @if($dish->getMedia('dish_images')->count()==0)--}}
{{--                                            <div class="dish-title text-uppercase">{{$dish->name}}</div>--}}
{{--                                            <div class="dish-description">{{$dish->description}}</div>--}}
{{--                                        @else--}}
{{--                                            <div class="col-md-4">--}}
{{--                                                <img class="rounded-circle img-fluid" src="{{$dish->getFirstMediaUrl('dish_images')}}" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-8">--}}
{{--                                                <div class="dish-title">{{$dish->name}}</div>--}}
{{--                                                <div class="dish-description">{{$dish->description}}</div>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}

{{--</div>--}}


<div>
{{--    <div class="flex flex-col h-[800px] space-y-8 overflow-y-scroll">--}}
{{--        @foreach($restaurant->menus[0]->categories as $category)--}}
{{--            <div class="mb-8">--}}
{{--                <div class="flex max-h-full">--}}
{{--                    <div class="flex justify-center h-24 items-center w-1/3 px-2 py-1 rounded-[19px] bg-nadilBtn-100">--}}
{{--                        <div--}}
{{--                            class="bg-nadilBtn-100 uppercase tracking-[4px] font-lato text-[20px] ">{{  $category->name  }}</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="mt-6 grid grid-cols-3 gap-3">--}}
{{--                    @foreach($category->dishes  as $dish)--}}
{{--                        @if($dish->getMedia('dish_images')->count()==0)--}}
{{--                            <div class="flex flex-col justify-center items-center bg-nadilBtn-100 h-44 rounded-[19px]">--}}
{{--                                <div class="font-lato text-[15px] text-center font-bold uppercase tracking-[4px]">{{$dish->name}}</div>--}}
{{--                                <div class="font-lato text-[12px] text-center uppercase tracking-[4px]">{{$dish->description}}</div>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div class="flex bg-nadilBtn-100 h-44 rounded-[19px]">--}}
{{--                                <div class="w-1/3 flex flex-col justify-center items-center">--}}
{{--                                    <img class="rounded-full h-24 w-24"--}}
{{--                                         src="{{$dish->getFirstMediaUrl('dish_images')}}" alt="" />--}}
{{--                                </div>--}}
{{--                                <div class="flex flex-col justify-center">--}}
{{--                                    <div class="font-lato text-[12px] font-bold text-center uppercase tracking-[4px]">{{$dish->name}}</div>--}}
{{--                                    <div class="font-lato text-[12px] text-center uppercase tracking-[4px]">{{$dish->description}}</div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        @endif--}}


{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
    <div class="bg-[#f5f5f5] min-h-[500px] rounded-[64px] py-8 shadow-md">
        @foreach($restaurant->menus[0]->categories as $category)
        <div class="category-container my-4">
            <div class="font-lato font-bold uppercase tracking-widest text-4xl text-center">{{  $category->name  }}</div>
            @foreach($category->dishes  as $dish)
                @if (!$dish->is_featured)
                <div class="dish-container my-4 ">
                    <div class="flex flex-col font-lato font-bold uppercase tracking-[4px] text-2xl text-center">{{$dish->name}}</div>
                    <div class="flex flex-col font-lato tracking-[4px] text-[22px] text-center">{{$dish->description}}</div>
                </div>

                @else
                <div class="dish-container flex w-2/3 mx-auto bg-[#e0e0e0] px-8 py-12 rounded-[19px] shadow-md">
                    <div class="w-1/4 flex justify-center">
                        <img src="{{$dish->getFirstMediaUrl('dish_images')}}" alt="" class="rounded-full h-24 w-24 shadow-md">
                    </div>
                    <div class="w-3/4 flex flex-col ">
                        <div class="flex flex-col font-lato font-bold uppercase tracking-[4px] text-[22px] text-center">{{$dish->name}}</div>
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
