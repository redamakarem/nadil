<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>Nadil</title>
</head>
<body class="">
    <main>
        <div id="mobile-wrapper" class="relative lg:hidden min-h-screen"
             x-data="{isOpen:false}">
            <div class="sidebar flex-col absolute bg-slate-600 inset-y-0 left-0 z-10 w-2/3 max-w-md transform transition duration-200" :class="isOpen?'':'-translate-x-full'"
            >

                <div class="flex justify-center">
                    <div class="w-24 h-24 mt-14 rounded-full bg-nadilBg-100 flex justify-center items-center">RM</div>
                </div>
                <div class="uppercase text-white text-center mt-5 mb-24">Hi Reda!</div>

                <a href="#" class=" block uppercase text-white py-3 px-8">Home</a>
                <a href="#" class=" block uppercase text-white py-3 px-8">Reservations</a>
                <a href="#" class=" block uppercase text-white py-3 px-8">Profile</a>
                <a href="#" class=" block uppercase text-white py-3 px-8">Settings</a>
            </div>
            <div
                class="header h-80 bg-black flex-col justify-center bg-cover"
                style="background-image: url('./images/usquyu.jpg')"
            >
                <div class="flex justify-between px-8 pt-24 h-20">
                    <div class="avatar bg-nadilBg-100 h-12 w-12 rounded-full">

                    </div>
                    <div class="avatar bg-nadilBg-100 h-12 w-12 rounded-full flex justify-center items-center cursor-pointer"
                         @click="isOpen = !isOpen">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                </div>
            </div>
            <div
                class="content flex-col items-center bg-nadilBg-100 rounded-[60px] relative -top-16 py-10 p-8"
            >
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

</body>
</html>
