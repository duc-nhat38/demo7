<div class="slideshow_container">

    <?php $len = count($arrayImage) ?>

    <?php if ($len <= 8) : ?>
        <?php for ($i = 0; $i < $len; $i++) : ?>
            <div class="mySlides fade">
                <a href="#" title="Xem ngay"><img src="<?= $arrayImage[$i]["imageName"] ?>" alt=""></a>
            </div>
        <?php endfor; ?>
    <?php endif; ?>
    <?php if ($len > 8) : ?>
        <?php for ($i = $len - 9; $i < $len; $i++) : ?>
            <div class="mySlides fade">
                <a href="#" title="Xem ngay"><img src="<?= $arrayImage[$i]["imageName"] ?>" alt=""></a>
            </div>
        <?php endfor; ?>
    <?php endif; ?>
    <button class='prev' onclick="prev()"><i class="fas fa-angle-double-left"></i></button>
    <button class="next" onclick="next()"><i class="fas fa-angle-double-right"></i></button>
    
</div>
<div style="text-align:center" class="slideDots">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
    <span class="dot" onclick="currentSlide(6)"></span>
    <span class="dot" onclick="currentSlide(7)"></span>
    <span class="dot" onclick="currentSlide(8)"></span>
</div>