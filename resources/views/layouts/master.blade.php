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
    <style>
        body{
            font-family: 'SolaimanLipi';
            src: url("https://fonts.maateen.me/solaiman-lipi/font.css");

        }
    </style>

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
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">বিশ্বব্যাপী</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/bd')}}">বাংলাদেশ</a>
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Link</a>--}}
{{--            </li>--}}

        </ul>
    </div>
</nav>

<div class="container-fluid" style="margin-top: 65px">

        @yield('content')

</div>
<br>
<div class="row">
    <div class="col-md-12 text-center">
        <p>ডাটা সোর্সঃ WHO, CDC, ECDC, NHC, DXY, 1point3acres, Worldometers.info, BNO, state and national government health department, Johns Hopkins University Dataset, and local media reports</p>
        <p>বাংলাদেশ ডাটা সোর্সঃ IEDCR, DGHS, health ministry of BD, and local media reports</p>
    </div>
</div>

<div class="footer bg-dark text-center text-white" style="margin-bottom:0; height: 40px;">
    <p style="padding: 5px">সার্বিক তত্ত্বাবধানেঃ <a href="https://samratdey.me/" class="text-white">সম্রাট কুমার দে</a>, সহকারী অধ্যাপক, সি এস ই বিভাগ, ঢাকা ইন্টারন্যাশনাল ইউনিভার্সিটি।
        <a href="https://www.ariful.net/" class="text-white">মোঃ আরিফুল ইসলাম</a> , সি ই ও, <a href="https://www.pigeon-soft.com/" class="text-white">পিজন সফট</a>, বাংলাদেশ</p>
</div>

@yield('js')

</body>
</html>

