<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa lớp học</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <!-- HEADER -->
                <div class="card-header bg-warning text-dark text-center">
                    <h4 class="mb-0"> Sửa thông tin lớp học</h4>
                </div>

                <!-- BODY -->
                <div class="card-body">

                   <form action="/lophoc/update/<?= $lophoc['Id'] ?? '' ?>" method="POST">


                        <!-- Mã lớp -->
                        <div class="mb-3">
                            <label class="form-label">Mã lớp</label>
                            <input type="text"
                                   name="malop"
                                   class="form-control"
                                   value="<?= $lophoc['malop'] ?? '' ?>"
                                   required>
                        </div>

                        <!-- Tên lớp -->
                        <div class="mb-3">
                            <label class="form-label">Tên lớp</label>
                            <input type="text"
                                   name="tenlop"
                                   class="form-control"
                                   value="<?= $lophoc['tenlop'] ?? '' ?>"
                                   required>
                        </div>

                        <!-- Ghi chú -->
                        <div class="mb-3">
                            <label class="form-label">Ghi chú</label>
                            <textarea name="ghichu"
                                      class="form-control"
                                      rows="3"><?= $lophoc['ghichu'] ?? '' ?></textarea>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex gap-2">

                            <button type="submit" class="btn btn-warning w-50">
                                 Cập nhật
                            </button>

                            <a href="/lophoc/index" class="btn btn-outline-secondary w-50">
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