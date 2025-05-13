<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termekek</title>
</head>
<body>
    <h1>Termékek</h1>
    <?php foreach ($termekek as $termek):?>
        <p><b>Termék neve: </b></p> <?php echo $termek["name"]?>
        <p><b>Termék ára:</b></p> <?php echo $termek["price"]?>
        <hr>
    <?php endforeach ?>
</body>
</html>
