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
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('assets/common/images/logo/android-icon-192x192.png')}}">
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

<!--pop-->
<!--end pop-->
<header id="top" class="header-home">
    <div class="brand-panel">
        <a href="#top" class="brand js-target-scroll">
            پله پیچ زارع
        </a>
        <div class="slide-number">
            <span class="current-number text-primary">0<span class="count">1</span></span>
            <sup><span class="delimiter">/</span> 0<span class="total-count"></span></sup>
        </div>
    </div>
    <div class="header-phone">(021) 22131821</div>
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

    <nav class="navbar-desctop visible-md visible-lg">
        <div class="container">
            <a href="#top" class="brand js-target-scroll">
                <img src="/assets/frontend/img/logo.png">
            </a>
            <ul class="navbar-desctop-menu">
                <li class="">

                    <a href="{{route('home')}}" title="صفحه اصلی">صفحه اصلی</a>

                </li>
                <li>
                    <!-- اگر کاتاگوری داشت-->
                    <a href="javascript:void(0)" title="">محصولات</a>

                    <ul>


                        <li>
                            <a href="/fa/Products/List/82/پله-فلزی-شمشیری" title="پله فلزی شمشیری">پله فلزی شمشیری</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/83/پله-فلزی-باکس-پلکانی" title="پله فلزی باکس پلکانی">پله فلزی
                                باکس پلکانی</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/84/پله-فلزی-سازه-میانی" title="پله فلزی سازه میانی">پله فلزی سازه
                                میانی</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/85/پله-فلزی-کنسول" title="پله فلزی کنسول">پله فلزی کنسول</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/86/پله-فلزی-مدل-لوله-مرکزی" title="پله فلزی مدل لوله مرکزی">پله
                                فلزی مدل لوله مرکزی</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/87/پله-فرار" title="پله فرار">پله فرار</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/88/پله-گرد-فلزی" title="پله گرد فلزی">پله گرد فلزی</a>
                        </li>


                        <li>
                            <a href="/fa/Products/list/پله-فلزی" title="پله فلزی">پله فلزی</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <!-- اگر کاتاگوری داشت-->
                    <a href="javascript:void(0)" title="">پروژه ها</a>

                    <ul>


                        <li>
                            <a href="/fa/Projects/List/2/پروژهای-پله-فلزی" title="پروژهای پله فلزی">پروژهای پله فلزی</a>
                        </li>


                    </ul>
                </li>
                <li>
                    <!-- اگر کاتاگوری داشت-->
                    <a href="javascript:void(0)" title="">مقالات</a>

                    <ul>


                        <li>
                            <a href="/fa/Blogs/List/3/پله-و-سازه-های-فلزی" title="پله و سازه های فلزی">پله و سازه های
                                فلزی</a>
                        </li>


                    </ul>
                </li>
                <li class="dropdown simple-dropdown">

                    <a href="/fa/pages/19/درباره-ما" title="درباره ما">درباره ما</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="javascript:void(0)" title="دانلود کاتالوگ">دانلود کاتالوگ</a>
                        </li>
                    </ul>

                </li>
                <li class="">

                    <a href="/fa/pages/20/تماس-با-ما" title="تماس با ما">تماس با ما</a>

                </li>
            </ul>

        </div>
    </nav>

    <nav class="navbar-mobile">
        <a href="#top" class="brand js-target-scroll">
            <img src="/assets/frontend/img/logo.png">
        </a>

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-mobile">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav-mobile">
                <li class="">

                    <a href="/" title="صفحه اصلی">صفحه اصلی</a>

                </li>
                <li>
                    <!-- اگر کاتاگوری داشت-->
                    <a href="#" title="">محصولات <i class="fa fa-angle-down"></i></a>

                    <ul>


                        <li>
                            <a href="/fa/Products/List/82/پله-فلزی-شمشیری" title="پله فلزی شمشیری">پله فلزی شمشیری</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/83/پله-فلزی-باکس-پلکانی" title="پله فلزی باکس پلکانی">پله فلزی
                                باکس پلکانی</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/84/پله-فلزی-سازه-میانی" title="پله فلزی سازه میانی">پله فلزی سازه
                                میانی</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/85/پله-فلزی-کنسول" title="پله فلزی کنسول">پله فلزی کنسول</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/86/پله-فلزی-مدل-لوله-مرکزی" title="پله فلزی مدل لوله مرکزی">پله
                                فلزی مدل لوله مرکزی</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/87/پله-فرار" title="پله فرار">پله فرار</a>
                        </li>
                        <li>
                            <a href="/fa/Products/List/88/پله-گرد-فلزی" title="پله گرد فلزی">پله گرد فلزی</a>
                        </li>


                        <li>
                            <a href="/fa/Products/list/پله-فلزی" title="پله فلزی">پله فلزی</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <!-- اگر کاتاگوری داشت-->
                    <a href="#" title="">پروژه ها <i class="fa fa-angle-down"></i></a>

                    <ul>


                        <li>
                            <a href="/fa/Projects/List/2/پروژهای-پله-فلزی" title="پروژهای پله فلزی">پروژهای پله فلزی</a>
                        </li>


                    </ul>
                </li>
                <li>
                    <!-- اگر کاتاگوری داشت-->
                    <a href="#" title="">مقالات <i class="fa fa-angle-down"></i></a>

                    <ul>


                        <li>
                            <a href="/fa/Blogs/List/3/پله-و-سازه-های-فلزی" title="پله و سازه های فلزی">پله و سازه های
                                فلزی</a>
                        </li>


                    </ul>
                </li>
                <li class="dropdown simple-dropdown">

                    <a href="/fa/pages/19/درباره-ما" title="درباره ما">درباره ما</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="javascript:void(0)" title="دانلود کاتالوگ">دانلود کاتالوگ</a>
                        </li>
                    </ul>

                </li>
                <li class="">

                    <a href="/fa/pages/20/تماس-با-ما" title="تماس با ما">تماس با ما</a>

                </li>
            </ul>

        </div>
    </nav>
</header>
