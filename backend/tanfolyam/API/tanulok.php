<?php
require_once('kapcsolat.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM tanulok;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $adatok = [];
        while($row = mysqli_fetch_assoc($result) > 0) {
            $adatok[] = $row;
        }
    }
    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($adatok);
}
/*
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tantargy'])) {
        $tantargy = $_POST['tantargy'];
        $sql = "SELECT * FROM tantargyak
                WHERE tantargyak.megnevezes LIKE '$tantargy';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            //hiba ha nincs senkinek jegye a tantárgyból
            $sql = "SELECT tanulok.nev AS 'tanulo_neve', AVG(ertekelesek.jegy) AS 'atlag'
                    FROM tanulok, ertekelesek, tantargyak
                    WHERE tantargyak.id=ertekelesek.tantargyid AND tanulok.id= ertekelesek.tanuloid AND tantargyak.megnevezes LIKE '$tantargy'
                    GROUP BY tanulok.id;";
            $result = mysqli_query($conn, $sql);
        
            if (mysqli_num_rows($result) > 0) {
                $atlagok = [];
                while($row = mysqli_fetch_assoc($result)) {
                    $atlagok[] = $row;
                }
            }
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($atlagok);            
        }

        else{
            http_response_code(404);
            header('Content-Type: application/json');
            echo json_encode(["error" => "A megadott tantárgy nem található az adatbázisban."]);
        }
    }
}*/