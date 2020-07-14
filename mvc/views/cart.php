<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php" ?>
    <div class="body_cart">
        <div class="body_cart_left">
            <table>
                <tr>
                    <th id="stt">STT</th>
                    <th id="image">Ảnh</th>
                    <th id="name">Tên Sản Phẩm</th>
                    <th id="count">Số lượng</th>
                    <th class="price2">Đơn giá</th>
                    <th>SALE</th>
                    <th class="price2">Thành tiền</th>
                    <?php if ($_SESSION['countCart'] != 0) : ?>
                        <th id="del"><a href="/delCart?id=&cart_ID=<?= $productCart[0]['cart_ID'] ?>&count=<?= $_SESSION['countCart'] ?>" title="Xóa tất cả"><i class="fas fa-minus-circle"></i></a></th>
                    <?php endif; ?>
                </tr>
                <?php if ($_SESSION['countCart'] != 0) : ?>
                    <?php $total = 0 ?>
                    <?php for ($i = 0; $i < count($productCart); $i++) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="<?= $productCart[$i]["imageName"] ?>" alt=""></td>
                            <td><?= $productCart[$i]["productName"] ?></td>
                            <td>
                                <form action="/increaseQuantity" method="get">
                                    <label for="quantity"></label>
                                    <input type="number" name="quantity" id="quantity" value="<?= $productCart[$i]['count'] ?>" min="1" max="100">
                                    <input type="hidden" name="original" id="original" value="<?= $productCart[$i]['count'] ?>">
                                    <input type="hidden" name="id" value="<?= $productCart[$i]["product_ID"] ?>">
                                    <button type="submit" id="increase">Thêm</button>
                                </form>
                            </td>
                            <td><?= number_format($productCart[$i]["price"]) . " đ" ?></td>

                            <td><?= $productCart[$i]["discount"] . " %" ?></td>
                            <?php $price = $productCart[$i]["sumPrice"] - ($productCart[$i]["sumPrice"] * $productCart[$i]["discount"] / 100) ?>
                            <td><?= number_format($price) ?></td>
                            <td><a href="/delCart?id=<?= $productCart[$i]["product_ID"] ?>&cart_ID=<?= $productCart[$i]['cart_ID'] ?>&count=<?= $productCart[$i]['count'] ?>" title="Xóa"><i class="fas fa-minus-circle"></i></a></td>
                            <?php $total += $price ?>
                        </tr>
                    <?php endfor; ?>
                    <tr class="total">
                        <td colspan="2">Tổng số lượng sản phẩm :</td>
                        <td colspan="3"><?= $_SESSION["countCart"] ?></td>
                        <td colspan="3" rowspan="2" ><button onclick="myPay()" id="button">Thanh toán</button></td>
                    </tr>
                    <tr class="total">
                        <td colspan="2">Tổng tiền :</td>
                        <td colspan="3"><?= number_format($total) . " đ" ?></td>

                    </tr>
                <?php endif; ?>
                <?php if ($_SESSION['countCart'] == 0) : ?>
                    <tr>
                        <td colspan="7">Không có sản phẩm nào trong giỏ hàng</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>

        <div class="body_cart_right" id="body_cart_right">
            <form action="/addBill" method="get">
                <table>
                    <?= $_SESSION["customerDetail"]["fullName"] ?? '' ?>
                    <tr>
                        <td class="label"><label for="fullName">Họ và tên : </label></td>
                        <td><input type="text" id="fullName" name="fullName" value="<?= $_SESSION["customerDetail"]["fullName"] ?? "" ?>" placeholder="Họ và tên" required></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="phone">Số điện thoại : </label></td>
                        <td><input type="tel" id="phone" name="phone" value="<?= $_SESSION["customerDetail"]["phone"] ?? "" ?>" placeholder="Số điện thoại" pattern="[0][0-9]{9}" required></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="email">Email : </label></td>
                        <td><input type="email" id="email" name="email" value="<?= $_SESSION["customerDetail"]["email"] ?? "" ?>" placeholder="email" ></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="address">Địa chỉ :</label></td>
                        <td><input type="text" id="address" name="address" value="<?= $_SESSION["customerDetail"]["address"] ?? "" ?>" placeholder="address" required></td>
                    </tr>
                    <tr>
                        <td class="label"><label for="address">Hình thức thanh toán :</label></td>
                        <td>
                            <select name="payments" required> 
                                <option value="ship">Ship COD</option>
                                <option value="VISA">VISA / Master CARD</option>
                                <option value="installment">Trả góp</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><label for="status">Tin nhắn :</label></td>
                        <td><input type="text" id="status" name="status" placeholder="Tin nhắn" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Đặt hàng" id="sub"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="footer">
        <?php include "footer.php" ?>
    </div>
    <script src="public/javascript.js"></script>
</body>

</html>