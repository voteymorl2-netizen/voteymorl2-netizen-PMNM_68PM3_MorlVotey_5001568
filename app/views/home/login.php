<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5 col-lg-4">

            <div class="card shadow-lg border-0">

                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Đăng nhập hệ thống</h3>
                </div>

                <div class="card-body p-4">

                    <form action="/auth/login" method="POST">

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Tên đăng nhập
                            </label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                placeholder="Nhập tên đăng nhập"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                Mật khẩu
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Nhập mật khẩu"
                                required
                            >
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100">
                            Đăng nhập
                        </button>

                    </form>

                </div>

                

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>