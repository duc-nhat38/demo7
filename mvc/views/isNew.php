
<a href="">
    <h3>Sản phẩm mới >></h3>
</a><br>
<div class="product_events">
    <?php for ($i = 0; $i < count($productNews); $i++) : ?>
        <div class="product_event">
            <img src="public/images/new.png" alt="" id="iconNew">
            <a href="#" title="<?= $productNews[$i]["cpu"] ?>">

                <img src="<?= $productNews[$i]["imageName"] ?>" alt="" class="imageProduct">
                <p><?= $productNews[$i]["productName"] ?></p>
                <?php if ($productNews[$i]["discount"] != 0) : ?>
                    <p><del> <?= "Giá : " . number_format($productNews[$i]["price"]) . " đ" ?></del></p>
                    <p style="color: red;"><?= "Giá sốc : " . number_format($productNews[$i]["price"] - ($productNews[$i]["price"] * $productNews[$i]["discount"] / 100)) . " đ" ?></p>
                <?php endif; ?>
                <?php if ($productNews[$i]["discount"] == 0) : ?>
                    <p><?= "Giá : " . number_format($productNews[$i]["price"]) . " đ" ?></p>
                <?php endif; ?>
            </a>
            <div class="cart_pay">
                <a href="/addCart?id=<?= $productNews[$i]['product_ID'] ?>"><i class="fas fa-shopping-cart"></i></a>
                <span>|</span>
                <a href="/#?id=<?= $productNews[$i]['product_ID'] ?>">Mua ngay</a>
            </div>
        </div>
    <?php endfor; ?>
</div>