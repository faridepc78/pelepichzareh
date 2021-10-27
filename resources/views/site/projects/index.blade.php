@section('site_title')
    <title>پله پیچ زارع | صفحه دسته بندی پروژه ها({{$category->name}})</title>
@endsection

@include('site.layout.header')

<div class="layout">
    <main class="main main-inner main-projects bg-projects"
          style="background-image:url({{asset('content/img/uploads/slide2.jpg')}});" data-stellar-background-ratio="0.6">
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
    <section id="about" class="about">
        <div class="container">
            <div class="entry">
                <h3 class="entry-title">پروژه های شرکت دیمه</h3>
                <div class="entry-text mydiv">
                    <div style="text-align: justify;">
{!! $category->text !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br/><br/>
    <div class="content">
        <section class="projects">
            <div class="js-projects-gallery">
                <div class="row">

                    @if (count($projects))

                        @foreach($projects as $value)

                            <div class="project  col-sm-6 col-md-4 col-lg-3 js-projects-gallery">
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

            <div class="pagination-container">
                {!! $projects->links() !!}
            </div>

        </section>


@include('site.layout.footer')
