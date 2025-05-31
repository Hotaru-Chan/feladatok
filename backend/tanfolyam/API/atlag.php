<?php

require_once('kapcsolat.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    //létezik-e a tantárgy kulcs
    if (isset($_POST['tantargy'])) {
        $tantargy = $_POST['tantargy'];

        //létezik-e a tantárgy
        $sql = "SELECT * FROM tantargyak
            WHERE tantargyak.megnevezes LIKE '$tantargy';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) { // létezik a tantárgy
            $sql = "SELECT tantargyak.megnevezes AS 'tantargy_neve', AVG(ertekelesek.jegy) AS 'atlag'
                FROM tantargyak, ertekelesek
                WHERE tantargyak.id = ertekelesek.tantargyid AND tantargyak.megnevezes LIKE '$tantargy';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // $row - tantargy_neve és atlag kulcs
                // válasz küldése
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode($row);
        }
        } else { // nem létezik a tantárgy
            http_response_code(404);
            header('Content-Type: application/json');
            echo json_encode(["error" => "A megadott tantárgy nem található az adatbázisban"]);
        }
    }
}