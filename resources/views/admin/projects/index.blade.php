@section('admin_title')
    <title>پنل مدیریت پله پیچ زارع | پروژه ها</title>
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
                        </div>

                        <div class="card-body table-responsive p-0 mt-5">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>بیو</th>
                                    <th>دسته بندی</th>
                                    <th>تصویر</th>
                                    <th>تاریخ</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($projects))

                                    @foreach($projects as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->bio}}</td>
                                            <td>{{$value->category->name}}</td>
                                            <td>
                                                <img width="50" height="50" src="{{$value->image->original}}" alt="{{$value->image->original}}">
                                            </td>
                                            <td>{{\Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($value['created_at']))}}</td>
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

                                    @endforeach

                                @else

                                    <div class="alert alert-danger text-center">
                                        <p>اطلاعات این بخش ثبت نشده است</p>
                                    </div>

                                @endif

                            </table>

                        </div>

                        <div class="pagination mt-3">
                            {!! $projects->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
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
