<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
</head>
<body>

    <h1>Thêm Sinh Viên</h1>

    <form action="/PMNM_68PM3_MORLVOTEY_5001568-MAIN/public/sinhvien/store" method="POST">

        <p>
            <label>Tên</label>
            <input type="text" name="ten" required>
        </p>

        <p>
            <label>Giới tính</label>
            <input type="text" name="gioitinh" required>
        </p>

        <p>
            <label>MSS</label>
            <input type="text" name="mss" required>
        </p>

        <button type="submit">
            Thêm sinh viên
        </button>

    </form>

</body>
</html>