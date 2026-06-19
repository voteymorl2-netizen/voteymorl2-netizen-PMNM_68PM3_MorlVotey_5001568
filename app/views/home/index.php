<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow-lg">

                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">HOME PAGE</h3>
                </div>

                <div class="card-body text-center">

                    <h4 class="mb-4">
                        Xin chào,
                        <span class="text-primary">
                            <?= $_SESSION['username']; ?>
                        </span>
                    </h4>

                    <div class="d-grid gap-2">

                        <a href="/sinhvien/index"
                           class="btn btn-success">
                            Quản lý sinh viên
                        </a>

                        <a href="/lophoc/index"
                           class="btn btn-warning">
                            Quản lý lớp học
                        </a>

                        <a href="/auth/logout"
                           class="btn btn-danger">
                            Đăng xuất
                        </a>

                    </div>

                </div>

               

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>