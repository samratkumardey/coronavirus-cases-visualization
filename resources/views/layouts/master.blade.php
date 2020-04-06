<!-- Created by Ariful Islam at 03/20/2020 - 2:39 PM -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>করোনা ভাইরাস কোভিড-১৯ বিশ্বব্যাপী বিভিন্ন কেস বিশ্লেষণ - (প্রথম বার সম্পূর্ণ বাংলায়)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">

    @yield('custom-css')

    <style>
        body{
            font-family: 'SolaimanLipi';
            src: url("https://fonts.maateen.me/solaiman-lipi/font.css");

        }
        w150 {
            min-width: 150px;
        }

        .mt20 {
            margin-top: 20px;
        }

        .blink {
            animation: fader 1s infinite;
            -webkit-animation: fader 1s infinite;
        }

        @keyframes fader {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes fader {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
            100% {
                opacity: 1;
            }
        }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-44838571-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-44838571-8');
    </script>

    @yield('head-js')
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="{{url('/')}}">করোনা ভাইরাস কোভিড-১৯ বিশ্বব্যাপী বিভিন্ন কেস বিশ্লেষণ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item" style="margin-right: 3px">
                <a class="nav-link btn btn-success text-light" href="{{url('/')}}">বাংলাদেশ</a>
            </li>

            <li class="nav-item" style="margin-right: 3px">
                <a class="nav-link btn btn-light text-dark" href="{{url('/world')}}">বিশ্বব্যাপী</a>
            </li>
            <li class="nav-item" style="margin-right: 3px">
                <a class="nav-link btn btn-light text-dark" href="{{url('info')}}">নির্দেশনা ও করণীয়</a>
            </li>
            <li class="nav-item" style="margin-right: 3px">
                <a class="nav-link btn btn-danger blink w150 text-light" href="{{url('map')}}" > লাইভ ম্যাপ </a>
            </li>
            <li class="nav-item" style="margin-right: 3px">
                <a class="nav-link btn btn-light text-dark" href="{{url('bdmap')}}" > BD Map </a>
            </li>

        </ul>
    </div>
</nav>

<div class="container-fluid" style="margin-top: 65px">

        @yield('content')


    <div class="row">

        <div class="col-md-12 text-center">
            <p>ডাটা সোর্সঃ WHO, CDC, ECDC, NHC, DXY, 1point3acres, Worldometers.info, BNO, state and national government health department, Johns Hopkins University Dataset, and local media reports</p>
            <p>বাংলাদেশ ডাটা সোর্সঃ IEDCR, DGHS, health ministry of BD, and local media reports</p>
            <p class="text-success"><b>এটি একটি জনসচেতনতামূলক কাজ। যার তথ্য উপাত্ত বিভিন্ন গণমাধ্যম হতে সংগৃহীত। এখানকার সকল তথ্য সবার জন্য উন্মুক্ত।</b></p>
            <p>কারিগরি সহযোগিতায়</p>
            <img src="{{asset('images/Dhaka_International_University.png')}}" alt="Dhaka International University" height="50px" width="100px">
            <img src="{{asset('images/pigeon-logo.png')}}" alt="Dhaka International University" height="50px" width="100px">
        </div>


    </div>

    <div class="footer bg-dark text-center text-white" style="margin-bottom:0; height: 40px;">
        <p style="padding: 5px">সার্বিক তত্ত্বাবধানেঃ <a href="https://samratdey.me/" class="text-white">সম্রাট কুমার দে</a>, সহকারী অধ্যাপক, সি এস ই বিভাগ, ঢাকা ইন্টারন্যাশনাল ইউনিভার্সিটি।
            <a href="https://www.ariful.net/" class="text-white">মোঃ আরিফুল ইসলাম</a> , সি ই ও, <a href="https://www.pigeon-soft.com/" class="text-white">পিজন সফট</a>, বাংলাদেশ</p>

</div>

{{--</div>--}}

@yield('js')

</body>
</html>

