<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">
    <link class="js-stylesheet" href="admin/css/light.css" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100 h-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                type="email" name="email" placeholder="Địa chỉ email"
                                                value="{{ old('email') }}" autocomplete="email" autofocus />

                                            @error('email')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu</label>
                                            <input
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                type="password" name="password" placeholder="Mật khẩu" />

                                            @error('password')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small>
                                                <a href="{{ route('password.request') }}">Quên mật khẩu</a>
                                            </small>
                                        </div>

                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="form-check-label">
                                                    Ghi nhớ
                                                </span>
                                            </label>
                                        </div>

                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Đăng nhập</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="admin/js/app.js"></script>
</body>

</html>