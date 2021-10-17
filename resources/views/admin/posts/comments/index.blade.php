@section('admin_title')
    <title>پنل مدیریت پله پیچ زارع | نظرات پست ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('posts.comments.index')}}">مدیریت
                                نظرات پست ها</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-3">مدیریت نظرات پست ها</h3>

                            <div class="card-tools">
                                <form id="filterForm" method="get" action="{{route('posts.comments.index')}}">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input onkeyup="this.value=removeSpaces(this.value)" id="search"
                                               value="{{request()->input('search')}}" type="text"
                                               name="search"
                                               class="form-control float-right"
                                               placeholder="جستجو بر اساس نام پست">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <p style="cursor: auto" class="btn btn-success">تعداد نظرات فعال : {{$active}}</p>
                            <p style="cursor: auto" class="btn btn-danger">تعداد نظرات در حال غیرفعال : {{$inactive}}</p>

                            <br>

                            <p style="cursor: auto" class="btn btn-success">تعداد نظرات با جواب : {{$with_answer}}</p>
                            <p style="cursor: auto" class="btn btn-danger">تعداد نظرات بی جواب : {{$without_answer}}</p>

                            <br>

                            <a href="{{route('posts.comments.index',['answer=yes'])}}"
                               class="btn btn-success">جواب داده شده</a>

                            <a href="{{route('posts.comments.index',['answer=no'])}}"
                               class="btn btn-danger">جواب داده نشده</a>

                            <br><br>

                            <a href="{{route('posts.comments.index',['status='.\App\Models\PostComment::ACTIVE])}}"
                               class="btn btn-success">@lang(\App\Models\PostComment::ACTIVE)</a>

                            <a href="{{route('posts.comments.index',['status='.\App\Models\PostComment::INACTIVE])}}"
                               class="btn btn-danger">@lang(\App\Models\PostComment::INACTIVE)</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>پست</th>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>موبایل</th>
                                    <th>متن</th>
                                    <th>تاریخ و زمان</th>
                                    <th>مدیریت</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($comments))

                                    @foreach($comments as $key=>$value)

                                        @if ($value->status!=\App\Models\PostComment::PENDING)

                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$value->post->name}}</td>
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->mobile}}</td>
                                                <td>
                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                       data-target="#postCommentMessage{{$value['id']}}">
                                                        <i class="fa fa-eye text-success"></i>
                                                    </a>
                                                </td>

                                                <td>{{\Morilog\Jalali\CalendarUtils::strftime('j F Y || H:i:s', strtotime($value['created_at']))}}</td>

                                                <td>
                                                    <a target="_blank"
                                                       href="{{route('posts.comments.single',$value->id)}}">
                                                        <i class="fa fa-reply text-primary"></i>
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route('posts.comments.destroy', $value->id) }}"
                                                       onclick="destroyPostComment(event, {{ $value->id }})"><i
                                                            class="fa fa-remove text-danger"></i></a>
                                                    <form action="{{ route('posts.comments.destroy', $value->id) }}"
                                                          method="post" id="destroy-PostComment-{{ $value->id }}">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="route"
                                                               value="{{Route::current()->getName()}}">
                                                    </form>
                                                </td>

                                            </tr>

                                            <div class="modal fade mt-lg-5"
                                                 id="postCommentMessage{{$value['id']}}" tabindex="-1"
                                                 role="dialog"
                                                 aria-hidden="true">

                                                <div class="modal-dialog modal-lg" role="document">

                                                    <div class="modal-content">

                                                        <div class="modal-header">

                                                            <h6 class="modal-title">
                                                                متن نظر
                                                                ({{$value->name}})
                                                            </h6>

                                                            <a style="color: red;cursor: pointer"
                                                               data-dismiss="modal" aria-label="Close">
                                                                <i style="color: red" class="fa fa-close"></i>
                                                            </a>

                                                        </div>

                                                        <div class="modal-body">

                                                        <textarea class="form-control" readonly rows="10"
                                                                  style="resize: vertical">{{$value->message}}</textarea>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        @endif

                                    @endforeach

                                @else

                                    <div class="alert alert-danger text-center">
                                        <p>اطلاعات این بخش ثبت نشده است</p>
                                    </div>

                                @endif

                            </table>

                        </div>

                        <div class="pagination mt-3">
                            {!! $comments->withQueryString()->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">

    $('#filterForm').on('submit', function (e) {
        e.preventDefault();
        var base_url = window.location.href;
        var route = "{{route('posts.comments.pending')}}";
        var search = $('#search').val();

        if (search.length !== 0) {
            if (base_url.indexOf('?' + 'search' + '=') != -1 || base_url.indexOf('&' + 'search' + '=') != -1) {
                var new_url = replaceUrlParam(base_url, 'search', search);
                window.location.href = removeURLParameter(new_url, 'page');
            } else {
                if (base_url === route) {
                    this.submit();
                } else {
                    var new_url = base_url + '&search=' + search;
                    window.location.href = removeURLParameter(new_url, 'page');
                }
            }
        }

    })

    function destroyPostComment(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'آیا از حذف اطمینان دارید ؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgb(221, 51, 51)',
            cancelButtonColor: 'rgb(48, 133, 214)',
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`destroy-PostComment-${id}`).submit()
            }
        })
    }
</script>
