@section('site_title')
    <title>پله پیچ زارع | درباره ما</title>
@endsection

@include('site.layout.header')

<div class="layout">
    <main class="main main-inner bg-about" style="background-image:url({{asset('assets/frontend/img/uploads/slide3.jpg')}});"
          data-stellar-background-ratio="0.6">
        <div class="container">
            <header class="main-header">
                <h1>درباره ما</h1>
            </header>
        </div>
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
    </main>
    <div class="content">
        <section id="about" class="about">
            <div class="container">
                <div class="entry">
                    <div class="pagesimg"><img class="img-responsive" src="/assets/frontend/img/uploads/aboutBig1.jpg"/></div>
                    <div class="entry-text mydiv">دیمه با نیم قرن تجربه ارزشمند، خاستگاه تحقق رویاهای معماری است. این
                        شرکت با برخورداری از 14000 مترمربع فضای کارگاهی و پیشرفته ترین تجهیزات سخت افزاری و نرم افزاری
                        با اتکاء.به بیش از یکصد نفر پرسنل کارآمد، قادر به ساخت و نصب پنج دستگاه پله، در طول یک روز می
                        باشد. تجلی هنر معماری با فن آوری دیمه. طراحی، محاسبات نرم افزاری سازه ای، ارائه مدل های سه بعدی،
                        تهیه نقشه های شاپ، ساخت و نصب پروژه های بسیاری به دست کارشناسان توانای دیمه انجام پذیرفته است.
                        پروژه های بزرگی از قبیل برج میلاد، بزرگترین پله گرد معلق کشور در پژوهشگاه صنعت نفت و بیش از صدها
                        پروژه ی اداری، تجاری؛ مسکونی و ویلایی در سراسر کشور می باشد . دیمه پویا و نوآور به خلق حماسه های
                        ماندگار ادامه می دهد. این شرکت مجهز به بزرگترین نورد دستگاه مقاطع در مرکز کشور است و قادر است
                        فرم دهی مقاطع فولادی سبک و سنگین، در ارتباط با صنایع نفت،گاز و پتروشیمی و صنایع فولاد، نیرو
                        گاهها و سازه های خاص را اجرا ء نماید
                    </div>
                </div>
            </div>
        </section>


@include('site.layout.footer')
