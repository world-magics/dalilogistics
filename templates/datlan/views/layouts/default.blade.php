<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Datlan</title>
    <link rel="stylesheet" href="/template/datlan/assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/template/datlan/css/style.min.css">
	<link rel="stylesheet" href="/template/datlan/assets/css/creative-design.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="/template/datlan/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/template/datlan/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/template/datlan/remixicon/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="//code.jivosite.com/widget/8w6ZWDhXk8" async></script>
    <style>
        @media (max-width: 768px) {
            .carousel-inner .carousel-item > div {
                display: none;
            }
            .carousel-inner .carousel-item > div:first-child {
                display: block;
            }
            }

            .carousel-inner .carousel-item.active,
            .carousel-inner .carousel-item-start,
            .carousel-inner .carousel-item-next,
            .carousel-inner .carousel-item-prev {
            display: flex;
            // transition-duration: 10s;
            }

            /* display 4 */
            @media (min-width: 768px) {
            .carousel-inner .carousel-item-right.active,
            .carousel-inner .carousel-item-next,
            .carousel-item-next:not(.carousel-item-start) {
                transform: translateX(25%) !important;
            }

            .carousel-inner .carousel-item-left.active,
            .carousel-item-prev:not(.carousel-item-end),
            .active.carousel-item-start,
            .carousel-item-prev:not(.carousel-item-end) {
                transform: translateX(-25%) !important;
            }

            .carousel-item-next.carousel-item-start, .active.carousel-item-end {
                transform: translateX(0) !important;
            }

            .carousel-inner .carousel-item-prev,
            .carousel-item-prev:not(.carousel-item-end) {
                transform: translateX(-25%) !important;
            }
            }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
{{-- navbar --}}
    @include('template::layouts.header')

    @yield('content')

    @include('template::layouts.footer')

    <script src="/template/datlan/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="/template/datlan/assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <script src="/template/datlan/assets/vendors/bootstrap/bootstrap.affix.js"></script>
    {{-- <script src="/template/datlan/assets/vendors/swiper/swiper-bundle.min.js"></script> --}}
    <script src="/template/datlan/assets/js/creative-design.js"></script>
    <script src="/template/datlan/js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $('.carousel .carousel-item').each(function(){
            var minPerSlide = 4;
            var next = $(this).next();
            if (!next.length) {
            next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i=0;i<minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });

    </script>
</body>
</html>

