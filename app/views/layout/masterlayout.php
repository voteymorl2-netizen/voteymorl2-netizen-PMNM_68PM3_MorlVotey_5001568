<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .content {
            min-height: 600px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        footer {
            background: #212529;
            color: white;
            padding: 15px;
            text-align: center;
        }
    </style>

</head>

<body>

    <!-- Header -->
    <?php require_once '../app/views/layout/partial/header.php'; ?>

    <!-- Content -->
    <div class="container content">

        <?php require_once '../app/views/' . $viewname . '.php'; ?>

    </div>

    <!-- Footer -->
    <?php require_once '../app/views/layout/partial/footer.php'; ?>

</body>

</html>