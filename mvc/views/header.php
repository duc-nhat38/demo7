
       <div class="header_small">
            <div class="logo">
                <a href="/" title="Laptop store"><img src="public/images/LOGO.png" alt="image logo"></a>
            </div>
            <div class="search_login">
                <div class="search">
                    <form action="/search" method="get">
                        <input type="text" name="input" placeholder="Bạn muốn tìm gì?">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="login">
                    <a href="/cart" title="Giỏ hàng" id="num"><i class="fas fa-shopping-cart"></i>
                    <?php if(isset($_SESSION['customer'])) :?>
                    <div class="number"><?= $_SESSION["countCart"] ?></div>
                    <?php endif; ?>
                </a>
                    <a href="#like" title="Sản phẩm yêu thích"><i class="fas fa-heart"></i></a>                   
                    
                    <?php if(!isset($_SESSION['customer'])) :?>
                        <?= '<a href="/formRegis" title="Xem chùa"><i class="fas fa-user-secret"></i></a>' ?>
                        <?= '<a href="/formLogin" title="Đăng nhập"><i class="fas fa-sign-in-alt"></i></a>' ?>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['customer'])) :?>
                        <?= "<a href='/personal' title='".$_SESSION['customer']['userName']."'><i class='fas fa-user-circle'></i></a>" ?>
                        <?= "<a href='/logout' title='Đăng xuất'><i class='fas fa-sign-out-alt'></i></a>" ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="menu" id="myMenu">
            <ul>
                <li>
                    <a href="/" title="Tất cả"><i class="fas fa-laptop-house"></i></a>
                </li>
                <li>
                    <a href="" title="Laptop"><i class="fas fa-laptop"></i></a>
                    <ul>
                        <li>
                            <a href="/getProductBrand?name=dell"><span>DELL</span></a>
                        </li>
                        <li>
                            <a href="/getProductBrand?name=hp"><span>HP</span></a>
                        </li>
                        <li>
                            <a href="/getProductBrand?name=lenovo"><span>LENOVO</span></a>
                        </li>
                        <li>
                            <a href="/getProductBrand?name=macbook"><span>MAC BOOK</span></a>
                        </li>
                        <li>
                            <a href="/getProductBrand?name=asus"><span>ASUS</span></a>
                        </li>
                        <li>
                            <a href="/getProductBrand?name=acer"><span>ACER</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/isHot" title="Hot"><i class="fab fa-hotjar"></i></a>
                </li>
                <li>
                    <a href="/isNew" title="New">
                        <div id="new"><b>NEW</b></div>
                    </a>
                </li>
                <li>
                    <a href="" title="Bàn phím"><i class="fas fa-keyboard"></i></a>
                    <ul>
                        <li>
                            <a href="/getProductBrand?name=corsair"><span>CORSAIR</span></a>
                        </li>
                        <li>
                            <a href="/getProductBrand?name=microsoft"><span>MICROSOFT</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="" title="Chuột"><i class="fas fa-mouse"></i></a>
                    <ul>
                        <li>
                            <a href="/getProductBrand?name=logitech"><span>LOGITECH</span></a>
                        </li>
                        <li>
                            <a href="/getProductBrand?name=fuhlen"><span>FUHLEN</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="" title="Sửa chữa"><i class="fas fa-laptop-medical"></i></a>
                </li>
            </ul>
        </div>