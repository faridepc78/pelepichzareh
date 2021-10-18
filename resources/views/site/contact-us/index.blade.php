@section('site_title')
    <title>پله پیچ زارع | تماس با ما</title>
@endsection

@include('site.layout.header')

<div class="layout">
    <main class="main main-inner bg-about" style="background-image:url('/assets/frontend/img/bg/project.jpg');"
          data-stellar-background-ratio="0.6">
        <div class="container">
            <header class="main-header">
                <h1>تماس با ما</h1>
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
                    <div class="pagesimg"><img class="img-responsive" src="/assets/frontend/img/uploads/aboutBig1(2).jpg"/>
                    </div>
                    <div class="entry-text mydiv">
                        <div style="text-align: center;">دفتر مركزى : تهران ؛ سعادت آباد ، میدان کاج<br/>
                            تلفن : 22141821 (021) ، 22131821 (021) ، 22064647 (021) ، 22063647 (021)<br/>
                            همراه : 09123181821<br/>
                            فاکس : 22099032 (021)<br/>
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script src='https://www.google.com/recaptcha/api.js'></script>
        <section class="contacts section">
            <div class="container">
                <header class="section-header">
                    <h2 class="section-title">ارسال پیام</h2>

                </header>
                <div class="section-content">
                    <div class="row-base row">

                        <div class="col-base  col-md-12">
                            <form id="contact" action="/fa/Contact/ContactAdd" method="post">
                                <div class="row-field row">
                                    <div class="col-field col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="url" id="url"
                                                   value="http://dimehspiral.com/fa/pages/20/%D8%AA%D9%85%D8%A7%D8%B3-%D8%A8%D8%A7-%D9%85%D8%A7"/>
                                            <input type="text" class="form-control" name="Name" id="Name" required
                                                   placeholder="نام">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="Email" id="Email" required
                                                   placeholder="ایمیل *">
                                        </div>
                                    </div>
                                    <div class="col-field col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <input type="tel" class="form-control" name="phone" id="phone"
                                                   placeholder="تلفن">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="company" id="company"
                                                   placeholder="شرکت">
                                        </div>

                                    </div>
                                    <div class="col-field col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <textarea class="form-control" name="Message" id="Message" required
                                                      placeholder="پیام"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-field col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <div class="g-recaptcha"
                                                 data-sitekey="6LcREI0UAAAAAJ90FFimxQyB7pasXFaoS9cuHBBf"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="">
                                                <button type="submit" class="btn btn-shadow-2 wow swing">ارسال پیام
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@include('site.layout.footer')
