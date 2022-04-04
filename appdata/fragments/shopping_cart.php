<?php
class ShoppingCart {
    error_reporting (E_ALL ^ E_NOTICE); //prevents conflict with the cart by turning off the error message
    session_start();

    public function getBy($att, $value, $array) {
        foreach ($array as $key => $val) {
            if ($val[$att] === $value) {
                return $key;
            }
        }
        return null;
    }

    //add item to the cart
    if ($_GET["action"] == "add" && !empty($_GET["id"])) {
        addToCart($_GET["id"]);
    }
    function addToCart($productId) {
        if (!array_key_exists($productId, $_SESSION["cart"])) {
                $_SESSION["cart"][$productId]["quantity"] = 1;
        }  else {
                $_SESSION["cart"][$productId]["quantity"]++;
            }
    }

    //remove item of the cart
    if ($_GET["action"] == "remove" && !empty($_GET["id"])) {
        removeFromCart($_GET["id"]);
    }
    function removeFromCart($productId) {
        if (array_key_exists($productId, $_SESSION["cart"])) {
            if ($_SESSION["cart"][$productId]["quantity"] <= 1) {
                unset($_SESSION["cart"][$productId]);
            } else {
                $_SESSION["cart"][$productId]["quantity"]--;
            }
        }
    }

    //delete the selected item
    if ($_GET["action"] == "delete" && !empty($_GET["id"])) {
        deleteFromCart($_GET["id"]);
    }
    function deleteFromCart($productId) {
        unset($_SESSION["cart"][$productId]);
    }

    $totalPrice = 0;
    //forcycle - print selected items
    foreach ($_SESSION["cart"] as $key => $value) {
        $item = $database[getBy("id", $key, $database)];
        $totalPrice = $totalPrice + ($value["quantity"] * $item["price"]);
        echo
            '<div class="cart-container">
                <div class="cart-img">'.$item["img"].'</div>
                <div class="cart-name">'.$item["name"].'</div>
                <div class="cart-price">'.$item["price"].' Kč za 1 ks</div>
                <div class="cart-quantity"> '.($value["quantity"]).' ks</div>
                <div class="items-total-price">'.($value["quantity"]*$item["price"]).' Kč celekem</div>
                <a href="?action=add&id='.$item["id"].'" class="cart-btn">+</a>
                <a href="?action=remove&id='.$item["id"].'" class="cart-btn">-</a>
                <a href="?action=delete&id='.$item["id"].'" class="cart-btn">Odebrat</a>
            </div>';
    }
    echo "<div class='cart-total-price'>Celková cena: $totalPrice Kč</div>" //print total price
}
?>
