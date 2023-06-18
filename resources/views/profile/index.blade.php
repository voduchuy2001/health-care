<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin cá nhân</title>

    @include('admin.layouts.css')
    <style>
        .upload-image {
            display: none;
        }

        .preview-image-box {
            display: none;
        }

        .preview-image {
            width: 7.5rem;
            height: 7.5rem;
            border-radius: 100%;
        }

        .form-upload-image {
            width: 7.5rem;
            height: 7.5rem;
            border: 1px dashed #b1b1b1;
            border-radius: 100%;
        }

        .form-upload-image p {
            text-align: center;
            line-height: 120px;
            cursor: pointer;
        }

        .change-image {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="mt-3 mb-3">
        <div class="container">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="d-flex">
                                <div class="mb-3">
                                    <div class="form-group" style="margin-right: 30px">
                                        <p>Ảnh đại diện</p>
                                        <img src="{{ $user->image }}" alt="{{ $user->name }}"
                                            class="rounded-circle avatar-xl">
                                    </div>
                                </div>

                                @include('admin.components.upload-image')
                            </div>

                            <div class="row">
                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle fs-16 bg- text-light">
                                            <i class="ri-facebook-circle-fill"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="facebook" name="facebook"
                                        value="{{ $user->facebook }}">
                                </div>

                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle fs-16 bg-danger">
                                            <i class="ri-instagram-fill"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="instagram" name="instagram"
                                        value="{{ $user->instagram }}">
                                </div>

                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle fs-16 bg-primary">
                                            <i class="ri-twitter-fill"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="twitter" name="twitter"
                                        value="{{ $user->twitter }}">
                                </div>


                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Họ và tên</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Họ và tên" value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="short_description" class="form-label">Mô tả bản thân</label>
                                        <textarea class="form-control" name="short_description" id="short_description"
                                            placeholder="Mô tả bản thân"
                                            rows="3">{{ $user->short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('profile.change-password') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="old_password" class="form-label">Mật khẩu cũ</label>
                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                            id="old_password" placeholder="Mật khẩu cũ">

                                        @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                            id="new_password" placeholder="Mật khẩu mới">

                                        @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Xác nhận lại mật khẩu</label>
                                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password"
                                            id="confirm_password" placeholder="Xác nhận lại mật khẩu">

                                        @error('confirm_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Đăng xuất</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.javascript')
</body>

</html>