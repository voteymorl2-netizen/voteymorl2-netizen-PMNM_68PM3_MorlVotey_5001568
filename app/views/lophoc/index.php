<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách lớp học</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <div class="card shadow">

        <!-- Header -->
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Danh sách lớp học
            </h4>

            <a href="/lophoc/create" class="btn btn-success">
                + Thêm lớp học
            </a>

        </div>

        <div class="card-body">

            <!-- Tìm kiếm -->
            <form action="/lophoc/index" method="GET">

                <div class="row mb-3">

                    <div class="col-md-6">

                        <input
    type="text"
    name="keyword"
    class="form-control"
    placeholder="Tìm theo mã lớp hoặc tên lớp"
    value="<?= $keyword ?? '' ?>">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">
                            Tìm kiếm
                        </button>

                    </div>

                    <div class="col-md-2">

                        <a href="/lophoc/index"
                           class="btn btn-secondary w-100">

                            Đặt lại

                        </a>

                    </div>

                </div>

            </form>

            <!-- Table -->

            <table class="table table-bordered table-hover text-center align-middle">

                <thead class="table-dark">

                <tr>

                    <th width="70">STT</th>

                    <th>Mã lớp</th>

                    <th>Tên lớp</th>

                    <th>Ghi chú</th>

                    <th width="170">Thao tác</th>

                </tr>

                </thead>

                <tbody>

                <?php if(!empty($lophoc)): ?>

                    <?php foreach($lophoc as $index=>$lop): ?>

                        <tr>

                            <td><?= $index+1 ?></td>

                            <td>

                                <span class="badge bg-secondary">

                                    <?= $lop['malop'] ?>

                                </span>

                            </td>

                            <td>

                                <?= $lop['tenlop'] ?>

                            </td>

                            <td>

                                <?= $lop['ghichu'] ?>

                            </td>

                            <td>

                                <a
                                    href="/lophoc/edit/<?= $lop['Id'] ?>"
                                    class="btn btn-warning btn-sm">

                                    Sửa

                                </a>

                                <a
                                    href="/lophoc/delete/<?= $lop['Id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa?')">

                                    Xóa

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="5">

                            Không có dữ liệu

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

            <!-- Footer -->

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    Hiển thị
                    <strong><?= count($lophoc) ?></strong>
                    lớp học

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>