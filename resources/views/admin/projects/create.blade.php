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
                        <li class="breadcrumb-item"><a href="{{route('projects.index')}}">مدیریت پروژه ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('projects.create')}}">ایجاد
                                پروژه ها</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">ایجاد پروژه ها</h3>
                        </div>

                        <form id="store_project_form" action="{{route('projects.store')}}"
                              method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام پروژه *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام پروژه را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bio">بیو پروژه</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('bio') is-invalid @enderror"
                                           value="{{ old('bio') }}" id="bio" name="bio"
                                           placeholder="در صورت تمایل بیو پروژه را وارد کنید"
                                           autocomplete="bio" autofocus>

                                    @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_id">دسته بندی پروژه *</label>
                                    <select class="form-control  @error('category_id') is-invalid @enderror"
                                            id="category_id"
                                            name="category_id">
                                        <option selected disabled value="">
                                            لطفا دسته بندی پروژه را انتخاب کنید
                                        </option>

                                        @if (count($categories))

                                            @foreach($categories as $value)

                                                <option
                                                    @if ($value->id==old('category_id'))
                                                    selected="selected"
                                                    @endif
                                                    value="{{$value->id}}">{{$value->name}}</option>

                                            @endforeach

                                        @endif

                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر پروژه *</label>
                                    <input accept=".jpg,.jpeg,.png" type="file"
                                           class="form-control @error('image') is-invalid @enderror"
                                           autofocus id="image" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        $('#store_project_form').validate({

            rules: {
                name: {
                    required: true
                },

                category_id: {
                    required: true
                },

                image: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام پروژه را وارد کنید"
                },

                category_id: {
                    required: "لطفا دسته بندی پروژه را انتخاب کنید"
                },

                image: {
                    required: "لطفا تصویر پروژه را انتخاب کنید"
                }
            }

        });

    });

</script>
