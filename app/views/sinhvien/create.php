<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .form-container{
        width:500px;
        margin:50px auto;
        padding:30px;
        background:#fff;
        border-radius:10px;
        box-shadow:0 4px 12px rgba(0,0,0,0.15);
    }

    .form-container h1{
        text-align:center;
        color:#333;
        margin-bottom:25px;
    }

    .form-group{
        margin-bottom:18px;
    }

    .form-group label{
        display:block;
        font-weight:bold;
        margin-bottom:6px;
        color:#444;
    }

    .form-group input[type="text"],
    .form-group select{
        width:100%;
        padding:10px;
        border:1px solid #ccc;
        border-radius:5px;
        font-size:14px;
    }

    .form-group input[type="text"]:focus,
    .form-group select:focus{
        outline:none;
        border-color:#28a745;
        box-shadow:0 0 5px rgba(40,167,69,0.4);
    }

    .btn-submit{
        width:100%;
        padding:12px;
        background:#28a745;
        color:white;
        border:none;
        border-radius:5px;
        cursor:pointer;
        font-size:16px;
        font-weight:bold;
        transition:0.3s;
    }

    .btn-submit:hover{
        background:#218838;
        transform:translateY(-2px);
    }

    

    

   
</style>
</head>
<body>
    <div class="form-container">

    <h1>➕ Thêm Sinh Viên</h1>

    <form action="/PMNM_68PM3_MORLVOTEY_5001568-MAIN/public/sinhvien/store" method="POST">

        <div class="form-group">
            <label>Tên sinh viên</label>
            <input
                type="text"
                name="ten"
                placeholder="Nhập tên sinh viên"
                required
            >
        </div>

        <div class="form-group">
            <label>Giới tính</label>

            <select name="gioitinh" required>
               
                <option value="M">Nam</option>
                <option value="F">Nữ</option>
            </select>
        </div>

        <div class="form-group">
            <label>MSSV</label>
            <input
                type="text"
                name="mss"
                placeholder="Nhập mã số sinh viên"
                required
            >
        </div>

        <button type="submit" class="btn-submit">
            Thêm Sinh Viên
        </button>

    </form>

    

</div>
    
</body>
</html>