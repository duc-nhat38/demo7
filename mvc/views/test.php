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
                    <input type="submit" value="add" name="submit">
                    <input type="submit" value="pay" name="submit">
                    </div>
                </form>
            </div>