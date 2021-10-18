@section('admin_title')
    <title>پنل مدیریت پله پیچ زارع | پست ها</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('posts.index')}}">مدیریت
                                پست ها</a></li>
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
                            <h3 class="card-title mb-3">مدیریت پست ها</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>اسلاگ</th>
                                    <th>دسته بندی</th>
                                    <th>تصویر</th>
                                    <th>مدیا</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($posts))

                                    @foreach($posts as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->slug}}</td>
                                            <td>{{$value->category->name}}</td>
                                            <td>
                                                <img width="50" height="50" src="{{$value->image->original}}" alt="{{$value->image->original}}">
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{route('posts.m_index',$value->id)}}">
                                                    <i class="fa fa-image text-success"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{route('posts.edit',$value->id)}}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('posts.destroy', $value->id) }}"
                                                   onclick="destroyPost(event, {{ $value->id }})"><i
                                                            class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('posts.destroy', $value->id) }}"
                                                      method="post" id="destroy-Post-{{ $value->id }}">
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
                            {!! $posts->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function destroyPost(event, id) {
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
                document.getElementById(`destroy-Post-${id}`).submit()
            }
        })
    }
</script>
