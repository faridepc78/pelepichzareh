@section('site_title')
    <title>پله پیچ زارع | پست({{$post->name}})</title>
@endsection

@include('site.layout.header')

<div class="layout">
    <main class="main main-inner main-blog bg-blog" data-stellar-background-ratio="0.6">
        <div class="container">
            <header class="main-header">
                <h1>{{$post->name}}</h1>
                <div class="project-title-info">
                    <div class="project-info-item"><span class="text-primary">گروه</span>: {{$post->category->name}}</div>
                </div>
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
        <section class="blog-details">
            <div class="container">
                <div class="row">
                    <div class="col-primary col-md-12">
                        <article class="post">
                            <div class="mydiv">
                             {!! $post->text !!}
                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </section>


        @include('site.layout.footer')
