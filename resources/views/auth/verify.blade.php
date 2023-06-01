<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Xác thực</title>
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
                                    @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        Email xác thực mới đã được gửi về địa chỉ email của bạn
                                    </div>
                                    @endif

                                    <span>Bạn cần xác thực địa chỉ email để tiếp tục sử dụng dịch vụ</span>

                                    <p>Vui lòng kiểm tra email trước khi gửi yêu cầu mới</p>
                                    <form method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Bấm vào đây để
                                            gửi yêu cầu mới</button>.
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