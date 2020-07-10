
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop store</title>
    <link rel="stylesheet" href="public/css/style_desktop.css">
    <script src="https://kit.fontawesome.com/284c8b8952.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
    <div class="header">
    <?php include "header.php" ?>
    <div class="container_image">
                <?php include "banner.php" ?>
            </div>
    </div>
    <div class="content">
        <div class="is_Product Sale">
        <?php include "isSale.php" ?>
        </div>
        <hr>
        <div class="is_Product New">
        <?php include "isNew.php" ?>
        </div>
        <hr>
        <div class="is_Product Hot">
            <?php include "isHot.php" ?>
        </div>
        
    </div>
    <div class="footer">
    <?php include "footer.php" ?>
    </div>
</div>
<script src="public/javascript.js"></script>
</body>

</html>