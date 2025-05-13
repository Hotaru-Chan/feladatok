<?php
//feladat: jelenítsd meg a főoldalon a termékek nevét és árát a termekek.json fájl alapján
//elérési utak:
//        '/13E/2024_10_01/Termeklista/termekek' -> megjelenik a főoldal
//        '/13E/2024_10_01/Termeklista' -> megjelenik a címlap
//        minden más esetben

//1. lépés: útvonal lekérése
$path = parse_url($_SERVER["REQUEST_URI"])["path"];
//var_dump($path);

//2. lépés: útvonal választó
switch ($path) {
    case '/13E/2024_10_01/Termeklista/':
        require_once('./views/cimlap.html');
        break;
    case '/13E/2024_10_01/Termeklista/termekek':
        $JSON_adatok = json_decode(file_get_contents("termekek.json"),true);
        //var_dump($JSON_adatok);
        foreach ($JSON_adatok as $value) {
            echo $value["name"] ." - " . $value["price"] . "<br>";
        }
        require_once('./views/termekek.php');
        break;
    default:
        echo 'Az oldal nem elérhető ' . '<a href="/13E/2024_10_01/Termeklista/">Ugrás a címlapra</a>';
        break;
}