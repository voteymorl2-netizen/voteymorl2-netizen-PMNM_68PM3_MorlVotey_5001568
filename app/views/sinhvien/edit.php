<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Sinh Viên</title>
</head>
<body>

<h2>Sửa Sinh Viên</h2>

<?php $sv = $sinhvien ?? null; ?>

<form method="POST" action="/sinhvien/update/<?php echo $sv['Id']; ?>">

    <label>Tên:</label><br>
    <input type="text" name="ten" value="<?php echo $sv['ten']; ?>"><br><br>

    <label>Giới tính:</label><br>
    <input type="text" name="gioitinh" value="<?php echo $sv['gioitinh']; ?>"><br><br>

    <label>MSSV:</label><br>
    <input type="text" name="mss" value="<?php echo $sv['mss']; ?>"><br><br>

    <button type="submit">Cập nhật</button>

</form>

<br>
<a href="/sinhvien/index">⬅ Quay lại</a>

</body>
</html>