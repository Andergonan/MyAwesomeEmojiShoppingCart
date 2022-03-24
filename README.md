# My Awesome Emoji Shopping Cart
**Author:** David Anderle

- Projekt zadaný školou
- Nepoužívá sql, pouze pole v php
- Pro spuštění je potřeba soubory nahrát na váš server

## Popis

> - Webová stránka je tvořena tzv. skládáním, index.php je doplněn dalšími soubory, které se do něj zapisují:
>
> `<?php include_once("appdata/fragments/file.php") ?>`

> - Každý nabízený produkt, je utvořen pomocí proměnné s array, která se nakonec zapisuje do pole:
> 
> `$hamburger = array(
    "id" => 7,
    "img" => "🍔",
    "name" => "Hamburger",
    "price" => "32",
);
$database = array($Hamburger);`


![screenshot_pc.png](https://github.com/Andergonan/MyAwesomeEmojiShoppingCart/blob/main/img_documentation/screenshot_pc_1.png)

## Zadání

> Napište demo program se dvěma třídami dle vašeho uvážení, které spolu nějak interagují (dědění, skládání atp).
> Součástí této úlohy bude:
>
> - Dokumentační komentáře
> - UML diagram tříd
> - řádně připravený README.md
> - Odevzdávejte jako odkaz na projekt ve vašem githubu.

## LICENSE:

> MIT License

> Copyright (c) 2022 David Anderle

> Permission is hereby granted, free of charge, to any person obtaining a copy
> of this software and associated documentation files (the "Software"), to deal
> in the Software without restriction, including without limitation the rights
> to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
> copies of the Software, and to permit persons to whom the Software is
> furnished to do so, subject to the following conditions:

> The above copyright notice and this permission notice shall be included in all
> copies or substantial portions of the Software.

> THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
> IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
> FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
> AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
> LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
> OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
> SOFTWARE.
