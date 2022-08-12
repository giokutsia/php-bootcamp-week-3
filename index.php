<?php include_once './config/api_rest.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color:gray;">
    <form action="" method="post">
        <input type="text" name="country_name" value="<?= $county_name ?>">
        <span><?= $nameErr ?></span>
        <input type="submit" value="Search">
    </form>

    <?php if (empty($nameErr)) {
        var_dump($country_matched);
    } ?>





</body>

</html>