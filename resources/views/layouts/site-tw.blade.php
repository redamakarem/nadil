<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale()=='en'?'ltr':'rtl'}}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
          integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    @livewireStyles
    @stack('styles')
    <style>
        .owl-dots {
            display: none;
        }
    </style>
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

  
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DYHE5KYQK3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DYHE5KYQK3');
</script>

  
</head>
<body class="ltr:font-lato rtl:font-ahlan rtl:tracking-normal rtl:font-normal">
{{--    <div id="dev" class="bg-cover w-[1920px] h-[1301px] mx-auto bg-slate-100 flex flex-col"--}}
{{--         style="background-image:url('{{asset('images/profile-bg.png')}}'); background-size:cover;"--}}
{{--    >--}}
<div id="desktop-wrapper" class="hidden lg:flex h-screen flex-col">
    <header class="h-[270px]">
        <div id="header-wrapper" class="bg-black h-full flex items-center">
            <div id="header-content" class="mx-auto bg-black h-36 h-full w-full">
                @guest
                    <div
                        id="nav-wrapper"
                        class="hidden lg:flex justify-between items-center h-full w-[80%] max-w-12xl mx-auto"
                    >
                        <div id="logo" class="w-1/3 h-full flex justify-start items-center py-4">
                            <a href="{{route('home')}}"><img src="{{asset('/images/logo@2x.png')}}" alt="" class="h-32 w-auto"/></a>
                        </div>
                        <div class="flex space-x-2 mx-2 w-2/3 h-full justify-center items-center">
                            <a
                                href="{{route('home')}}"
                                class="bg-gray-400 rtl:ml-2 px-11 rounded-md uppercase ltr:font-lato rtl:font-ahlan rtl:tracking-normal rtl:font-normal text-sm ltr:font-semibold py-4 px-16 tracking-[4px] rtl:tracking-normal rounded-[19px]"
                            >{{__('nadil.menu.discover')}}</a
                            >
                            <a
                                href="{{route('site.contact')}}"
                                class="bg-gray-400 px-11 rounded-md uppercase ltr:font-lato rtl:font-ahlan rtl:tracking-normal rtl:font-normal text-sm ltr:font-semibold py-4 px-16 tracking-[4px] rtl:tracking-normal rounded-[19px]"
                            >{{__('nadil.menu.contact')}}</a
                            >
                            <a
                                href="{{route('login')}}"
                                class="bg-gray-400 px-11 rounded-md uppercase ltr:font-lato rtl:font-ahlan rtl:tracking-normal rtl:font-normal text-sm ltr:font-semibold py-4 px-16 tracking-[4px] rtl:tracking-normal rounded-[19px]"
                            >{{__('nadil.menu.login')}}</a
                            >
                            <a
                                href="#"
                                class="bg-gray-400 px-11 rounded-md uppercase ltr:font-lato rtl:font-ahlan rtl:tracking-normal rtl:font-normal text-sm ltr:font-semibold py-4 px-16 tracking-[4px] rtl:tracking-normal rounded-[19px]"
                            >For Businesses</a
                            >

                        </div>
                        <div>
                            @foreach (config('app.available_locales') as $locale)
                                @if (app()->getLocale() != $locale)
                                <a href="{{ request()->url() }}?language={{ $locale }}"
                                   class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out text-white ltr:font-ahlan rtl:font-lato text-xl">
                                    {{__('nadil.lang.'.$locale)}}
                                </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endguest
                @role('user')
                <div
                    id="nav-wrapper"
                    class="hidden lg:flex justify-between items-center h-full"
                >
                    <div id="logo" class="w-1/3 h-full flex justify-center items-center py-4">
                        <img src="{{asset('/images/logo@2x.png')}}" alt="" class="h-32 w-auto"/>
                    </div>
                    <div class="flex space-x-2 mx-2 w-2/3 h-full justify-center items-center">
                        <a
                            href="{{route('home')}}"
                            class="bg-gray-400 px-11  rounded-md uppercase font-lato rtl:font-ahlan rtl:tracking-normal rtl:font-normal text-sm ltr:font-semibold py-4 px-16 tracking-[4px] rounded-[19px]"
                        >{{__('nadil.menu.discover')}}</a
                        >
                        {{-- <a
                            href="{{route('user.history.show')}}"
                            class="bg-gray-400 px-11  rounded-md uppercase rtl:font-ahlan rtl:tracking-normal rtl:font-normal font-lato text-sm ltr:font-semibold py-4 px-16 ltr:tracking-[4px] rtl:tracking-normal rounded-[19px]"
                        >{{__('nadil.menu.reservations')}}</a
                        > --}}
                        <a
                            href="{{route('user.profile.show')}}"
                            class="bg-gray-400 px-11  rounded-md uppercase font-lato rtl:font-ahlan rtl:tracking-normal rtl:font-normal text-sm ltr:font-semibold py-4 px-16 tracking-[4px] rounded-[19px]"
                        >{{__('nadil.menu.profile')}}</a
                        >
                        <form action="{{route('logout')}}" method="POST" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            @csrf
                            <a
                                href="#"
                                class="bg-gray-400 px-11  rounded-md uppercase font-lato rtl:font-ahlan rtl:tracking-normal rtl:font-normal text-sm ltr:font-semibold py-4 px-16 tracking-[4px] rounded-[19px]"
                            >{{__('nadil.menu.logout')}}</a>
                        </form>
                        <div>
                            @foreach (config('app.available_locales') as $locale)
                                @if (app()->getLocale() != $locale)
                                <a href="{{ request()->url() }}?language={{ $locale }}"
                                   class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out text-white">
                                    [{{ strtoupper($locale) }}]
                                </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    
                </div>
                @endrole
            </div>
        </div>
    </header>
    <main class="flex flex-col flex-grow">
        @yield('content')
    </main>
    <footer class="h-20">
        <div
            id="footer-content"
            class="content bg-black h-20 flex justify-between"
        >
            <div></div>
            <div class="flex space-x-2 items-center mx-2">
                <a href="" class="text-white font-bold font-din uppercase tracking-[4px]">Cancellation Policy</a>
                <a href="" class="text-white font-bold font-din uppercase tracking-[4px]">Contact Us</a>
                <a href="" class="text-white font-bold font-din uppercase tracking-[4px]">FAQ</a>
            </div>
        </div>
    </footer>
</div>
{{--    </div>--}}


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DYHE5KYQK3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DYHE5KYQK3');
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<script>
    
</script>
@livewireScripts
@stack('scripts')
</body>
</html>
