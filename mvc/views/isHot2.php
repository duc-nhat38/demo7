<a href="">
    <h3>Sản phẩm Hot >></h3>
</a><br>
<div class="container_product">
    <?php for ($i = 0; $i < count($productHots); $i += 4) : ?>

        <div class="productHots container_product_small">
            <?php for ($j = $i; $j < ($i + 4); $j++) : ?>
                <div class="product_small">
                    <img src="public/images/hot2.gif" alt="hot" id="iconNew">

                    <a href="/productInfo?id=<?= $productHots[$j]["product_ID"] ?>" title="<?= $productHots[$j]["cpu"] ?>">

                        <img src="<?= $productHots[$j]["imageName"] ?>" alt="" class="imageProduct">
                        <p><b><?= $productHots[$j]["productName"] ?></b></p>
                        <?php if ($productHots[$j]["discount"] != 0) : ?>
                            <p><del> <?= "Giá : " . number_format($productHots[$j]["price"]) . " đ" ?></del></p>
                            <p style="color: red;"><b><?= "Giá sốc : " . number_format($productHots[$j]["price"] - ($productHots[$j]["price"] * $productHots[$j]["discount"] / 100)) . " đ" ?></b></p>
                        <?php endif; ?>
                        <?php if ($productHots[$j]["discount"] == 0) : ?>
                            <p><?= "Giá : " . number_format($productHots[$j]["price"]) . " đ" ?></p>
                        <?php endif; ?>
                    </a>
                    <div class="cart_pay">
                        <form action="/addCart" method="get">
                            <div class="quantity">
                                <label for="quantity"></label>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="100">
                                <input type="hidden" name="id" value="<?= $productSales[$j]["product_ID"] ?>">
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
    <button class="productPrev" onclick="productHotPrev()"><i class="fas fa-angle-double-left"></i></button>
    <button class="productNext" onclick="productHotNext()"><i class="fas fa-angle-double-right"></i></button>
</div>