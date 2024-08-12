<?php include 'effect.php'; ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/custom-navbar.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/6.5.2/css/font-awesome.min.css" />
    <link rel="stylesheet" href="fab/css/font-awesome.min.css" />
    <title>Login Panel</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #2C394B;
            overflow: hidden;
        }
        ::selection {
            background: rgba(26, 188, 156, 0.3);
        }
        .wrapper {
            max-width: 500px;
            width: 100%;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0px 4px 10px 1px rgba(0, 0, 0, 0.1);
        }
        .wrapper .title {
            height: 120px;
            background: #030637;
            border-radius: 5px 5px 0 0;
            color: #fff;
            font-size: 30px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .wrapper form {
            padding: 25px 35px;
        }
        .wrapper form .row {
            height: 60px;
            margin-top: 15px;
            position: relative;
        }
        .wrapper form .row input {
            height: 100%;
            width: 100%;
            outline: none;
            padding-left: 70px;
            border-radius: 5px;
            border: 1px solid lightgrey;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        form .row input:focus {
            border-color: #030637;
        }
        form .row input::placeholder {
            color: #999;
        }
        .wrapper form .row i {
            position: absolute;
            width: 55px;
            height: 100%;
            color: #fff;
            font-size: 22px;
            background: #030637;
            border: 1px solid #030637;
            border-radius: 5px 0 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .wrapper form .pass {
            margin-top: 12px;
        }
        .wrapper form .pass a {
            color: #16a085;
            font-size: 17px;
            text-decoration: none;
        }
        .wrapper form .pass a:hover {
            text-decoration: underline;
        }
        .wrapper form .button input {
            margin-top: 20px;
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            padding-left: 0px;
            background: #030637;
            border: 1px solid #030637;
            cursor: pointer;
        }
        form .button input:hover {
            background: #030637;
        }
        .wrapper form .signup-link {
            text-align: center;
            margin-top: 45px;
            font-size: 17px;
        }
        .wrapper form .signup-link a {
            color: #16a085;
            text-decoration: none;
        }
        form .signup-link a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="title"><span>Login Account</span></div>
        <form action="check.php" method="POST">
            <div class="row">
                <i class="glyphicon glyphicon-user"></i>
                <input type="text" name="username" placeholder="Username" required />
            </div>
            <div class="row">
                <i class="glyphicon glyphicon-lock"></i>
                <input type="password" name="password" placeholder="Password" required />
            </div>
            <div class="pass"><a href="#">Forgot password?</a></div>
            <div class="row button">
                <input type="submit" value="Login" />
            </div>
            <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>
            <?php if (isset($_GET['error'])): ?>
                <p class="error">Username atau password salah</p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
