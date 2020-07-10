<a href="">
    <h3>Sản phẩm đang Sale >></h3>
</a><br>
<div class="product_events" id="product" >
    <?php for ($i = 0; $i < count($productSales); $i++) : ?>
        <div class="product_event">
            <img src="public/images/sale2.png" alt="" id="iconNew">
            <a href="#" title="<?= $productSales[$i]["cpu"] ?>">

                <img src="<?= $productSales[$i]["imageName"] ?>" alt="" class="imageProduct">
                <p><?= $productSales[$i]["productName"] ?></p>
                <?php if ($productSales[$i]["discount"] != 0) : ?>
                    <p><del> <?= "Giá : " . number_format($productSales[$i]["price"]) . " đ" ?></del></p>
                    <p style="color: red;"><?= "Giá sốc : " . number_format($productSales[$i]["price"] - ($productSales[$i]["price"] * $productSales[$i]["discount"] / 100)) . " đ" ?></p>
                <?php endif; ?>
                <?php if ($productSales[$i]["discount"] == 0) : ?>
                    <p><?= "Giá : " . number_format($productSales[$i]["price"]) . " đ" ?></p>
                <?php endif; ?>
            </a>
            <div class="cart_pay">
                <a href="/addCart?id=<?= $productSales[$i]['product_ID'] ?>"><i class="fas fa-shopping-cart"></i></a>
                <span>|</span>
                <a href="/#?id=<?= $productSales[$i]['product_ID'] ?>">Mua ngay</a>
            </div>
        </div>
    <?php endfor; ?>
</div>