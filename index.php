<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="appdata/styles/style.scss">
    <title>🛒MAESC</title>
</head>
<body>
    <header>
        <div class="header-text">My Awesome Emoji Shopping Cart</div>
    </header>

    <!--container start-->
    <div class="container">
        <h2>🧸 Naše úžasné produkty</h2>
            <!--items of database-->
            <?php include_once("appdata/fragments/database.php") ?>
        <h2>🛒 Váš nákupní košík</h2>
            <!--shopping cart-->
            <?php include_once("appdata/fragments/shopping_cart.php") ?>
        <footer>
            &copy David Anderle | MIT License
        </footer>
    </div>
    <!--container end-->
</body>
</html>