<?php
//database start
$hammer = array(
    "id" => 1,
    "img" => "🔨",
    "name" => "Kladívko",
    "price" => "900",
);
$book = array(
    "id" => 2,
    "img" => "📘",
    "name" => "Modrá knížka",
    "price" => "500",
);
$scissors = array(
    "id" => 3,
    "img" => "✂️",
    "name" => "Nůžky",
    "price" => "32",
);
$soap = array(
    "id" => 4,
    "img" => "🧼",
    "name" => "Použité mýdlo",
    "price" => "43",
);
$magnet = array(
    "id" => 5,
    "img" => "🧲",
    "name" => "Magnet na holky",
    "price" => "1200",
);
$extinguisher = array(
    "id" => 6,
    "img" => "🧯",
    "name" => "Hasící přístroj",
    "price" => "900",
);
$hamburger = array(
    "id" => 7,
    "img" => "🍔",
    "name" => "Hamburger",
    "price" => "32",
);
$database = array($hammer, $book, $scissors, $soap, $magnet, $extinguisher, $hamburger); //inserts individual database entries into the array
//database end

//forcycle - print items of database
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