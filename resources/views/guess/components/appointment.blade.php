<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            <div class="col-md-3 d-flex align-items-stretch">
                <div class="consultation w-100 text-center px-4 px-md-5">
                    <h3 class="mb-4">Dịch vụ chăm sóc sức khỏe</h3>
                    <p>A small river named Duden flows by their place and supplies</p>
                    <a href="{{ route('service.index') }}" class="btn-custom">Các dịch vụ</a>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="consultation consul w-100 px-4 px-md-5">
                    <div class="text-center">
                        <h3 class="mb-4">Đặt lịch với chúng tôi</h3>
                    </div>

                    <form action="{{ route('appointment.store') }}" method="POST" class="appointment-form"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Họ và tên">

                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">

                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Địa chỉ email">

                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" name="date_time" class="form-control" id="date_time"
                                            placeholder="Lịch dịch vụ">

                                        @error('date_time')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-white py-2 px-4">Đặt lịch</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch">
                <div class="consultation w-100 text-center px-4 px-md-5">
                    <h3 class="mb-4">Tìm một chuyên gia sức khỏe</h3>
                    <p>Một con sông nhỏ tên là Duden chảy qua nơi họ ở và tiếp tế</p>
                    <a href="#" class="btn-custom">Gặp gỡ chuyên gia của chúng tôi</a>
                </div>
            </div>
        </div>
    </div>
</section>

@section('scripts')
<script>
    flatpickr("#date_time", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>
@endsection