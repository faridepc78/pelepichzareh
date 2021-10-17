@section('admin_title')
    <title>پنل مدیریت پله پیچ زارع | پروژه ها</title>
@endsection

@section('admin_css')
    <link type="text/css" rel="stylesheet"
          href="{{asset('assets/backend/plugins/persianDatepicker/css/persianDatepicker-default.css')}}">
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('projects.index')}}">مدیریت
                                پروژه ها</a></li>
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
                            <h3 class="card-title mb-3">مدیریت پروژه ها</h3>

                            <div class="card-tools">

                                <form id="dateForm" method="get"
                                      action="{{route('projects.index')}}">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input readonly id="date" value="{{request()->input('date')}}" type="text"
                                               name="date"
                                               class="form-control float-right"
                                               placeholder="جستجو بر اساس تاریخ">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <br>

                                <form id="searchForm" method="get"
                                      action="{{route('projects.index')}}">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input onkeyup="this.value=removeSpaces(this.value)" id="search"
                                               value="{{request()->input('search')}}" type="text"
                                               name="search"
                                               class="form-control float-right"
                                               placeholder="جستجو بر اساس نام یا مشتری">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="card-body table-responsive p-0 mt-5">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>اسلاگ</th>
                                    <th>مشتری</th>
                                    <th>لینک</th>
                                    <th>تصویر</th>
                                    <th>تاریخ</th>
                                    <th>گالری</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($projects))

                                    @foreach($projects as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->slug}}</td>
                                            <td>{{$value->customer}}</td>
                                            @if ($value->link!=null)
                                                <td>
                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                       data-target="#projectLink{{$value['id']}}">
                                                        <i class="fa fa-eye text-success"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td><i class="fa fa-close text-danger"></i></td>
                                            @endif
                                            <td>
                                                <img width="50" height="50" src="{{$value->image->original}}" alt="{{$value->image->original}}">
                                            </td>
                                            <td>{{\Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($value['created_at']))}}</td>

                                            <td>
                                                <a target="_blank" href="{{route('projects.gallery.index',$value->id)}}">
                                                    <i class="fa fa-image text-success"></i>
                                                </a>
                                            </td>

                                            <td>
                                                <a target="_blank" href="{{route('projects.edit',$value->id)}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('projects.destroy', $value->id) }}"
                                                   onclick="destroyProject(event, {{ $value->id }})"><i
                                                            class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('projects.destroy', $value->id) }}"
                                                      method="post" id="destroy-Project-{{ $value->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade mt-lg-5"
                                             id="projectLink{{$value['id']}}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h6 class="modal-title">
                                                            لینک پروژه
                                                            ({{$value->name}})
                                                        </h6>

                                                        <a style="color: red;cursor: pointer"
                                                           data-dismiss="modal" aria-label="Close">
                                                            <i style="color: red" class="fa fa-close"></i>
                                                        </a>

                                                    </div>

                                                    <div class="modal-body">

                                                        <p class="text-left">{{$value['link']}}</p>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                @else

                                    <div class="alert alert-danger text-center">
                                        <p>اطلاعات این بخش ثبت نشده است</p>
                                    </div>

                                @endif

                            </table>

                        </div>

                        <div class="pagination mt-3">
                            {!! $projects->withQueryString()->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@section('admin_js')
    <script type="text/javascript"
            src="{{asset('assets/backend/plugins/persianDatepicker/js/persianDatepicker.min.js')}}"></script>
@endsection

@include('admin.layout.footer')

<script type="text/javascript">

    $("#date").persianDatepicker({formatDate: "YYYY-0M-0D"});

    $('#dateForm').on('submit', function (e) {
        e.preventDefault();
        var base_url = '{{cleanExtraQueryString(['search'],null,'projects.index')}}';
        var route = "{{route('projects.index')}}";
        var date = $('#date').val();

        if (date.length !== 0) {

            if (base_url.indexOf('?' + 'date' + '=') != -1 || base_url.indexOf('&' + 'date' + '=') != -1) {
                var new_url = replaceUrlParam(base_url, 'date', date);
                window.location.href = removeURLParameter(new_url, 'page');
            } else {
                if (base_url === route) {
                    this.submit();
                } else {
                    var new_url = base_url + '&date=' + date;
                    window.location.href = removeURLParameter(new_url, 'page');
                }
            }

        }

    })

    $('#searchForm').on('submit', function (e) {
        e.preventDefault();
        var base_url = '{{cleanExtraQueryString(['date'],null,'projects.index')}}';
        var route = "{{route('projects.index')}}";
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

    function destroyProject(event, id) {
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
                document.getElementById(`destroy-Project-${id}`).submit()
            }
        })
    }
</script>
