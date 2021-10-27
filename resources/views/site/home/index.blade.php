@section('site_title')
    <title>پله پیچ زارع | صفحه اصلی</title>
@endsection

@include('site.layout.header')

<div class="layout">

    <main class="main">
        <div class="arrow-left"></div>
        <div class="arrow-right"></div>

        <div class="rev_slider_wrapper">
            <div id="rev_slider" class="rev_slider fullscreenbanner">
                <ul>

                    @if (count($sliders))

                        @foreach($sliders as $value)

                            <li data-transition="slotzoom-horizontal" data-slotamount="6" data-masterspeed="0"
                                data-fsmasterspeed="0">

                                <img src="{{$value->image->original}}" alt="" data-bgposition="center center"
                                     data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                                <div class="slide-title tp-caption tp-resizeme"
                                     data-x="['center','center','center','center']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['55','55', '55']" data-fontsize="['50','45', '55']"
                                     data-lineheight="['80','75', '65']" data-width="['1100','700','480']"
                                     data-height="none"
                                     data-whitespace="normal" data-transform_idle="o:1;"
                                     data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                                     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                     data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500">
                                    {{$value->name}}
                                </div>

                                <div class="slide-subtitle tp-caption tp-resizeme iran"
                                     data-x="['240','240','180','240']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['108','108', '118']" data-fontsize="['18','25','25']"
                                     data-lineheight="['80','75', '65']" data-width="['1100','700','550']"
                                     data-height="none"
                                     data-whitespace="normal" data-transform_idle="o:1;"
                                     data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                                     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                     data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500">
                                    {{$value->text}}
                                </div>

                            </li>

                        @endforeach

                    @endif

                </ul>
            </div>
        </div>
    </main>

    <div class="content">

        <section id="services" class="services section">
            <div class="container">
                <header class="section-header">
                    <h1 class="section-title"> خدمات <span class="text-primary">پله فلزی دیمه</span></h1>
                </header>
                <div class="section-content">
                    <div class="row-services row-base row">
                        <div class="col-base col-service col-sm-6 col-md-4 wow fadeInUp" data-wow-delay="0.1">
                            <div class="service-item">
                                <img style="float:left;margin-top:-15px;padding-right:8px" alt=""
                                     src="/assets/frontend/img/uploads/icon-architecture.png">
                                <h4 class="text-right">سازه پله فلزی</h4>
                                <br/>
                                <div class="mydiv">
                                    از دیرباز یکی از مهمترین مسائل در معماری یک ساختمان موضوع ارتباط و دسترسی های عمودی
                                    ساختمان بوده و هست ، بی شک نقش پله به عنوان اصلی ترین و مهم ترین ارتباط و دسترسی
                                    عمودی در یک ساختمان تلقی می شود. لذا صنایع فلزی دیمه همواره کوشیده است ، تا با بهره
                                    گیری از نیروهای متخصص فنی و معماری پیشرو و در خلق آثاری به مراتب زیباو با کیفیت در
                                    این ضمینه باشد. به همین خاطر این مجموعه با ایجاد تنوع و در زمینه تولید پله فلزی
                                    دوبلکس سعی داشته تا پاسخ گوی سلایق گوناگون باشد. انجام تعهدات به بهترین نحو و در
                                    کوتاه ترین زمان ، نه شعار این مجموعه بلکه همواره عملکرد ما بوده است. طراحی و ساخت
                                    انواع پله فلزی گرد، پله فلزی ساده با قیمت های رقابتی، دیمه را از رقبا متمایز کرده
                                    است.
                                </div>
                            </div>
                        </div>
                        <div class="col-base col-service col-sm-6 col-md-4 wow fadeInUp" data-wow-delay="0.4">
                            <div class="service-item">
                                <img style="float:left;margin-top:-15px;padding-right:8px" alt=""
                                     src="/assets/frontend/img/uploads/icon-interiors.png">
                                <h4 class="text-right">نازک کاری</h4>
                                <br/>
                                <div class="mydiv">
                                    یکی از مسائلی که به زیبایی یک پله می تواند هویت ببخشد اجرای نازک کاری پله در راستای
                                    سبک و معماری کلی یک ساختمان است. به همین خاطر تنوع اجرای نازک کاری یکی از الویت های
                                    این امر می باشد. مسائلی که نازک کاری پله ها را در بر میگیرد ، کاور کف پله ، نرده و
                                    رنگ پله می باشد. این مجموعه با توجه به انجام تمام خدمات نازک کاری پله اعم از چوب ،
                                    سنگ ، سنگ مصنوعی ، شیشه ، پلکسی و ... به عنوان کاور کف پله ، استیل ، آلومینیوم ، آهن
                                    ، چوب ، شیشه ، تلفیقی و .... به عنوان نرده و همچنین اجرای رنگ پله با بهترین کیفیت ،
                                    پیش نیازهای لازم جهت اجرای هرچه بهتر و با کیفیت تر در این زمینه را نظر گرفته تا در
                                    مرحله اجرای نازک کاری بدون ایجاد تغییر در سازه و اسکلت پله بتوان خواسته های معماری
                                    را برآورده کند.
                                </div>
                            </div>
                        </div>
                        <div class="col-base col-service col-sm-6 col-md-4 wow fadeInUp" data-wow-delay="0.7">
                            <div class="service-item">
                                <img style="float:left;margin-top:-15px;padding-right:8px" alt=""
                                     src="/assets/frontend/img/uploads/icon-planing.png">
                                <h4 class="text-right">المان فلزی و هلی پد</h4>
                                <br/>
                                <div class="mydiv">
                                    گروه فنی مهندسی دیمه در راستای اعتلای هنر و معماری و در راستای تلفیق صنعت با هنر و
                                    معماری سعی بر این داشته تا با طراحی و ساخت و فرم دهی فلزات ، علاوه بر پله های فلزی،
                                    در کاربرد فلزات در معماری و چه در شهر سازی و هنر، پیشرو و فعال باشد و دست معماران و
                                    طراحان را در تحقق بخشیدن به طرح ها و اندیشه هایشان کاملا باز نگه دارد. لذا این
                                    مجموعه با ساخت و طراحی گنبد های فلزی ، رمپ و پل های فلزی ، هلی پد ،المان های شهری
                                    سازه های فلزی خاص هرگونه محدودیت در اجرای طرح های خاص و پیچیده را ممکن ساخته است.
                                    امید است که با ارتقای سطح دانش و تجهیزات خود تمامی موانع در مسیر خلق یک اثر را
                                    هموارنماییم.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about section">
            <div class="container">
                <header class="section-header">
                    <h2 class="section-title">
                        تجلی هنر معماری با فن آوری دیمه
                    </h2>

                </header>
                <div class="section-content">
                    <div class="row-base row">
                        <div class="col-base col-sm-6 col-md-4">
                            <h3 class="col-about-title"></h3>
                            <div class="col-about-info">
                                <div class="mydiv">
                                    <p dir="rtl" style="text-align:justify">صنایع فلزی دیمه، پویا و نوآور به خلق حماسه
                                        های ماندگار ادامه می دهد. این شرکت مجهز به بزرگترین نورد مقاطع در مرکز کشور است
                                        و قادر است فرم دهی مقاطع فولادی سبک و سنگین، در ارتباط با صنایع نفت،گاز و
                                        پتروشیمی و صنایع فولاد، نیرو گاهها و سازه های خاص را اجرا نماید. پروژه های بزرگی
                                        از قبیل برج میلاد، بزرگترین پله گرد معلق کشور در پژوهشگاه صنعت نفت و بیش از صدها
                                        پروژه ی اداری، تجاری؛ مسکونی و ویلایی در سراسر کشور می باشد . دیمه، طراح و تولید
                                        کننده برتر<strong> پله فلزی</strong> و <strong>پله مدرن</strong> در کشور، با
                                        ارائه طرح های خاص همیشه پیشرو طراحان و تولید کنندهگان پله های مدرن و <strong>پله
                                            دوبلکس</strong> بوده است. طراحی، محاسبات نرم افزاری سازه ای، ارائه مدل های
                                        سه بعدی، تهیه نقشه های شاپ، روند حرفه ای کار ماست و ساخت و نصب پروژه های بسیاری
                                        به دست کارشناسان توانای دیمه انجام پذیرفته است.</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-base col-about-img1 col-sm-6 col-md-4">
                            <img alt="" class="img-responsive" src="/assets/frontend/img/380x370.png">
                        </div>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-base col-about-img col-sm-6 col-md-4">
                            <img alt="" class="img-responsive" src="/assets/frontend/img/380x370.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="projects section">
            <div class="container">
                <h2 class="section-title">محصولات</h2>
            </div>
            <div class="section-content">
                <div class="projects-carousel js-projects-carousel js-projects-gallery1">

                    @if (count($products))

                        @foreach($products as $value)

                            <div class="project project-light js-projects-gallery">
                                <a href="{{$value->image->original}}" title="{{$value->name}}">
                                    <figure>
                                        <img alt="{{$value->name}}" src="{{$value->image->original}}">
                                        <figcaption>
                                            <h3 class="project-title rtl">
                                                {{$value->name}}
                                            </h3>
                                            @if ($value->bio!==null)
                                                <div class="mydiv product-small-desc">
                                                    {{$value->bio}}
                                                </div>
                                            @endif
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>

                        @endforeach

                    @endif

                </div>
            </div>
        </section>

        <section class="projects section">
            <div class="container">
                <h2 class="section-title">
                    پروژه ها
                </h2>
            </div>
            <div class="section-content">
                <div class="projects-carousel js-projects-carousel js-projects-gallery1">

                    @if (count($projects))

                        @foreach($projects as $value)

                            <div class="project project-light js-projects-gallery">
                                <a href="{{$value->image->original}}" title="{{$value->name}}">
                                    <figure>
                                        <img alt="{{$value->name}}" src="{{$value->image->original}}">
                                        <figcaption>
                                            <h3 class="project-title rtl">
                                                {{$value->name}}
                                            </h3>
                                            @if ($value->bio!==null)
                                                <div class="mydiv product-small-desc">
                                                    {{$value->bio}}
                                                </div>
                                            @endif
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>

                        @endforeach

                    @endif

                </div>
            </div>
        </section>

        <section class="experience section">
            <div class="container">
                <h4 class="experience-info wow fadeInRight"><span class="text-primary">سال تجربه موفق</span><br> در
                    طراحی و ساخت پله های فلزی در ایران</h4>
                <div class="text-parallax" data-stellar-background-ratio="0.85"
                     style="background-image: url({{asset('assets/frontend/img/bg/text-1.jpg')}});">
                    <div class="text-parallax-content">۵۰</div>
                </div>

            </div>
        </section>

        <section class="clients section">
            <div class="container">
                <header class="section-header">
                    <h2 class="section-title">مشتریان ما</h2>
                </header>
                <div class="section-content">
                    <ul class="clients-list">

                        <li class="client">
                            <a><img alt="شهرداری تهران" src="{{asset('assets/frontend/img/customers/shahrdari.png')}}"></a>
                        </li>
                        <li class="client">
                            <a><img alt="ایران مال" src="{{asset('assets/frontend/img/customers/mall.png')}}"></a>
                        </li>
                        <li class="client">
                            <a><img alt="بانک مرکزی" src="{{asset('assets/frontend/img/customers/bnk_markazi_d.png')}}"></a>
                        </li>
                        <li class="client">
                            <a><img alt="هما"
                                    src="{{asset('assets/frontend/img/customers/1280px-Iran_Air_logo.svg.png')}}"></a>
                        </li>
                        <li class="client">
                            <a><img alt="برج میلاد"
                                    src="{{asset('assets/frontend/img/customers/Borj-Milad-Tehran-Logo.png')}}"></a>
                        </li>

                    </ul>
                </div>

            </div>
        </section>


        <section class="contacts section">
            <div class="container">
                <header class="section-header">
                    <h2 class="section-title">با ما در تماس باشید</h2>
                </header>
                <div class="section-content">
                    <div class="row-base row">
                        <div class="col-base  col-md-4">
                        </div>
                        <div class="col-address col-base col-md-4 text-center" style="text-align:center">
                            <p>021-22131821 , 021-22063647<br/>
                                021-22063647 , 021-22141821<br/>
                                dimehspiral@yahoo.com</p>

                            <br/>
                            <p>آدرس دفتر مرکزی: تهران، سعادت آباد</p>

                        </div>
                        <div class="col-base  col-md-4">
                        </div>
                    </div>
                </div>
            </div>
        </section>

@include('site.layout.footer')
