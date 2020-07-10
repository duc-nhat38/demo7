<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php" ?>
    <div class="body_cart">
        <?php for ($i = 0; $i < count($productCart); $i++) : ?>
            <div class="product_cart">
                <div class="cart_left">
                    <img src="<?= $productCart[$i]["imageName"] ?>" alt="">
                </div>
                <div class="cart_right">
                    <p><?= $productCart[$i]["productName"] ?></p>
                    <div class="quantity">
                        <form action="/addCart" method="get">
                        <label for="quantity">Số lượng : </label>
                            <input type="number" name="quantity" id="quantity" value="<?=$productCart[$i]['count']?>" min="1" max="100">
                            <input type="hidden" name="id" value="<?= $productCart[$i]["product_ID"] ?>">
                            <button type="submit" id="increase">Thêm</button>
                        </form>
                    </div>
                    <?php if($productCart[$i]["discount"] == 0): ?>
                    <p><?= "Tổng tiền : ".number_format($productCart[$i]["price"])." đ" ?></p>
                    <?php endif;?>
                    <?php if($productCart[$i]["discount"] != 0): ?>
                    <p><del><?= "Tổng tiền : ".number_format($productCart[$i]["price"])."đ" ?></del></p>
                    <p style="color: red;"> <?= "Khuyến mãi : ".number_format($productCart[$i]["price"]-($productCart[$i]["price"] * $productCart[$i]["discount"] / 100))." đ" ?></p>
                    <?php endif;?>
                    <p><?= "Ngày thêm mới nhất : " . date("d-m-Y", strtotime($productCart[$i]["date"]) ) ?></p>   
                    
                </div>
            </div>
        <?php endfor; ?>

    </div>
    <div class="footer">
        <?php include "footer.php" ?>
    </div>
    <script src="public/javascript.js"></script>
</body>

</html>