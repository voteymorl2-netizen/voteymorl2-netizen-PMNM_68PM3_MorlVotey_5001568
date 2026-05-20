<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg,#4facfe,#00f2fe);
        }

        .login-box{
            width: 350px;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .login-box h1{
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group{
            margin-bottom: 20px;
        }

        .form-group label{
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        .form-group input{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus{
            border-color: #4facfe;
        }

        .btn-login{
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #4facfe;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover{
            background: #0099ff;
        }

    </style>

</head>

<body>

    <div class="login-box">

        <h1>Đăng nhập</h1>

        <form action="/PMNM_68PM3_MorlVotey_5001568-main/public/auth/login" method="POST">

            <div class="form-group">

                <label>Tên đăng nhập</label>

                <input
                    type="text"
                    name="username"
                    placeholder="Nhập tên đăng nhập"
                    required
                >

            </div>

            <div class="form-group">

                <label>Mật khẩu</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Nhập mật khẩu"
                    required
                >

            </div>

            <button type="submit" class="btn-login">
                Đăng nhập
            </button>

        </form>

    </div>

</body>

</html>