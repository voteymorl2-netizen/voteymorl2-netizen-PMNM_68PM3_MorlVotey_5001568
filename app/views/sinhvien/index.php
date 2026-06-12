<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Sinh Viên</title>
</head>
<body>

<h1>Danh Sách Sinh Viên</h1>

<table border="1" cellpadding="10">

    <tr>
        <th>STT</th>
        <th>ID</th>
        <th>Tên</th>
        <th>Giới Tính</th>
        <th>MSSV</th>
        <th>Thao tác</th>
    </tr>

    <?php foreach ($sinhvien as $index => $sv): ?>
    <tr>
        <td><?php echo $index + 1; ?></td>

        <td><?php echo $sv['Id']; ?></td>

        <td><?php echo $sv['ten']; ?></td>

        <td><?php echo $sv['gioitinh']; ?></td>

        <td><?php echo $sv['mss']; ?></td>

        <td>
            <a href="/sinhvien/edit/<?php echo $sv['Id']; ?>">Sửa</a> |
            <a href="/sinhvien/delete/<?php echo $sv['Id']; ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<br>

<!-- PAGING -->
<div>
<?php
$totalPage = $totalPage ?? 1;
$pageSize = 5;

for ($i = 1; $i <= $totalPage; $i++) {
    $offset = ($i - 1) * $pageSize;

    echo "<a href='/sinhvien/index/$pageSize/$offset'> Trang $i </a> ";
}
?>
</div>

</body>
</html>