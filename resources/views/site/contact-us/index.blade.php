@section('site_title')
    <title>پله پیچ زارع | تماس با ما</title>
@endsection

@include('site.layout.header')

<div class="layout">
    <main class="main main-inner bg-about"
          style="background-image:url({{asset('assets/frontend/img/bg/projects.jpg')}});"
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
                    <div class="pagesimg"><img class="img-responsive"
                                               src="{{asset('assets/frontend/img/bg/contacts.jpg')}}"/>
                    </div>
                    <div class="entry-text mydiv">
                        <div style="text-align: center;">دفتر مركزى : تهران ؛ سعادت آباد ، میدان کاج<br/>
                            تلفن : 22141821 (021) ، 22131821 (021) ، 22064647 (021) ، 22063647 (021)<br/>
                            همراه : 09123181821<br/>
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contacts section">
            <div class="container">
                <header class="section-header">
                    <h2 class="section-title">ارسال پیام</h2>

                </header>
                <div class="section-content">
                    <div class="row-base row">

                        <div class="col-base  col-md-12">

                            <form id="contact_form" action="{{route('contact-us-send')}}" method="post">

                                @csrf

                                <div class="row-field row">
                                    <div class="col-field col-sm-6 col-md-4">

                                        <div class="form-group">
                                            <input value="{{old('name')}}" autocomplete="name" autofocus
                                                   onkeyup="this.value=removeSpaces(this.value)"
                                                   type="text" name="name" id="name" class="form-control @error('name') is-invalid
                                           @enderror" placeholder="نام *">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input value="{{old('email')}}" autocomplete="email" autofocus
                                                   onkeyup="this.value=removeSpaces(this.value)" type="text"
                                                   name="email"
                                                   id="email" class="form-control @error('email') is-invalid
                                           @enderror"
                                                   placeholder="ایمیل *">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-field col-sm-6 col-md-4">

                                        <div class="form-group">
                                            <input onkeyup="this.value=removeSpaces(this.value)"
                                                   value="{{old('mobile')}}" autocomplete="mobile" autofocus type="text"
                                                   class="form-control @error('mobile') is-invalid
                                           @enderror" name="mobile" id="mobile"
                                                   placeholder="تلفن همراه *">

                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input onkeyup="this.value=removeSpaces(this.value)"
                                                   value="{{old('company')}}" autocomplete="company" autofocus
                                                   type="text"
                                                   class="form-control @error('company') is-invalid
                                           @enderror" name="company" id="company"
                                                   placeholder="شرکت">

                                            @error('company')
                                            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-field col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <textarea autocomplete="text" autofocus
                                                      onkeyup="this.value=removeSpaces(this.value)"
                                                      class="form-control @error('text') is-invalid
                                           @enderror"
                                                      name="text" id="text"
                                                      placeholder="پیام *">{{old('text')}}</textarea>

                                            @error('text')
                                            <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-field col-sm-12 col-md-4">

                                        <div class="form-group">
                                            {!! app('captcha')->display(); !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="help-block" role="alert">
                                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div>
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

        @section('site_js')
            <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?explicit&hl=fa" async
                    defer></script>
        @endsection

        @include('site.layout.footer')

        <script type="text/javascript">

            $(document).ready(function () {

                $('#contact_form').validate({

                    rules: {
                        name: {
                            required: true
                        },

                        email: {
                            required: true,
                            email: true
                        },

                        mobile: {
                            required: true,
                            checkMobile: true
                        },

                        text: {
                            required: true
                        }
                    },

                    messages: {
                        name: {
                            required: "لطفا نام را وارد کنید"
                        },

                        email: {
                            required: "لطفا ایمیل را وارد کنید",
                            email: "لطفا ایمیل را صحیح را وارد کنید"
                        },

                        mobile: {
                            required: "لطفا تلفن همراه را وارد کنید",
                            checkMobile: "لطفا تلفن همراه را صحیح وارد کنید"
                        },

                        text: {
                            required: "لطفا پیام را وارد کنید"
                        }
                    },
                    submitHandler: function (form) {
                        if (grecaptcha.getResponse()) {
                            form.submit();
                        } else {
                            toastr['info']('لطفا ریکپچا را کامل کنید', 'پیام');
                        }
                    }

                });

            });

        </script>
