<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @livewireStyles
</head>
<body>
<div class="page-wrapper d-flex flex-column min-vh-100">
    <header class="">
        <div class="container-xxl d-flex justify-content-between">
            <div id="logo" class="">
                <img src="{{asset('images/logo@2x.png')}}" class="" alt="">
            </div>
            @guest
                <div class="guest-menu d-lg-flex d-none">
                    <nav id="guest-menu" class="d-flex justify-content-center align-items-center">
                        <a href="{{route('home')}}" class="menu-link menu-link px-5 py-2 d-inline-block mx-2">Discover</a>
                        <a href="#" class="menu-link menu-link px-5 py-2 d-inline-block mx-2">Contact Us</a>
                        <a href="{{route('login')}}" class="menu-link menu-link px-5 py-2 d-inline-block mx-2">Login</a>
                        <a href="{{route('site.user-register')}}" class="menu-link menu-link px-5 py-2 d-inline-block mx-2">Sign Up Now</a>
                    </nav>
                </div>
                <div class="mobile-toggle d-lg-none flex-column justify-content-center d-flex">
                    <button class="btn btn-primary rounded" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                            aria-controls="offcanvasExample">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            @endguest
            @hasanyrole('user|admin')
            <nav id="guest-menu" class="d-flex justify-content-center align-items-center">
                <a href="{{route('home')}}" class="menu-link menu-link px-5 py-2 d-inline-block mx-2">Discover</a>
                <a href="#" class="menu-link menu-link px-5 py-2 d-inline-block mx-2">Reservations</a>
                <a href="#" class="menu-link menu-link px-5 py-2 d-inline-block mx-2">Profile</a>
                <form action="{{route('logout')}}" method="POST" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    @csrf
                    <a href="#" class="menu-link menu-link px-5 py-2 d-inline-block mx-2">Logout</a>
                </form>
            </nav>
            @endhasanyrole
        </div>

    </header>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Dark Mode</label>
            </div>
        </div>
    </div>
    <main class="flex-fill justify-content-center d-flex flex-column">
        @yield('content')
    </main>
    <footer class="">
        <div class="d-flex justify-content-end align-items-center">
            <a href="#">Cancellation Policy</a>
            <a href="#">Contact Us</a>
            <a href="">FAQ</a>
            <a href=""><img src="{{asset('images/insta@2x.png')}}" class="insta" alt=""></a>
        </div>
    </footer>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('admin-lte/plugins/moment/moment.min.js')}}"></script>
@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.owl-carousel').owlCarousel({
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
@stack('scripts')
</body>
</html>
