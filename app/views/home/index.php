<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

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

        .home-box{
            width: 400px;
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .home-box h1{
            color: #333;
            margin-bottom: 20px;
        }

        .welcome{
            font-size: 20px;
            color: #555;
            margin-bottom: 30px;
        }

        .username{
            color: #0099ff;
            font-weight: bold;
        }

        .logout-btn{
            display: inline-block;
            text-decoration: none;
            background: #ff4d4d;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            transition: 0.3s;
            font-weight: bold;
        }

        .logout-btn:hover{
            background: #e60000;
        }

    </style>

</head>

<body>

    <div class="home-box">

        <h1>HOME PAGE</h1>

        <div class="welcome">

            Welcome:
            <span class="username">
                <?php echo $_SESSION['username']; ?>
            </span>

        </div>

        <a
            href="/PMNM_68PM3_MorlVotey_5001568-main/public/auth/logout"
            class="logout-btn"
        >
            Logout
        </a>

    </div>

</body>

</html>