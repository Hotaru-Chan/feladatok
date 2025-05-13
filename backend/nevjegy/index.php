<?php
echo "<pre>";
// https://randomuser.me/api/ a link segítségével egy random user 
// sok-sok véletlenszerűen összeválogatott adathalmazához jutunk.
//amennyiben a paraméterezzük pl. https://randomuser.me/api/?results=10, 
//úgy 10 felhasználó adatát kapjuk JSON formátumban

//Feladat:
//Olvasd be agy asszociatív tömbbe 15 felhasználó adatát, a fenti linkről! 
//Jelenítsd meg egy kiválasztott felhasználó névjegykártyáját!
//Ehhez vegyél fel egy legördülő listát, amelyben jelenjenek meg 
//a user nevek (Miss Jennie Nichols),
//ha kiválasztunk egy nevet, akkor jelenjen meg az adott személy névjegykártyája az alábbi adatokkal:
    //teljes név, telefonszám, email cím, lakcím, fénykép
//file_put_contents("adatok.json", json_encode($adatok)) --> if(!isset($_GET["nev"]))
$adatok = [];
$adatok[] = file_get_contents("https://randomuser.me/api/?results=15");
file_put_contents("adatok.json", json_encode($adatok)); //--> if(!isset($_GET["nev"]));
if(!isset($_GET["nev"]));
$nevjegyek = json_decode(file_get_contents("adatok.json"),true);
//Útvonalak:
//  /13_E/2024_10_15/nevjegy --> névjegyadatok kezelése (főoldal)
//  /13_E/2024_10_15/ --> címlap (Ugrás a főoldalra)
//  minden más esetben: 'Az oldal nem jeleníthető meg, ugrás a címlapra'
$parsed = parse_url($_SERVER["REQUEST_URI"]);
$path = $parsed["path"];
switch ($path) {
    case '/13_E/2024_10_15/nevjegy':
        var_dump($nevjegyek);
        $kivalogatott_nevjegy = [];
        foreach($nevjegyek as $szemely){
            //if ($szemely["name"] == ) {
                $kivalogatott_nevjegy[] = $szemely;
            //}
        }
        require_once("./views/fooldal.php");
        break;
    
    case '/13_E/2024_10_15/':
        require_once("./views/cimlap.html");
        break;
    
    default:
        echo "Az oldal nem jeleníthető meg! <a href = '/13_E/2024_10_15/'> Ugrás a címlapra </a>";
        break;
}
?>