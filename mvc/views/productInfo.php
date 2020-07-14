<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ProductInfo[0]["productName"] ?></title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php" ?>

    <div class="body_productInfo">
    
        <div class="body_top">
            
            <div class="image_productInfo">
                <img src="<?= $ProductInfo[0]["imageName"] ?>" alt="">
            </div>
            <div class="info_left">
            <p><b><?= $ProductInfo[0]["productName"] ?></b></p>
                <?php if ($ProductInfo[0]["discount"] != 0) : ?>
                    <p><del><?= number_format($ProductInfo[0]["price"]) . " đ" ?></del></p>
                    <p style="color: red;"><b><?= number_format($ProductInfo[0]["price"] - ($ProductInfo[0]["price"] * $ProductInfo[0]["discount"] / 100)) . " đ" ?></b></p>
                <?php endif; ?>
                <?php if ($ProductInfo[0]["discount"] == 0) : ?>
                    <p><b><?= number_format($ProductInfo[0]["price"]) . " đ" ?></b></p>
                <?php endif; ?>
                <form action="/addCart" method="get">
                    <div class="quantity">
                        <label for="quantity"></label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="100">
                        <input type="hidden" name="id" value="<?= $ProductInfo[0]["product_ID"] ?>">
                    </div>
                    <div class="submit">
                        <button type="submit" value="add" name="submit"><i class="fas fa-shopping-cart"></i></button>
                        <button type="submit" value="paynow" name="submit">Mua ngay</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="body_bottom">
            <p><?= $ProductInfo[0]["description"] ?></p>
            <table>
                <tr>
                    <th>CPU</th>
                    <td><?= $ProductInfo[0]["cpu"] ?></td>
                </tr>
                <tr>
                    <th>Ram</th>
                    <td><?= $ProductInfo[0]["ram"] ?></td>
                </tr>
                <tr>
                    <th>Ổ cứng</th>
                    <td><?= $ProductInfo[0]["hardDrive"] ?></td>
                </tr>
                <tr>
                    <th>Màn hình</th>
                    <td><?= $ProductInfo[0]["screen"] ?></td>
                </tr>
                <tr>
                    <th>Card đồ họa</th>
                    <td><?= $ProductInfo[0]["screenCard"] ?></td>
                </tr>
                <tr>
                    <th>Kết nối</th>
                    <td><?= $ProductInfo[0]["connector"] ?></td>
                </tr>
                <tr>
                    <th>Hệ điều hành</th>
                    <td><?= $ProductInfo[0]["operatingSystem"] ?></td>
                </tr>
                <tr>
                    <th>Thiết kế</th>
                    <td><?= $ProductInfo[0]["design"] ?></td>
                </tr>
                <tr>
                    <th>Kích thước</th>
                    <td><?= $ProductInfo[0]["size"] ?></td>
                </tr>
                <tr>
                    <th>Năm sản xuất</th>
                    <td><?= $ProductInfo[0]["yearManufacture"] ?></td>
                </tr>
            </table>
        </div>

        <div class="ProductBrand">
            <p>Sản phẩm cùng loại</p>
            <?php foreach ($ProductBrand as $value) : ?>
                <div class="product_small">
                    <a href="/productInfo?id=<?= $value["product_ID"] ?>" title="<?= $value["cpu"] ?>">

                        <img src="<?= $value["imageName"] ?>" alt="" class="imageProduct">
                        <p><b><?= $value["productName"] ?></b></p>
                        <?php if ($value["discount"] != 0) : ?>
                            <p><del> <?= "Giá : " . number_format($value["price"]) . " đ" ?></del></p>
                            <p style="color: red;"><b><?= "Giá sốc : " . number_format($value["price"] - ($value["price"] * $value["discount"] / 100)) . " đ" ?></b></p>
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