<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header_dashboard">
        <img src="public/images/LOGO.png" alt="">
    </div>
    <div class="container_dashboard">
        <div class="container_dashboard_left">
            <?php include "headerAdmin.php" ?>
        </div>
        <div class="container_dashboard_right">
                <div class="statistical">
                    <p>Số lượng người dùng : </p>
                    <div class="chart">
                    <img src="public/images/graphic.png" alt="">
                    <span><?= $countUser ?> USER</span>
                    </div>
                </div>
                <div class="statistical">
                    <p>Số loại sản phẩm kinh doanh : </p>
                    <div class="chart">
                    <img src="public/images/graphic2.png" alt="">
                    <span><?= $countProduct ?> Loại</span>
                        
                    </div>
                </div>
                <div class="statistical">
                    <p>Số sản phẩm kinh doanh còn trong kho : </p>
                    <div class="chart">
                    <img src="public/images/graphic2.png" alt="">
                    <span><?= $sumProduct ?> Sản phẩm</span>
                        
                    </div>
                </div>

                <div class="statistical">
                    <p>Số lượng sản phẩm bán được trong tháng : </p>
                    <div class="chart">
                    <img src="public/images/graphic.png" alt="">
                    <span> <?= $countPayMonth ?> Sản phẩm</span>
                       
                    </div>
                </div>
                <div class="statistical">
                    <p>Số lượng sản phẩm bán được trong năm : </p>
                    <div class="chart">
                    <img src="public/images/graphic.png" alt="">
                    <span><?= $countPayYear ?> Sản phẩm</span>
                        
                    </div>
                </div>
            </div>
        </div>
</body>

</html>