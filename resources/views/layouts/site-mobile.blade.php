<!doctype html>
<html lang="{{ app()->getLocale() }}" 
@role('user')
class="{{auth()->user()->is_dark_mode?'dark':''}}"
@endrole
dir="{{ app()->getLocale()=='en'?'ltr':'rtl' }}"
>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        [x-cloak] { display: none !important; }
    </style>
    @stack('styles')
    <title>Nadil</title>
    <!-- Matomo -->
<script>
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//nadil-analytics.generalsenses.com/";
      _paq.push(['setTrackerUrl', u+'matomo.php']);
      _paq.push(['setSiteId', '1']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <!-- End Matomo Code -->
  
</head>

<body class="">
    <main>
        <div id="mobile-wrapper" class="relative lg:hidden min-h-screen" x-data="{ isOpen: false }">
            <div class="sidebar flex-col fixed bg-white dark:bg-black inset-y-0 {{ app()->getLocale() == 'en' ? 'left-0' : 'right-0' }} z-10 w-2/3 max-w-md transform transition duration-200"
                :class="isOpen ? '' : document.getElementsByTagName('html')[0].getAttribute('lang') == 'en' ?
                    '-translate-x-full' : 'translate-x-full'">

                <div class="flex justify-center">
                    <div class="w-24 h-24 mt-14 rounded-full bg-nadilBg-100 flex justify-center items-center">
                        @guest
                            <i class="fa fa-user"></i>
                        @endguest
                        @role('user')
                            <span class="uppercase">{{ auth()->user()->initials }}</span>
                        @endrole
                    </div>
                </div>
                <div class="uppercase text-black dark:text-white text-center mt-5 mb-24">Hi
                    @guest
                        <span>There</span>
                    @endguest
                    @role('user')
                    <span>{{auth()->user()->name}}</span>
                    @endrole
                </div>

                <a href="#" class=" block uppercase text-black dark:text-white py-3 px-8">{{__('nadil.menu.discover')}}</a>

                @role('user')
                    <a href="#" class=" block uppercase text-black dark:text-white py-3 px-8">{{__('nadil.menu.reservations')}}</a>
                    <a href="#" class=" block uppercase text-black dark:text-white py-3 px-8">{{__('nadil.menu.profile')}}</a>
                    <a href="#" class=" block uppercase text-black dark:text-white py-3 px-8">{{__('nadil.menu.settings')}}</a>
                    
                    <form action="{{ route('logout') }}" method="POST"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        @csrf
                        <a href="#" class=" block uppercase text-black dark:text-white py-3 px-8">{{__('nadil.menu.logout')}}</a>
                    </form>
                @endrole
                @guest
                    <a href="{{ route('login') }}" class=" block uppercase text-black dark:text-white py-3 px-8">Login</a>
                @endguest
                <div>
                    @foreach (config('app.available_locales') as $locale)
                        @if (app()->getLocale() != $locale)
                        <a href="{{ request()->url() }}?language={{ $locale }}"
                           class="flex items-center py-3 px-8  text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out text-black dark:to-white">
                            [{{ strtoupper($locale) }}]
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>
            @if (!empty($restaurant))
                <div class="header h-80 bg-black flex-col justify-center bg-cover"
                    style="background-image:url('{{ $restaurant->getFirstMediaUrl('restaurant_images') }}'); background-size: cover">
                @else
                    <div class="header h-80 bg-black flex-col justify-center bg-cover items-stretch"
                        style="background-image:url('{{ asset('images/nadil@2x.png') }}'); background-size: cover">
            @endif
            <div
                class="flex justify-between px-8 pt-24 h-20">
                <div class="avatar bg-black text-white dark:bg-nadilBg-100 dark:text-black h-12 w-12 rounded-full flex justify-center items-center">
                    @guest
                        <i class="fa fa-user"></i>
                    @endguest
                    @role('user')
                        <div class="uppercase">{{ auth()->user()->initials }}</div>
                    @endrole
                </div>
                <div class="avatar bg-black text-white dark:bg-nadilBg-100 dark:text-black h-12 w-12 rounded-full flex justify-center items-center cursor-pointer"
                    @click="isOpen = !isOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="content flex-col items-center bg-nadilBg-100 rounded-[60px] relative -top-16">
            @yield('content')

        </div>
        </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        $('.owl-carousel').owlCarousel({
            rtl: document.getElementsByTagName('html')[0].getAttribute('lang') == 'ar',
            loop: true,
            margin: 15,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
    @livewireScripts
    @stack('scripts')

</body>

</html>
