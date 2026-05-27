<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
</head>
<body>

    <h1>Danh Sách Sinh Viên</h1>

    <table border="1" cellpadding="10">

        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Giới Tính</th>
            <th>MSSV</th>
        </tr>

        <?php foreach ($sinhvien as $index => $sv): ?>

        <tr>
            <td><?php echo $index + 1; ?></td>
            <td><?php echo $sv['ten']; ?></td>
            <td><?php echo $sv['gioitinh']; ?></td>
            <td><?php echo $sv['mss']; ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</body>
</html>