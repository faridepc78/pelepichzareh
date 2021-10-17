@section('admin_title')
    <title>پنل مدیریت پله پیچ زارع | ویژگی محصولات</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}">مدیریت
                                محصولات</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('product.attributes',$product['id'])}}">مدیریت
                                ویژگی های محصول ({{$product->name}})</a></li>
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
                            <h3 class="card-title">مدیریت ویژگی های محصول ({{$product->name}})</h3>
                        </div>

                        <form action="{{route('product.attributes.createOrUpdate',$product['id'])}}"
                              method="post">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                @if (count($attributes))

                                    @foreach($attributes as $value)

                                        <div class="form-group">
                                            <label>{{$value['name']}}</label>
                                            <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                                   class="form-control"
                                                   value="@if (isset($value->getValueAttribute($product['id'],$value['id'])['val'])){{$value->getValueAttribute($product['id'],$value['id'])['val']}}@endif"
                                                   name="val[{{$value->id}}][]"
                                                   placeholder="{{$value['name']}} را وارد کنید">
                                        </div>

                                    @endforeach

                                @else

                                    <div class="alert alert-danger text-center">
                                        <p>ویژگی های آلبوم این محصول ثبت نشده است</p>
                                    </div>

                                @endif

                            </div>

                            @if (count($attributes))
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                </div>
                            @endif

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@include('admin.layout.footer')
