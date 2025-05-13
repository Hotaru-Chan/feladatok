<?php
    echo "<pre>"; //struktúrálisan jelennek meg az adatszerkezetek
    //var_dump($_SERVER["REQUEST_URI"]);  //string(55) "/13_E/2024_09_24/?mennyit=6&mirol=RUB&mire=HUF"
    $parsed = parse_url($_SERVER["REQUEST_URI"]); //ketté veszi az útvonalat elérési útra é query paraméterekre-->asszociatív tömböt csinál
    //var_dump($parsed);
    // array(2) {
    //     ["path"]=>
    //     string(26) "/13_E/2024_09_24/"
    //     ["query"]=>
    //     string(28) "mennyit=6&mirol=RUB&mire=HUF"
    //   }
    $path = $parsed["path"];
    //var_dump($path); //string(26) "/13_E/2024_09_24/"
    
    // '/13_E/2024_09_24/penzvalto' --> index.php utasításait hajtja végre (aplikáció)
    // '/13_E/2024_09_24/' -->cimlap jelenik meg

    switch ($path) {
        case '/13E/2024_10_01/penzvalto':
             
            $mennyit = (int)($_GET["mennyit"] ?? 1); //ha a változó létezik, akkor a ?? előtti értéket adja vissza, különben a ?? utánit
            $mirol = $_GET["mirol"] ?? "USD";
            $mire = $_GET["mire"] ?? "HUF";

            $adatok = file_get_contents("https://kodbazis.hu/api/exchangerates?base=".$mirol); //string

            $konvertalt_adatok = json_decode($adatok, true); //true miatt lesz asszociatív tömb, külömben object lesz
            
            $eredmeny = $mennyit * $konvertalt_adatok["rates"][$mire];
            
            $JSON_adatok = json_decode(file_get_contents("currencies.json"),true);
            
            //behívni a penzvaltas.php fájlt
            require_once("./views/penzvaltas.php");
            break;
        
        case '/13E/2024_10_01/':
            require_once('./views/cimlap.html');
            break;
        default:
            echo "Az oldal nem elérhető " . '<a href="/13E/2024_10_01/">Ugrás a címlapra</a>';
            break;
    }
