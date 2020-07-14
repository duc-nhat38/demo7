<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php" ?>
    <div class="body_product">
        <a href="">
            <h3>Sản phẩm Hot >></h3>
        </a><br>
        <div class="product_events">
            <?php foreach ($productHots as $value) : ?>
                <div class="product_small">
                    <img src="public/images/hot2.gif" alt="hot" id="iconNew">
                    <a href="/productInfo?id=<?= $value["product_ID"] ?>" title="<?= $value["cpu"] ?>">

                        <img src="<?= $value["imageName"] ?>" alt="" class="imageProduct">
                        <p><?= $value["productName"] ?></p>
                        <?php if ($value["discount"] != 0) : ?>
                            <p><del> <?= "Giá : " . number_format($value["price"]) . " đ" ?></del></p>
                            <p style="color: red;"><?= "Giá sốc : " . number_format($value["price"] - ($value["price"] * $value["discount"] / 100)) . " đ" ?></p>
                        <?php endif; ?>
                        <?php if ($value["discount"] == 0) : ?>
                            <p><?= "Giá : " . number_format($value["price"]) . " đ" ?></p>
                        <?php endif; ?>
                    </a>
                    <div class="cart_pay">
                        <form action="/addCart" method="get">
                            <div class="quantity">
                                <label for="quantity"></label>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="100">
                                <input type="hidden" name="id" value="<?= $value["product_ID"] ?>">
                            </div>
                            <div class="submit">
                                <button type="submit" value="add" name="submit"><i class="fas fa-shopping-cart"></i></button>
                                <button type="submit" value="paynow" name="submit">Mua ngay</button>
                            </div>
                        </form>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <div class="footer">
<?php include "footer.php" ?>
    </div>
</body>

</html>