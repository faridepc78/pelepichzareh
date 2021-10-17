@section('admin_title')
    <title>پنل مدیریت پله پیچ زارع | محصولات</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}">مدیریت محصولات</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('products.create')}}">ایجاد
                                محصولات</a></li>
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
                            <h3 class="card-title">ایجاد محصولات</h3>
                        </div>

                        <form id="store_product_form" action="{{route('products.store')}}"
                              method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام محصول *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام محصول را وارد کنید"
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ محصول *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug') }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ محصول را وارد کنید"
                                           autocomplete="slug" autofocus>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="code">کد محصول *</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('code') is-invalid @enderror"
                                           value="{{ old('code') }}" id="code" name="code"
                                           placeholder="لطفا کد محصول را وارد کنید"
                                           autocomplete="code" autofocus>

                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="album_id">آلبوم محصول *</label>
                                    <select class="form-control  @error('album_id') is-invalid @enderror"
                                            id="album_id"
                                            name="album_id">
                                        <option selected disabled value="">
                                            لطفا آلبوم محصول را انتخاب کنید
                                        </option>

                                        @if (count($albums))

                                            @foreach($albums as $value)

                                                <optgroup label="{{$value->name}}">

                                                    <option disabled value="" style="font-size: 18px">{{$value->name}}</option>

                                                    @if (count($value->sub))

                                                        @foreach($value->sub as $item)

                                                            <option style="color: red"
                                                                    @if ($item->id==old('album_id'))
                                                                    selected="selected"
                                                                    @endif
                                                                    value="{{$item->id}}">{{$item->name}}</option>

                                                        @endforeach

                                                    @endif

                                                </optgroup>

                                            @endforeach

                                        @endif

                                    </select>

                                    @error('album_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر محصول *</label>
                                    <input accept=".jpg,.jpeg,.png" type="file"
                                           class="form-control @error('image') is-invalid @enderror"
                                           autofocus id="image" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">توضیحات محصول *</label>
                                    <textarea class="form-control ckeditor @error('text') is-invalid @enderror"
                                              id="text"
                                              name="text" autocomplete="text"
                                              autofocus>{{ old('text') }}</textarea>

                                    @error('text')
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

@section('admin_js')
    <script type="text/javascript" src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
@endsection

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        var text_field = 'text';
        var text_error = 'لطفا توضیحات محصول را وارد کنید';

        $('#store_product_form').validate({

            rules: {
                name: {
                    required: true
                },

                slug: {
                    required: true
                },

                code: {
                    required: true
                },

                album_id: {
                    required: true
                },

                image: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "لطفا نام محصول را وارد کنید"
                },

                slug: {
                    required: "لطفا اسلاگ محصول را وارد کنید"
                },

                code: {
                    required: "لطفا کد محصول را وارد کنید"
                },

                album_id: {
                    required: "لطفا آلبوم محصول را انتخاب کنید"
                },

                image: {
                    required: "لطفا تصویر محصول را انتخاب کنید"
                }
            },
            submitHandler: function (form) {
                if (validateCkeditor(text_field, text_error) === true) {
                    form.submit();
                }
            }

        });

    });

</script>
