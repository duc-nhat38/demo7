<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>
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
            
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Họ và tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Ảnh</th>
                        <th></th>
                    </tr>
                    <?php foreach($listUser as $key=>$value): ?>
                        <tr>
                            <td><?= $key ?></td>
                            <td><?= $value["userName"] ?? "Chưa có" ?></td>
                            <td><?= $value["password"] ?? "Chưa có" ?></td>
                            <td><?= $value["fullName"] ?? "Chưa có" ?></td>
                            <td><?= $value["address"] ?? "Chưa có" ?></td>
                            <td><?= $value["email"] ?? "Chưa có" ?></td>
                            <td><?= $value["phone"] ?? "Chưa có" ?></td>
                            <td><?= $value["image"] ?? "Chưa có" ?></td>
                            <td>
                                <a href="">Sửa</a>
                                <a href="">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a href="" id="addUser">Thêm</a>
        </div>
    </div>
</body>

</html>