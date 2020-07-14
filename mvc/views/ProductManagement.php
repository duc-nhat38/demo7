<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
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
        <div class="container_manager_right">
            <table id="ProductManagement">
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th></th>
                </tr>
                <?php foreach($product as $key => $value): ?>
                    <tr>
                    <td><?= $key ?></td>
                    <td><img src="<?= $value["imageName"] ?>" alt=""></td>
                    <td><?= $value["productName"] ?></td>
                    <td><?= number_format($value["price"]) ?></td>
                    <td><?= $value["count"] ?></td>
                    <td>
                                <a href="">Sửa</a>
                                <a href="">Xóa</a>
                            </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="" id="addUser">Thêm</a>
        </div>
</body>

</html>