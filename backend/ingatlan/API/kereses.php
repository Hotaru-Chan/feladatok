<?php
//kapcsolat az adatbázissal
require_once('kapcsolat.php')

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['artol'], $_POST['arig'], $_POST['kategoriak'])) {
        $artol = $_POST['artol'];
        $arig = $_POST['arig'];
        $katId = $_POST['kategoriak'];

        $query = "SELECT kategoriak.nev AS 'kategoria', ingatlanok.leiras, ingatlanok.hirdetesDatuma ingatlanok.ar, ingatlanok.tehermentes, ingatlanok.kepUrl
        FROM ingatlanok, kategoriak
        WHERE ingatlanok.kategoria_id = kategoriak.id AND kategoriak.id = '$katId'
        AND ingatlanok.ar BETWEEN '$artol' AND '$arig'";

        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $ingatlanok=[];
            while ($row = mysqli_fetch_assoc($result)) {
                $ingatlanok[] = $row;
            }
            http_response_code(200);
            header('Content-Type: application.json');
            echo json_encode($ingatlanok);
            
        }
    }
}