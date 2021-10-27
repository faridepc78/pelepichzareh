@section('site_title')
    <title>پله پیچ زارع | صفحه دسته بندی مقالات({{$category->name}})</title>
@endsection

@include('site.layout.header')

<div class="layout">
    <main class="main main-inner main-blog bg-blog" data-stellar-background-ratio="0.6"
          style="background:url({{asset('assets/frontend/img/bg/blog.jpg')}}) 50% 0 no-repeat;">
        <div class="container">
            <header class="main-header">
                <h1>{{$category->name}}</h1>
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


        <section class="blog-list">
            <div class="container">

                @if (count($posts))

                    @foreach($posts as $value)

                        <article class="blog">
                            <div class="row">
                                <div class="blog-thumbnail col-md-8">
                                    <div class="blog-thumbnail-bg col-md-8 visible-md visible-lg"
                                         style="background-image: url({{$value->image->original}});"></div>
                                    <div class="blog-thumbnail-img visible-xs visible-sm"><img
                                            alt="{{$value->name}}" class="img-responsive"
                                            src="{{$value->image->original}}"></div>
                                </div>
                                <div class="blog-info col-md-4">

                                    <h3 class="blog-title">
                                        <a title="{{$value->name}}"
                                           href="{{$value->path()}}">{{$value->name}}</a>
                                    </h3>
                                    <div class="mydiv">
                                        {{$value->bio}}
                                    </div>

                                    <div class="text-right"><a title="{{$value->name}}"
                                                               href="{{$value->path()}}"
                                                               class="read-more">ادامه مطلب</a></div>
                                </div>
                            </div>
                        </article>

                    @endforeach

                @endif

            </div>
        </section>


@include('site.layout.footer')
