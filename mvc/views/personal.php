<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang cá nhân <?= $a ?></title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php" ?>
    
    <div class="body_personal">
        <div class="personal">
            <img src="<?= $_SESSION["customerDetail"]["imageName"] ?? "../public/images/avatar.jpg" ?>" alt="">
            <p><b><?= $_SESSION["customer"]["userName"] ?></b></p>
            <a href="">Đổi mật khẩu</a>
        </div>
        <div class="info">
            <div class="">
            <form action="/updateInfo" method="get">
                <table>
                   
                    <tr>
                        <td class="label"><label for="fullName">Họ và tên : </label></td>
                        <td><input type="text" id="fullName" name="fullName" value="<?=$_SESSION["customerDetail"]["fullName"]??""?>" placeholder="Họ và tên" required></td>
                    </tr>
                    
                    <tr>
                        <td class="label"><label for="phone">Số điện thoại : </label></td>
                        <td><input type="tel" id="phone" name="phone" value="<?= $_SESSION["customerDetail"]["phone"] ?? "" ?>" placeholder="Số điện thoại" pattern="[0][0-9]{9}" required></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="email">Email : </label></td>
                        <td><input type="email" id="email" name="email" value="<?= $_SESSION["customerDetail"]["email"] ?? "" ?>" placeholder="email" ></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="address">Địa chỉ :</label></td>
                        <td><input type="text" id="address" name="address" value="<?= $_SESSION["customerDetail"]["address"] ?? "" ?>" placeholder="address" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Cập nhật" id="sub"></td>
                    </tr>
                </table>
            </form>
            <div class="delivery">
               <button onclick="delivery()">Đang giao hàng</button>
               <?php if(isset($productDelivery)): ?>
               <div class="product_delivery">
                   <?php for($i = 0; $i < count($productDelivery); $i++): ?>
                    <div class="">
                        
                    </div>
                   <?php endfor; ?>
               </div>
               <?php endif; ?>
           </div>
           <div class="bought">
               <button onclick="bought()">Đã mua</button>
               <div class="product_bought"></div>
           </div>
        </div>
        </div>
           
    </div>

    <div class="footer">
        <?php include "footer.php" ?>
    </div>
</body>

</html>