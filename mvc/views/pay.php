<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
 
    <?php include "header.php"?>
    <div class="body_pay">
        <p><b>Thông tin đơn hàng của bạn.</b></p>
        <hr>
        <div class="shipping_address">
            <p><i class="fas fa-map-marker-alt"></i><b> Địa chỉ nhận hàng :</b></p>
            <p><?= $_SESSION["customerDetail"]["fullName"] ?></p>
            <p><?= $_SESSION["customerDetail"]["phone"] ?></p>
            <p><?= $_SESSION["customerDetail"]["email"] ?></p>
            <p><?= $_SESSION["customerDetail"]["address"] ?></p>
        </div>
        <div class="infoProduct">
            <table>
            <?php $sumPrice = 0 ?>
                <?php for($i = 0; $i < count($InfoBill); $i++) : ?>
                    <tr>
                        <td rowspan="2"><img src="<?= $InfoBill[$i]["imageName"] ?>" alt=""></td>
                        <td colspan="2"><b><?= $InfoBill[$i]["productName"] ?></b></td>
                    </tr>
                    <tr>
                        <td><b><?= number_format($InfoBill[$i]["price"])." đ" ?></b></td>
                        <td><?="x". $InfoBill[$i]["count"] ?></td>
                    </tr>
                    <?php $sumPrice += $InfoBill[$i]['sumPrice'] ?>
                <?php endfor; ?>
            </table>
            <p><b>Hình thức thanh toán :</b> Ship COD</p>
            <p><b>Tin nhắn : </b><?= $InfoBill[0]["note"]?? "" ?></p>
            <p><b>Thời gian nhận hàng muộn nhất : </b><?= date("d-m-Y", strtotime(date("d-m-Y")." +5 days")) ?></p>
            <p><b>Phí vận chuyển : </b> 30,000 đ</p>           
            <p><b>Tổng tiền : </b><?=number_format($sumPrice+30000) ." đ"?></p>
            <button><a href="/cart">Đồng ý</a></button>
        </div>
    </div>
    <div class="footer">
        <?= include "footer.php" ?>
    </div>
</body>

</html>