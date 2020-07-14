<a href="">
    <h3>Sản phẩm mới >></h3>
</a><br>
<div class="container_product">
    <?php for ($i = 0; $i < count($productHots); $i += 4) : ?>

        <div class="productNews container_product_small">
            <?php for ($j = $i; $j < ($i + 4); $j++) : ?>
                <div class="product_small">
                    <img src="public/images/new.png" alt="" id="iconNew">
                    <a href="/productInfo?id=<?= $productNews[$j]["product_ID"] ?>" title="<?= $productNews[$j]["cpu"] ?>">

                        <img src="<?= $productNews[$j]["imageName"] ?>" alt="" class="imageProduct">
                        <p><b><?= $productNews[$j]["productName"] ?></b></p>
                        <?php if ($productNews[$j]["discount"] != 0) : ?>
                            <p><del> <?= "Giá : " . number_format($productNews[$j]["price"]) . " đ" ?></del></p>
                            <p style="color: red;"><b><?= "Giá sốc : " . number_format($productNews[$j]["price"] - ($productNews[$j]["price"] * $productNews[$j]["discount"] / 100)) . " đ" ?></b></p>
                        <?php endif; ?>
                        <?php if ($productNews[$j]["discount"] == 0) : ?>
                            <p><?= "Giá : " . number_format($productNews[$j]["price"]) . " đ" ?></p>
                        <?php endif; ?>
                    </a>
                    <div class="cart_pay">
                        <form action="/addCart" method="get">
                            <div class="quantity">
                                <label for="quantity"></label>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="100">
                                <input type="hidden" name="id" value="<?= $productNews[$j]["product_ID"] ?>">
                            </div>
                            <div class="submit">
                                <button type="submit" value="add" name="submit"><i class="fas fa-shopping-cart"></i></button>
                                <button type="submit" value="paynow" name="submit">Mua ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    <?php endfor; ?>
    <button class="productPrev" onclick="productNewPrev()"><i class="fas fa-angle-double-left"></i></button>
    <button class="productNext" onclick="productNewNext()"><i class="fas fa-angle-double-right"></i></button>
</div>