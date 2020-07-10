

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
                    <div class="number"><?= $_SESSION["countCart"][0]['count'] ?></div>
                    <?php endif; ?>
                </a>
                    <a href="#like" title="Sản phẩm yêu thích"><i class="fas fa-heart"></i></a>                   
                    
                    <?php if(!isset($_SESSION['customer'])) :?>
                        <?= '<a href="/formRegis" title="Xem chùa"><i class="fas fa-user-secret"></i></a>' ?>
                        <?= '<a href="/formLogin" title="Đăng nhập"><i class="fas fa-sign-in-alt"></i></a>' ?>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['customer'])) :?>
                        <?= "<a href='/formLogin' title='".$_SESSION['customer']['userName']."'><i class='fas fa-user-circle'></i></a>" ?>
                        <?= "<a href='/logout' title='Đăng xuất'><i class='fas fa-sign-out-alt'></i></a>" ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="#" title="Tất cả"><i class="fas fa-laptop-house"></i></a>
                </li>
                <li>
                    <a href="" title="Laptop"><i class="fas fa-laptop"></i></a>
                    <ul>
                        <li>
                            <a href=""><span>DELL</span></a>
                        </li>
                        <li>
                            <a href=""><span>HP</span></a>
                        </li>
                        <li>
                            <a href=""><span>LENOVO</span></a>
                        </li>
                        <li>
                            <a href=""><span>MAC BOOK</span></a>
                        </li>
                        <li>
                            <a href=""><span>ASUS</span></a>
                        </li>
                        <li>
                            <a href=""><span>ACER</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="" title="Hot"><i class="fab fa-hotjar"></i></a>
                </li>
                <li>
                    <a href="" title="New">
                        <div id="new"><b>NEW</b></div>
                    </a>
                </li>
                <li>
                    <a href="" title="Bàn phím"><i class="fas fa-keyboard"></i></a>
                    <ul>
                        <li>
                            <a href=""><span>CORSAIR</span></a>
                        </li>
                        <li>
                            <a href=""><span>MICROSOFT</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="" title="Chuột"><i class="fas fa-mouse"></i></a>
                    <ul>
                        <li>
                            <a href=""><span>LOGITECH</span></a>
                        </li>
                        <li>
                            <a href=""><span>FUHLEN</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="" title="Sửa chữa"><i class="fas fa-laptop-medical"></i></a>
                </li>
            </ul>
        </div>