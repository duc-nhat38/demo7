<a href="">
    <h3>Sản phẩm Hot >></h3>
</a><br>
<div class="product_events">
    <?php for ($i = 0; $i < count($productHots); $i++) : ?>
        <div class="product_event">
            <img src="public/images/hot2.gif" alt="hot" id="iconNew">
            <!-- <i class="fab fa-hotjar" id="iconHot"></i> -->
            <a href="#" title="<?= $productHots[$i]["cpu"] ?>">

                <img src="<?= $productHots[$i]["imageName"] ?>" alt="" class="imageProduct">
                <p><?= $productHots[$i]["productName"] ?></p>
                <?php if ($productHots[$i]["discount"] != 0) : ?>
                    <p><del> <?= "Giá : " . number_format($productHots[$i]["price"]) . " đ" ?></del></p>
                    <p style="color: red;"><?= "Giá sốc : " . number_format($productHots[$i]["price"] - ($productHots[$i]["price"] * $productHots[$i]["discount"] / 100)) . " đ" ?></p>
                <?php endif; ?>
                <?php if ($productHots[$i]["discount"] == 0) : ?>
                    <p><?= "Giá : " . number_format($productHots[$i]["price"]) . " đ" ?></p>
                <?php endif; ?>
            </a>
            <div class="cart_pay">
                <a href="/addCart?id=<?= $productHots[$i]['product_ID'] ?>"><i class="fas fa-shopping-cart"></i></a>
                <span>|</span>
                <a href="/#?id=<?= $productHots[$i]['product_ID'] ?>">Mua ngay</a>
            </div>
        </div>

    <?php endfor; ?>
</div>