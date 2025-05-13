<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Névjegy</title>
</head>
<body>
    <form action="/13_E/2024_10_15/nevjegy" method="get">
        <select name="" id="">
            <?php foreach ($nevjegy as $szemely):?>
            <option value="<?php echo $szemely["name"]?>" <?php echo $szemely["name"] ?>>
                <?php echo $szemely["name"]?>
            </option>
            <?php endforeach?>
        </select>
        <input type="submit" value="Elküld">
    </form>

    <?php foreach ($kivalogatott_nevjegy as $nevjegy):?>
        <?php echo "Név: ".$nevjegy["results"]["name"]["title"] . $nevjegy["results"]["name"]["first"] . $nevjegy["results"]["name"]["last"] . "<br>"?>
        <?php echo "Telefonszám: " . $nevjegy["results"]["phone"]."<br>"?>
        <?php echo "E-mail: " . $nevjegy["results"]["email"]."<br>"?>
        <?php echo "Lakcím: ".$nevjegy["results"]["location"]["country"].$nevjegy["results"]["location"]["state"].$nevjegy["results"]["location"]["city"].$nevjeg["results"]["location"]["street"]["number"].$nevjegy["results"]["location"]["street"]["name"] ?>
    <?php endforeach?>
</body>
</html>