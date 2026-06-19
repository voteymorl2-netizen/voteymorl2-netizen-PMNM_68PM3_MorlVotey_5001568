<!DOCTYPE html>

<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Danh sách sinh viên</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>



<body>
    <div class="container mt-4">

        <div class="card shadow">
            <!-- HEADER -->
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    Danh sách sinh viên
                    <span class="badge bg-primary">

                        <?= $totalRecord ?>
                    </span>
                </h4>
                <a href="/sinhvien/create" class="btn btn-success">
                    + Thêm sinh viên
                </a>
            </div>
            <div class="card-body">
                <!-- SEARCH -->
                <form action="/sinhvien/index" method="GET">
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="keyword"
                                value="<?= htmlspecialchars($keyword ?? '') ?>" placeholder="Tên hoặc MSSV">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" name="lop">
                                <option value="">-- Tất cả lớp --</option>
                                <?php foreach ($lophoc as $lopItem): ?>
                                    <option value="<?= $lopItem['malop'] ?>" <?= ($lop ?? '') == $lopItem['malop'] ? 'selected' : '' ?>>
                                        <?= $lopItem['tenlop'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary">Tìm kiếm</button>
                        </div>
                        <div class="col-auto">
                            <a href="/sinhvien/index/<?= $pageSize ?>/0" class="btn btn-secondary">
                                Đặt lại
                            </a>
                        </div>
                        <div class="col d-flex justify-content-end align-items-center">
                            <label class="me-2 mb-0">Hiển thị:</label>
                            <select class="form-select form-select-sm" style="width:120px"
                                onchange="window.location='/sinhvien/index/'+this.value+'/0?keyword=<?= urlencode($keyword) ?>&lop=<?= urlencode($lop) ?>&sort=<?= $sort ?>&order=<?= $order ?>'">
                                <option value="5" <?= ($pageSize ?? 5) == 5 ? 'selected' : '' ?>>5 / trang</option>
                                <option value="10" <?= ($pageSize ?? 5) == 10 ? 'selected' : '' ?>>10 / trang</option>
                                <option value="25" <?= ($pageSize ?? 5) == 25 ? 'selected' : '' ?>>25 / trang</option>
                                <option value="50" <?= ($pageSize ?? 5) == 50 ? 'selected' : '' ?>>50 / trang</option>
                            </select>
                        </div>
                    </div>
                </form>
                <!-- TABLE -->
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="60">STT</th>

                            <!-- MSSV -->
                            <th>
                                <?php
                                $nextOrder = ($sort == 'mss' && $order == 'ASC') ? 'DESC' : 'ASC';
                                ?>
                                <a class="text-white text-decoration-none"
                                    href="/sinhvien/index/<?= $pageSize ?>/<?= $offset ?>?keyword=<?= urlencode($keyword) ?>&lop=<?= urlencode($lop) ?>&sort=mss&order=<?= $nextOrder ?>">
                                    MSSV
                                    <?php
                                    if ($sort == 'mss') {
                                        echo ($order == 'ASC') ? ' ▲' : ' ▼';
                                    } else {
                                        echo ' ⇅';
                                    }
                                    ?>
                                </a>
                            </th>

                            <!-- Họ tên -->
                            <th>
                                <?php
                                $nextOrder = ($sort == 'ten' && $order == 'ASC') ? 'DESC' : 'ASC';
                                ?>
                                <a class="text-white text-decoration-none"
                                    href="/sinhvien/index/<?= $pageSize ?>/<?= $offset ?>?keyword=<?= urlencode($keyword) ?>&lop=<?= urlencode($lop) ?>&sort=ten&order=<?= $nextOrder ?>">
                                    Họ tên
                                    <?php
                                    if ($sort == 'ten') {
                                        echo ($order == 'ASC') ? ' ▲' : ' ▼';
                                    } else {
                                        echo ' ⇅';
                                    }
                                    ?>
                                </a>
                            </th>
                            <th>Giới tính</th>
                            <th>Lớp học</th>
                            <th width="170">Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sinhvien as $index => $sv): ?>
                            <tr>
                                <td><?= ($offset ?? 0) + $index + 1 ?></td>
                                <td><?= htmlspecialchars($sv['mss']) ?></td>
                                <td><?= htmlspecialchars($sv['ten']) ?></td>
                                <td>
                                    <?php if ($sv['gioitinh'] == "Nam"): ?>
                                        <span class="badge bg-primary">Nam</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Nữ</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        <?= htmlspecialchars($sv['tenlop'] ?? $sv['malop']) ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="/sinhvien/edit/<?= $sv['id'] ?>" class="btn btn-warning btn-sm">
                                        Sửa
                                    </a>
                                    <a href="/sinhvien/delete/<?= $sv['id'] ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa?')">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center">

                    <?php
                    $start = $offset + 1;
                    $end = $offset + count($sinhvien);

                    if (count($sinhvien) == 0) {
                        $start = 0;
                        $end = 0;
                    }
                    ?>
                    <div>
                        Hiển thị
                        <strong><?= $start ?></strong>-
                        <strong><?= $end ?></strong>
                        trong
                        <strong><?= $totalRecord ?></strong>
                        bản ghi
                    </div>
                    <nav>
                        <ul class="pagination mb-0">
                            <?php for ($i = 1; $i <= $totalPage; $i++):
                                $newOffset = ($i - 1) * $pageSize;
                                ?>
                                <li class="page-item <?= ($offset == $newOffset) ? 'active' : '' ?>">
                                    <a class="page-link"
                                        href="/sinhvien/index/<?= $pageSize ?>/<?= $newOffset ?>?keyword=<?= urlencode($keyword) ?>&lop=<?= urlencode($lop) ?>&sort=<?= $sort ?>&order=<?= $order ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>