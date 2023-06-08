<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <base href="/">
    <meta charset="utf-8" />
    <title>Xác thực</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    @include('admin.layouts.css')
</head>

<body>
    <div class="auth-page-wrapper pt-5">
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop"
                                        colors="primary:#0ab39c" class="avatar-xl"></lord-icon>
                                </div>

                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Xác thực email</h5>
                                    <p>Nếu bạn không nhận được email hãy bấm vào link bên dưới</p>
                                </div>
                                <div class="p-2">
                                    @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        Email xác thực mới đã được gửi đến email của bạn
                                    </div>
                                    @endif

                                    <form method="POST" action="{{ route('verification.resend') }}">
                                        @csrf

                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Bấm vào đây để gửi yêu
                                                cầu</button>
                                        </div>
                                    </form>
                                </div>
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