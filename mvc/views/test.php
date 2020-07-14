<div class="cart_pay">
                <a href="/addCart?id=<?= $productSales[$i]['product_ID'] ?>"><i class="fas fa-shopping-cart"></i></a>
                <span>|</span>
                <a href="/#?id=<?= $productSales[$i]['product_ID'] ?>">Mua ngay</a>
            </div>




            <div class="cart_pay" >
                <form action="/addCart" method="get">
                    <div class="quantity">
                    <label for="quantity"></label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="100">
                    <input type="hidden" name="id" value="<?= $productSales[$i]["product_ID"] ?>">
                    </div>
                    <div class="submit">
                        <button type="submit" value="add" name="submit"><i class="fas fa-shopping-cart"></i></button>
                        <button type="submit" value="pay" name="submit">Mua ngay</button>
                    </div>
                </form>
            </div>



            <div class="cart_pay">
                <a href="/addCart?id=<?= $productSales[$i]['product_ID'] ?>"><i class="fas fa-shopping-cart"></i></a>
                <span>|</span>
                <a href="/#?id=<?= $productSales[$i]['product_ID'] ?>">Mua ngay</a>
            </div>




            <div class="product_cart">
                <div class="cart_left">
                    <img src="<?= $productCart[$i]["imageName"] ?>" alt="">
                </div>
                <div class="cart_right">
                    <p><?= $productCart[$i]["productName"] ?></p>
                    <div class="quantity">
                        
                    </div>
                    <?php if($productCart[$i]["discount"] == 0): ?>
                    <p><?= "Tổng tiền : ".number_format($productCart[$i]["price"])." đ" ?></p>
                    <?php endif;?>
                    <?php if($productCart[$i]["discount"] != 0): ?>
                    <p><del><?= "Tổng tiền : ".number_format($productCart[$i]["price"])."đ" ?></del></p>
                    <p style="color: red;"> <?= "Khuyến mãi : ".number_format($productCart[$i]["sumPrice"]-($productCart[$i]["sumPrice"] * $productCart[$i]["discount"] / 100))." đ" ?></p>
                    <?php endif;?>
                    <p><?= "Ngày thêm mới nhất : " . date("d-m-Y", strtotime($productCart[$i]["date"]) ) ?></p>   
                    
                </div>
            </div>