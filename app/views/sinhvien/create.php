<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <!-- HEADER -->
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Thêm Sinh Viên</h4>
                </div>

                <div class="card-body">

                    <form action="/sinhvien/store" method="POST">

                        <!-- Tên -->
                        <div class="mb-3">
                            <label class="form-label">Tên sinh viên</label>
                            <input type="text"
                                   name="ten"
                                   class="form-control"
                                   placeholder="Nhập tên sinh viên"
                                   required>
                        </div>

                        <!-- Giới tính -->
                        <div class="mb-3">
                            <label class="form-label">Giới tính</label>
                            <select name="gioitinh" class="form-select" required>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>

                        <!-- MSSV -->
                        <div class="mb-3">
                            <label class="form-label">MSSV</label>
                            <input type="text"
                                   name="mss"
                                   class="form-control"
                                   placeholder="Nhập mã sinh viên"
                                   required>
                        </div>

                        <!-- Lớp học -->
                        <div class="mb-3">
                            <label class="form-label">Lớp học</label>
                            <select name="malop" class="form-select" required>

                                <option value="">-- Chọn lớp --</option>

                                <option value="68PM3">68PM3</option>
                                <option value="CNTT01">CNTT01</option>
                                <option value="CNTT02">CNTT02</option>
                                <option value="ATTT01">ATTT01</option>
                                <option value="HTTT01">HTTT01</option>
                                <option value="KTPM01">KTPM01</option>

                            </select>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">
                                Thêm Sinh Viên
                            </button>

                            <a href="/sinhvien/index" class="btn btn-secondary">
                                Hủy
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>