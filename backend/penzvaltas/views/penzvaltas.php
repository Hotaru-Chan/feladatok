<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
</head>

<body>
    <div class="card w-25 m-auto p-3">
        <form action="/13E/2024_10_01/penzvalto" method="GET">
            <h3>Mennyit?</h3>
            <input class="form-control mb-2" type="number" name="mennyit" value="<?php echo $mennyit ?>">
            <h3>Miről?</h3>
            <select name="mirol" class="form-control mb-2">
                <?php foreach($JSON_adatok as $value): ?>
                    <option value="<?php echo $value["label"] //$value változó "label" kulcsú eleme?>" <?php echo $value["label"]===$mirol ? "selected" : ""?>>
                        <?php echo $value["name"]." ".$value["symbol"] //$value változó "name" és "symbol kulcson lévő értéke kerül összefűzve"?>
                    </option>
                <?php endforeach ?>
            </select>
            <?php echo $eredmeny ?>
            <h3>Mire?</h3>
            <select name="mire" class="form-control mb-2">
                <?php foreach($JSON_adatok as $value): ?>
                    <option value="<?php echo $value["label"] //$value változó "label" kulcsú eleme?>" <?php echo $value["label"]===$mire ? "selected" : ""?>>
                        <?php echo $value["name"]." ".$value["symbol"] //$value változó "name" és "symbol kulcson lévő értéke kerül összefűzve"?>
                    </option>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Elküld">
        </form>
    </div>
</body>

</html>