<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php" ?>
    <div class="body_search">
        <p><?= $note ?? "" ?></p>
        <?php if (empty($productSearch)) : ?>
            <p>Không tìm thấy sản phẩm. Hãy nhập lại tên khác!</p>
        <?php endif; ?>
        <div class="product_events">
            <?php if (!empty($productSearch)) : ?>
                <?php for ($i = 0; $i < count($productSearch); $i++) : ?>
                    <div class="product_event">
                        <a href="#" title="<?= $productSearch[$i]["cpu"] ?>">

                            <img src="<?= $productSearch[$i]["imageName"] ?>" alt="" class="imageProduct">
                            <p><?= $productSearch[$i]["productName"] ?></p>
                            <?php if ($productSearch[$i]["discount"] != 0) : ?>
                                <p><del> <?= "Giá : " . number_format($productSearch[$i]["price"]) . " đ" ?></del></p>
                                <p style="color: red;"><?= "Giá sốc : " . number_format($productSearch[$i]["price"] - ($productSearch[$i]["price"] * $productSearch[$i]["discount"] / 100)) . " đ" ?></p>
                            <?php endif; ?>
                            <?php if ($productSearch[$i]["discount"] == 0) : ?>
                                <p><?= "Giá : " . number_format($productSearch[$i]["price"]) . " đ" ?></p>
                            <?php endif; ?>
                        </a>
                        <div class="cart_pay">
                            <a href="/addCart?id=<?= $productSearch[$i]['product_ID'] ?>"><i class="fas fa-shopping-cart"></i></a>
                            <span>|</span>
                            <a href="/addCart?id=<?= $productSearch[$i]['product_ID'] ?>">Mua ngay</a>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer">
        <?php include "footer.php" ?>
    </div>
    <script src="public/javascript.js"></script>
</body>

</html>