<?php

require_once('kapcsolat.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tantargy'], $_POST['tanuloId'], $_POST['jegy'])) {
        //minden adat a rendelkezésünkre áll
        $tantargy = $_POST['tantargy'];
        $tanuloId = $_POST['tanuloId'];
        $jegy = $_POST['jegy'];

        //tantargy ellenőrzése
        $sql = "SELECT tantargyak.id 
                FROM tantargyak 
                WHERE tantargyak.megnevezes LIKE '$tantargy';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) { //létezik a tantárgy
            $row = mysqli_fetch_assoc($result);
            $tantargyId = $row['id'];

            //létezik-e a tanuló
            $sql = "SELECT * FROM tanulok WHERE tanulok.id = '$tanuloId';";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) { //létezik a tanulo, van visszaadott sor
                $row = mysqli_fetch_assoc($result);
                $tanuloNev = $row['nev'];
                $email = $row['email'];

                $sql = "INSERT INTO `ertekelesek` (`tanuloid`, `tantargyid`, `jegy`)
                        VALUES ('$tanuloId', '$tantargyId', '$jegy');";

                if (mysqli_query($conn, $sql)) {//sikeres beszúrás
                    $valasz = [
                        "message"=> "Sikeresen hozzáadtuk az értékelést az adatbázishoz.",
                        "tanulo"=> [
                            "nev"=> $tanuloNev,
                            "email"=> $email,
                          "tantargy"=> $tantargy, 
                          "jegy"=> $jegy
                        ]
                    ];
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($valasz);
                } else { //sikertelen beszúrás
                    http_response_code(404);
                    header('Content-Type: application/json');
                    echo json_encode([
                        "error" => "Nem sikerült felvenni az értékelést az adatbázisba!"
                    ]);
                }
            } else { //tanuló nem létezik
                http_response_code(404);
                header('Content-Type: application/json');
                echo json_encode([
                    "error" => "A megadott tanulo nem létezik."
                ]);
            }
        } else { //nincs tantargy
            http_response_code(404);
            header('Content-Type: application/json');
            echo json_encode([
                "error" => "A megadott tantárgy nem létezik."
            ]);
        }
    } else { //isset hibát ad, nem érkezett meg minden adat
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode([
            "error" => "Hiányzó kulcs (tantargy, tanuloId, jegy)."
        ]);
    }
}
