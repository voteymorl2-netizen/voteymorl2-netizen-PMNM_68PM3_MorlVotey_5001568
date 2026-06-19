<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm lớp học</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 600px;">

    <div class="card shadow-sm">

        <!-- HEADER -->
        <div class="card-header bg-success text-white fw-bold">
            Thêm lớp học mới
        </div>

        <!-- BODY -->
        <div class="card-body">

            <form action="/lophoc/store" method="POST">

                <!-- Mã lớp -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Mã lớp <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="malop"
                           class="form-control"
                           placeholder="VD: CNTT01"
                           required>
                </div>

                <!-- Tên lớp -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Tên lớp <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="tenlop"
                           class="form-control"
                           placeholder="Công nghệ thông tin K01"
                           required>
                </div>

                <!-- Ghi chú -->
                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Ghi chú
                    </label>
                    <textarea name="ghichu"
                              class="form-control"
                              rows="3"
                              placeholder="Nhập ghi chú..."></textarea>
                </div>

                <!-- BUTTON -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success w-50">
                        Lưu lớp học
                    </button>

                    <a href="/lophoc" class="btn btn-outline-secondary w-50">
                        Hủy
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>