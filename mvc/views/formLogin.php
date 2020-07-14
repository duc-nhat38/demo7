<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include "header.php" ?>
    <div class="form_login">       
            <h3>Đăng nhập ngay để mua sắm thôi nào !</h3>
        <div class="form_right">
            <form action="checkLogin" method="post">
                <p><?= $note??"" ?></p>
                <label for="username"></label>
                <input type="text" id="username" name="username" class="input"  placeholder="Username : " minlength="6" required><br>
                <p><?= $note2??"" ?></p>
                <label for="password"></label>
                <input type="password" id="password" name="password" class="input" placeholder="Password : " minlength="6" required><br>
                <input type="submit" value="Đăng nhập" id="submit" class="input"><br>
                <span>Bạn chưa có tài khoản?</span><a href="/formRegis"><b>Đăng ký</b></a>
            </form>
        </div>
    </div>
    <div class="footer">
    <?php include "footer.php" ?>
    </div>
    <script src="public/javascript.js"></script>
</body>

</html>