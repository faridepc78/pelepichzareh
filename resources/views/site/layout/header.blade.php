<!DOCTYPE HTML>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('site_title')

    <meta name="description"
          content="پله پیچ زارع">

    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/rtl.css')}}" rel="stylesheet" media="screen">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/common/plugins/validation/css/validate.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/common/plugins/toast/css/toast.min.css')}}">

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/common/images/logo/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/common/images/logo/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/common/images/logo/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/common/images/logo/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/common/images/logo/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/common/images/logo/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/common/images/logo/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/common/images/logo/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/common/images/logo/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"
          href="{{asset('assets/common/images/logo/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/common/images/logo/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/common/images/logo/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/common/images/logo/favicon-16x16.png')}}">
    <link rel="icon" href="{{asset('assets/common/images/logo/favicon.ico')}}" type="image/x-icon">
    <link rel="manifest" href="{{asset('assets/common/images/logo/manifest.json')}}">

    @yield('site_css')

</head>
<body>

<div class="loader">
    <div class="page-lines">
        <div class="container">
            <div class="col-line col-xs-4">
                <div class="line"></div>
            </div>
            <div class="col-line col-xs-4">
                <div class="line"></div>
            </div>
            <div class="col-line col-xs-4">
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
    </div>
    <div class="loader-brand">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
</div>

<header id="top" class="@if (request()->routeIs('home'))
    header-home
    @else
    header-inner
@endif">

    @if (request()->routeIs('home'))
        <div class="brand-panel">
            <a href="#top" class="brand js-target-scroll">
                پله پیچ زارع
            </a>

            <div class="slide-number">
                <span class="current-number text-primary">0<span class="count">1</span></span>
                <sup><span class="delimiter">/</span> 0<span class="total-count"></span></sup>
            </div>

        </div>

        <div class="vertical-panel"></div>
        <div class="vertical-panel-content">
            <div class="vertical-panel-info">
                <div class="vertical-panel-title"></div>
                <div class="line"></div>
            </div>
            <ul class="social-list">
                <li><a href="https://www.instagram.com/dimehstair" class="fa fa-instagram"></a></li>
                <li><a href="https://telegram.me/dimehstair" class="fa fa-telegram"></a></li>
            </ul>
        </div>
    @else
        <div class="brand-panel">
            <a href="#top" class="brand js-target-scroll">
                پله پیچ زارع
            </a>
        </div>
        <div class="vertical-panel-content">
            <div class="vertical-panel-info">
                <div class="vertical-panel-title"></div>
                <div class="line"></div>
            </div>
            <ul class="social-list">
                <li><a href="https://www.instagram.com/dimehstair" class="fa fa-instagram"></a></li>
                <li><a href="https://telegram.me/dimehstair" class="fa fa-telegram"></a></li>
            </ul>
        </div>
    @endif


    <nav class="navbar-desctop visible-md visible-lg">
        <div class="container">
            <a href="#top" class="brand js-target-scroll">
                <img src="{{asset('assets/common/images/logo/android-icon-72x72.png')}}" alt="logo">
            </a>
            <ul class="navbar-desctop-menu">

                @auth()
                    <li>
                        <a target="_blank" href="{{route('dashboard')}}" title="پنل مدیریت">پنل مدیریت</a>
                    </li>
                @endauth

                <li>
                    <a href="{{route('home')}}" title="صفحه اصلی">صفحه اصلی</a>
                </li>

                <li>
                    <a href="javascript:void(0)" title="محصولات">محصولات</a>

                    <ul>

                        @if (count($products_categories))

                            @foreach($products_categories as $value)

                                <li>
                                    <a href="{{$value->products_path()}}" title="{{$value->name}}">{{$value->name}}</a>
                                </li>

                            @endforeach

                        @endif

                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)" title="پروژه ها">پروژه ها</a>

                    <ul>

                        @if (count($projects_categories))

                            @foreach($projects_categories as $value)

                                <li>
                                    <a href="{{$value->projects_path()}}" title="{{$value->name}}">{{$value->name}}</a>
                                </li>

                            @endforeach

                        @endif

                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)" title="مقالات">مقالات</a>

                    <ul>

                        @if (count($posts_categories))

                            @foreach($posts_categories as $value)

                                <li>
                                    <a href="{{$value->posts_path()}}" title="{{$value->name}}">{{$value->name}}</a>
                                </li>

                            @endforeach

                        @endif

                    </ul>
                </li>

                <li>
                    <a href="{{route('about-us')}}" title="درباره ما">درباره ما</a>
                </li>

                <li>
                    <a href="{{route('contact-us')}}" title="تماس با ما">تماس با ما</a>
                </li>

            </ul>

        </div>
    </nav>

    <nav class="navbar-mobile">
        <a href="#top" class="brand js-target-scroll">
            <img src="{{asset('assets/frontend/img/logo.png')}}" alt="logo">
        </a>

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-mobile">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav-mobile">

                @auth()
                    <li>
                        <a target="_blank" href="{{route('dashboard')}}" title="پنل مدیریت">پنل مدیریت</a>
                    </li>
                @endauth

                <li>
                    <a href="{{route('home')}}" title="صفحه اصلی">صفحه اصلی</a>
                </li>

                <li>
                    <a href="javascript:void(0)" title="محصولات">محصولات <i class="fa fa-angle-down"></i></a>
                    <ul>

                        @if (count($products_categories))

                            @foreach($products_categories as $value)

                                <li>
                                    <a href="{{$value->products_path()}}" title="{{$value->name}}">{{$value->name}}</a>
                                </li>

                            @endforeach

                        @endif

                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)" title="پروژه ها">پروژه ها <i class="fa fa-angle-down"></i></a>

                    <ul>

                        @if (count($projects_categories))

                            @foreach($projects_categories as $value)

                                <li>
                                    <a href="{{$value->projects_path()}}" title="{{$value->name}}">{{$value->name}}</a>
                                </li>

                            @endforeach

                        @endif

                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)" title="مقالات">مقالات <i class="fa fa-angle-down"></i></a>

                    <ul>

                        @if (count($posts_categories))

                            @foreach($posts_categories as $value)

                                <li>
                                    <a href="{{$value->posts_path()}}" title="{{$value->name}}">{{$value->name}}</a>
                                </li>

                            @endforeach

                        @endif

                    </ul>
                </li>

                <li>
                    <a href="{{route('about-us')}}" title="درباره ما">درباره ما</a>
                </li>

                <li>
                    <a href="{{route('contact-us')}}" title="تماس با ما">تماس با ما</a>
                </li>

            </ul>

        </div>
    </nav>
</header>
