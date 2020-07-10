<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí tài khoản</title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include "header.php" ?>
    <div class="form_login">       
            <h3>Đăng kí ngay để mua sắm thôi nào !</h3>
        <div class="form_right">
            <form action="checkRegis" method="post">
                <p><?= $note??"" ?></p>
                <label for="username"></label>
                <input type="text" id="username" name="username" class="input"  placeholder="Username : "><br>
                <p><?= $note2??"" ?></p>
                <label for="password"></label>
                <input type="password" id="password" name="password" class="input" placeholder="Password : " minlength="6"><br>
                <label for="password2"></label>
                <input type="password" id="password2" name="password2" class="input" placeholder="Retype Password : " minlength="6"><br>
                <input type="submit" value="Đăng ký" id="submit" class="input"><br>
                <span>Bạn đã có tài khoản?</span><a href="/formLogin"><b>Đăng nhập</b></a>
            </form>
        </div>
    </div>
    <div class="footer">
    <?php include "footer.php" ?>
    </div>
    <script src="public/javascript.js"></script>
</body>

</html>