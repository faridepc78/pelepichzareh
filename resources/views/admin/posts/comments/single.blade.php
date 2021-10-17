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
                        <li class="breadcrumb-item"><a href="{{route('posts.comments.index')}}">مدیریت نظرات</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('posts.comments.single',$comment->id)}}">مدیریت
                                نظر ({{$comment->name}})</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-success">

                        <div class="card-header">
                            <h3 class="card-title">مدیریت نظر ({{$comment->name}})</h3>
                        </div>

                        <form id="managementPostCommentForm" method="post"
                              action="{{route('posts.comments.management',$comment['id'])}}">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="name">نام</label>
                                        <input readonly type="text"
                                               class="form-control"
                                               value="{{ $comment->name }}" id="name">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="email">ایمیل</label>
                                        <input readonly type="text"
                                               class="form-control"
                                               value="{{ $comment->email }}" id="email">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="mobile">تلفن همراه</label>
                                        <input readonly type="text"
                                               class="form-control"
                                               value="{{ $comment->mobile }}" id="mobile">
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="site">سایت</label>
                                        <input readonly type="text"
                                               class="form-control"
                                               value="{{ $comment->site }}" id="site">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="status">وضعیت</label>
                                        <input readonly type="text"
                                               class="form-control"
                                               value="@lang($comment->status)" id="status">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="date_time">تاریخ و زمان</label>
                                        <input readonly type="text"
                                               class="form-control"
                                               value="{{\Morilog\Jalali\CalendarUtils::strftime('j F Y || H:i:s', strtotime($comment['created_at']))}}"
                                               id="date_time">
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="message">متن نظر</label>
                                        <textarea id="message" class="form-control" rows="10" style="resize: vertical"
                                                  readonly>{{ $comment->message }}</textarea>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="status">وضعیت نظر *</label>
                                        <select class="form-control  @error('status') is-invalid @enderror"
                                                id="status"
                                                name="status">
                                            <option selected disabled value="">لطفا وضعیت نظر را انتخاب کنید</option>

                                            @foreach(\App\Models\PostComment::$statuses as $value)
                                                @if ($value!=\App\Models\PostComment::PENDING)
                                                    <option
                                                        @if ($value==old('status',$comment->status))
                                                        selected="selected"
                                                        @endif
                                                        value="{{$value}}">@lang($value)</option>
                                                @endif
                                            @endforeach

                                        </select>

                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="answer">پاسخ نظر *</label>
                                        <textarea onkeyup="this.value=removeSpaces(this.value)" placeholder="لطفا پاسخ نظر را وارد کنید" style="resize: vertical"
                                                  rows="10" class="form-control @error('answer') is-invalid @enderror"
                                                  id="answer"
                                                  name="answer" autocomplete="answer"
                                                  autofocus>{{ old('answer',$comment->answer) }}</textarea>

                                        @error('answer')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

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

        $('#managementPostCommentForm').validate({

            rules: {
                status: {
                    required: true
                },
                answer: {
                    required: true
                }
            },

            messages: {
                status: {
                    required: "لطفا وضعیت نظر را انتخاب کنید"
                },
                answer: {
                    required: "لطفا پاسخ نظر را وارد کنید"
                }
            }

        });

    });

</script>
