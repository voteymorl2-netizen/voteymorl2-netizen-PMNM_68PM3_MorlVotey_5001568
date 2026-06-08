<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>

    <style>
        .header{
            width:100%;
            height:80px;
            background:red;
            color:white;
            padding:20px;
        }

        .content{
            width:80%;
            margin:auto;
            padding:20px;
        }

        .footer{
            width:100%;
            height:80px;
            background:blue;
            color:white;
            padding:20px;
            margin-top:20px;
        }
    </style>
</head>
<body>

<div class="header">
    <?php require_once '../app/views/layout/partial/header.php'; ?>
</div>

<div class="content">
    <?php require_once '../app/views/' . $viewname . '.php'; ?>
</div>

<div class="footer">
    <?php require_once '../app/views/layout/partial/footer.php'; ?>
</div>

</body>
</html>