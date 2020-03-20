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

<div class="footer bg-dark text-center text-white" style="margin-bottom:0">
    <p>Footer</p>
</div>

@yield('js')

</body>
</html>

