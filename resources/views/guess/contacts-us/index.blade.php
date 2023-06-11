@extends('guess.layouts.app')
@section('content')
@include('guess.components.breadcrumbs')

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Liên lạc</h3>

                                @if (Session::has('message'))
                                <div class="mb-4 alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                                @endif

                                <form action="{{ route('contact-us.store') }}" method="POST" class="contactForm">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">Họ và tên</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Họ và tên">

                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="email">Địa chỉ email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Địa chỉ email">

                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">Chủ đề</label>
                                                <input type="text" class="form-control" name="subject" id="subject"
                                                    placeholder="Chủ đề">

                                                @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Nội dung</label>
                                                <textarea name="message" class="form-control" id="message" cols="30"
                                                    rows="4" placeholder="Nội dung"></textarea>

                                                @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Gửi tin nhắn</button>
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                                <h3>Luôn luôn giữ liên lạc</h3>
                                <p class="mb-4">Chúng tôi sẵn sàng cho bất kỳ đề xuất nào hoặc chỉ để trò chuyện</p>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-map-marker"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Địa chỉ:</span> Ninh Kiều, Cần Thơ</p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>SĐT:</span> <a href="tel:0962785101">0962785101</a></p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-paper-plane"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Email:</span> <a
                                                href="mailto:voduchuy2001@gmail.com">voduchuy2001@gmail.com</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-globe"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Website</span> <a href="https://spacantho.com"
                                                target="_blank">spacantho.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    let fewSeconds = 5;
    $('button').click(function(){
        let btn = $(this);
        let text = btn.text();
        setTimeout(function(){
            btn.prop('disabled', true);
            btn.text("Thông tin của bạn đang được xử lý...");
        }, 10);
        setTimeout(function(){
            btn.prop('disabled', false);
            btn.text( text);
        }, fewSeconds*1000);
    });
</script>
@endsection