# My Awesome Emoji Shopping Cart
**Author:** David Anderle

- Projekt zadaný školou
- Nepoužívá sql, pouze pole v php
- Pro spuštění je potřeba soubory nahrát na váš server

## Dokumentace

### Základní struktura a výpis produktů

- Webová stránka je tvořena tzv. skládáním, index.php je doplněn dalšími soubory, které se do něj zapisují.

```
<?php include_once("appdata/fragments/file.php") ?>
```

- Každý jednotlivý file, má své styly, které jsou sjednoceny v hlavním style.scss.
 
```
@import "./file.scss";
```

- Každý nabízený produkt, je utvořen pomocí proměnné, která se nakonec zapisuje do pole.
 
```
 $hamburger = array(
    "id" => 7,
    "img" => "🍔",
    "name" => "Hamburger",
    "price" => "32",
);
$database = array($Hamburger);
```

- Produkty se vypisují pomocí foreach z pole `$database`. Pole `$databes` konvertujeme do volací proměnné `$item`. Pomocí `$item` poté voláme jednotlivé itemy a jejich atributy (`$item["name"]`, `$item["id"]` apod.) z pole `$database`.
 ```
foreach($database as $item) {
    echo 
        '<div class="items-container">
            <div class="item-img">'.$item["img"].'</div>
            <div class="item-name">'.$item["name"].'</div>
            <div class="item-price">'.$item["price"].' Kč</div>
            <a href="?action=add&id='.$item["id"].'" class="item-btn">👉 Do košíku</a>
        </div>';
}
?>
```

![screenshot_pc.png](https://github.com/Andergonan/MyAwesomeEmojiShoppingCart/blob/main/img_documentation/img_1.png)

### Nákupní košík

- Nákupní košík používá seassion. Hodnoty itemů volá funkcí getBy.

```
session_start();
    
    function getBy($att, $value, $array) {
        foreach ($array as $key => $val) {
            if ($val[$att] === $value) {
                return $key;
            }
        }
        return null;
    }

```

#### Přidávání itemů

- Přidávání itemů probía metodou `$_Get`.

```
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
```

`...["action"] == "add"` slouží jako "tlačítko" pro přidání množství.

Říká, že pokud daný item v košíku existuje, je 1.
```
if (!array_key_exists($productId, $_SESSION["cart"])) {
                $_SESSION["cart"][$productId]["quantity"] = 1;
 ```
 
 Pokud se daný item v košíku již nachází, přičte k němu "+ množství".
 ```
else {
       $_SESSION["cart"][$productId]["quantity"]++;
 }
 ```



- Odebírání itemů zaručují tyto řádky kódu.

```
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
```

- Maznání itemů zaručují tyto řádky kódu.

```
    //delete the selected item
    if ($_GET["action"] == "delete" && !empty($_GET["id"])) {
        deleteFromCart($_GET["id"]);
    }
    function deleteFromCart($productId) {
        unset($_SESSION["cart"][$productId]);
    }
```

- Výpis

```
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
```

![screenshot_pc.png](https://github.com/Andergonan/MyAwesomeEmojiShoppingCart/blob/main/img_documentation/img_2.png)

### UML class diagram

![screenshot_pc.png](https://github.com/Andergonan/MyAwesomeEmojiShoppingCart/blob/main/img_documentation/classDiagram.png)

## Zadání

> Napište demo program se dvěma třídami dle vašeho uvážení, které spolu nějak interagují (dědění, skládání atp).
> Součástí této úlohy bude:
>
> - Dokumentační komentáře
> - UML diagram tříd
> - řádně připravený README.md
> - Odevzdávejte jako odkaz na projekt ve vašem githubu.

## LICENSE:

MIT License

Copyright (c) 2022 David Anderle

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
