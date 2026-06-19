<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa Sinh Viên</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <!-- HEADER -->
                <div class="card-header bg-warning text-center text-dark">
                    <h4 class="mb-0"> Sửa Thông Ttin Sinh Viên</h4>
                </div>

                <div class="card-body">

                    <?php $sv = $sinhvien ?? []; ?>

                    <form method="POST" action="/sinhvien/update">
                        <!-- ID hidden -->
                        <input type="hidden" name="id" value="<?= $sv['id'] ?>">
                        <!-- Tên -->
                        <div class="mb-3">
                            <label class="form-label">Họ tên</label>
                            <input type="text"
                                   name="ten"
                                   class="form-control"
                                   value="<?= htmlspecialchars($sv['ten'] ?? '') ?>"
                                   required>
                        </div>

                        <!-- Giới tính -->
                        <div class="mb-3">
                            <label class="form-label">Giới tính</label>
                            <select name="gioitinh" class="form-select" required>

                                <option value="Nam"
                                    <?= ($sv['gioitinh'] ?? '') == 'Nam' ? 'selected' : '' ?>>
                                    Nam
                                </option>

                                <option value="Nữ"
                                    <?= ($sv['gioitinh'] ?? '') == 'Nữ' ? 'selected' : '' ?>>
                                    Nữ
                                </option>

                            </select>
                        </div>

                        <!-- MSSV -->
                        <div class="mb-3">
                            <label class="form-label">MSSV</label>
                            <input type="text"
                                   name="mss"
                                   class="form-control"
                                   value="<?= htmlspecialchars($sv['mss'] ?? '') ?>"
                                   required>
                        </div>

                        <!-- Lớp học -->
                        <div class="mb-3">
                            <label class="form-label">Lớp học</label>

                            <select name="malop" class="form-select" required>

                                <?php foreach ($lophoc as $lop): ?>
                                    <option value="<?= $lop['malop'] ?>"
                                        <?= ($sv['malop'] ?? '') == $lop['malop'] ? 'selected' : '' ?>>
                                        <?= $lop['tenlop'] ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-grid gap-2">

                            <button type="submit" class="btn btn-warning">
                                 Cập nhật
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