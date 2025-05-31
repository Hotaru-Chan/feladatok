<?php

require_once('kapcsolat.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nev'], $_POST['telefonszam'], $_POST['szuletesiido'], $_POST['email'])) {
        //adatok átvétele változókba:
        $nev = $_POST['nev'];
        $telefonszam = $_POST['telefonszam'];
        $szuletesiido = $_POST['szuletesiido'];
        $email = $_POST['email'];

        //ellenőrzés: HIBA, ha a megyadott telefonszám, vagy email létezik
        $sql = "SELECT * 
                FROM tanulok 
                WHERE tanulok.telefonszam LIKE '$telefonszam' 
                      OR tanulok.email LIKE '$email';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) { //nem létezik sem a telefonszám, sem az email cím
            //jöhet a beszúrás
            $sql = "INSERT INTO `tanulok` (`nev`, `telefonszam`, `szuletesiido`, `email`) VALUES
            ('$nev', '$telefonszam', '$szuletesiido', '$email')";
            
            if (mysqli_query($conn, $sql)) { //sikeres a beszúrás, mert a futtatás(mysqli-query) nem NULL értékkel tért vissza
              $valasz = [
                "message"=> "Sikeresen hozzáadtuk a tanulót az adatbázishoz.",
                "tanulo"=> [
                    "nev"=> $nev,
                    "telefonszam"=> $telefonszam,
                    "szuletesiido"=> $szuletesiido,
                    "email"=> $email
                    ]
                ];
              //válasz küldése
              http_response_code(200);
              header('Content-Type: application/json');
              echo json_encode($valasz);
            
            } else { //sikertelen a futtatás (NULL)
                http_response_code(404);
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        "error" => "Nem sikerült felvenni a tanulót az adatbázisba!"
                    ]
                );              
            }
            
        } else { //HIBA, valamelyik adat létezik (adott vissza sort a lekérdezés)
            //válasz küldése
            http_response_code(404);
            header('Content-Type: application/json');
            echo json_encode(
                [
                    "error" => "A megadott e-mail cím vagy telefonszám már létezik."
                ]
            );
        }
    } else { //HIBA, valamelyik adat nem érkezett meg, hiányzó kulcs a $_POST-bban
        //válasz küldése
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(
            [
                "error" => "Minden mezőt ki kell tölteni (nev, telefonszam, szuletesiido, email)."
            ]
        );
    }
}