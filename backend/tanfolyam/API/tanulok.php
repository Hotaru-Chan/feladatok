<?php
require_once('kapcsolat.php');

//leellenőrzöd a metódust
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //ÁTJÖTT-E AZ ADAT, LÉTEZIK-E A 'tantargy' kulcs
    if (isset($_POST['tantargy'])) {
        //átvesszük változóba az adatot
        $tantargy = $_POST['tantargy'];

        //ellenőrizni létezik-e a tantárgy (SELECT)
        $sql = "SELECT * FROM tantargyak WHERE tantargyak.megnevezes LIKE '$tantargy';";
        $result = mysqli_query($conn, $sql); //SQL futtatása

        if (mysqli_num_rows($result) > 0) { //létezik a tantárgy
            //kiszámoljuk a tantárgyi átlagot (SELECT)
            $sql = "SELECT tantargyak.megnevezes AS 'tantargy_neve', 
                           AVG(ertekelesek.jegy) AS 'atlag'
                    FROM tantargyak, ertekelesek
                    WHERE tantargyak.id = ertekelesek.tantargyid 
                          AND  tantargyak.megnevezes LIKE '$tantargy'";
            $result = mysqli_query($conn, $sql);//SQL futtatása

            if (mysqli_num_rows($result) > 0) {//van adat
                //mysqli_fetch_assoc --> $result kiszedi az eredmény sorokat
                $row = mysqli_fetch_assoc($result); //$row-ba létrejön egy 'tantargy-neve'és 'atlag'kulcs a megfelelő értékekkel
                //válasz küldése
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode($row);
            }
        } else { //nem létezik a tantárgy
            //válasz--> hibaüzenet
            http_response_code(404);
            header('Content-Type: application/json');
            echo json_encode(
                [
                    "error" => "A megadott tantárgy nem található az adatbázisban."
                ]
            );
        }
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT tanulok.nev, tantargyak.megnevezes AS 'tantargy', ertekelesek.jegy AS 'erdemjegy' FROM tanulok, tantargyak, ertekelesek
    WHERE tanulok.id = ertekelesek.tanuloid AND ertekelesek.tantargyid = tantargyak.id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
        $ertekelesek[] = $row;
            http_response_code(200);
            header('Content-Type: application/json');
            
        }
        echo json_encode($ertekelesek);
    }
}
