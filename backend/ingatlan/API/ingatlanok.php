<?php
//backend
//olyan api-t készítünk, ami JSON formátumba visszaadja az ingatlanok összes adatát

//1. lépés: kapcsolat létrehozása
require_once("kapcsolat.php");

//2. lépés a kérés típusának ellenőrzése (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //3. lépés: SQL mondat felvétele a $query változóba (string)
    $query = "SELECT ingatlanok.id, kategoriak.id AS 'kategoriaId', kategoriak.nev AS 'nev', 
                     ingatlanok.leiras, ingatlanok.hirdetesDatuma, ingatlanok.tehermentes,
                     ingatlanok.ar, ingatlanok.kepUrl
              FROM   ingatlanok, kategoriak
              WHERE  ingatlanok.kategoria_id = kategoriak.id;";
    
    //4. lépés a lekérdezés futtatása a $conn kapcsolaton keresztül, az eredmény a $result változóba kerül
    $result = mysqli_query($conn, $query);
    //echo "<pre>";
    // var_dump($result);

    //5. lépés: Kaptunk-e választ
    if ($result) {
        $ingatlanok = [];
        while ($row = mysqli_fetch_assoc($result)) { // $row-->asszociatív tömb, amibe egy rekord adatai kerülnek
            //var_dump($row); 
            //$row egy ingatlan adatát tartalmazza asszociatív tömbként, a kulcsok a select-ben megadott attribútumok lesznek
            $ingatlanok[] = $row;
        }
        //var_dump($ingatlanok);
        header("Content-Type: application/json"); //JSON adattípussal kommunikálunk
        echo json_encode($ingatlanok);
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //kaptunk-e adatot a $_POST -ba
    if (isset($_POST['kategoriak'],$_POST['hirdetesDatuma'], $_POST['leiras'], $_POST['tehermentes'], $_POST['ar'], $_POST['kepUrl'])) {
        //adatok átvétele változókba
        $kategoria = $_POST['kategoriak'];
        $hirdetesDatuma = $_POST['hirdetesDatuma'];
        $leiras = $_POST['leiras'];
        $tehermentes = $_POST['tehermentes'];
        $ar = $_POST['ar'];
        $kepUrl = $_POST['kepUrl'];

        //adatok beszúrását végző SQL mondat
        $query = "INSERT INTO ingatlanok(kategoria_id, leiras, hirdetesDatuma, tehermentes, ar, kepUrl)
                  VALUES ('$kategoria', '$leiras', '$hirdetesDatuma', '$tehermentes', '$ar', '$kepUrl');";
        
        //lekérdezés futtatása, ellenörzése NULL a visszatérési érték, hiba esetén
        if (mysqli_query($conn, $query)) {
            //sikeres az adatbeillesztés
           //lekérjük a beszúrt rekord id-jét (autoincrement volt)
           $ujId = mysqli_insert_id($conn);
           //sikeres válasz státuszkód (ok)
           http_response_code(200);
           //válasz küldése, formátuma JSON, és elküldi id kulcson a $ujId változó értékét
           header("Content-Type: application/json");
           echo json_encode(['id' => $ujId]);

        }
        else{
            //hibakezelés, sikertelen beillesztés miatt
        }
    }
    else{
        //hibakezelés, ha nem jöttek át az adatok
    }
}
elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if(isset($_GET['id'])){
        $id = $_GET['id'];//átvesszük az ingatlan azonosítóját

        //létezik-e az ingatlan a megadott id-n
        $query = "SELECT * FROM ingatlanok WHERE ingatlanok.id = '$id';";//lekérdezi az adott id-vel rendelkező ingatlan adatait
        $result = mysqli_query($conn,$query);//SQL mondat futtatása

        if (mysqli_num_rows($result)>0) { //$result tartalmaz- e sort? (van-e ilyen ingatlan)
            //ha van ilyen ingatlan akkor törölhetünk
            $query = "DELETE FROM ingatlanok WHERE ingatlanok.id = '$id';";//SQL mondat az adott id-vel rendelkező ingatlan törlésére
            $result = mysqli_query($conn,$query);//SQL mondat futtatása $conn kapcsolaton keresztül

            if ($result) {  //sikeres -e a törlés
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode(['uzenet' => 'Sikeres törlés']);
            }
        }




        
    }
}