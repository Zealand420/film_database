<?php
require "settings/init.php";

$film = $db->sql("SELECT * FROM film");
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Sigende titel</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php
foreach ($film as $film){
    ?>
    <div class="row">
        <div class="col-12 col-md-6 bg-primary">
            <?php
            echo $film->filmNavn;
            ?>
        </div>
        <div class="col-12 col-md-6">
            <?php
            echo number_format($film->filmRating, 2, ",",  ".") . "<br>";
            ?>
        </div>
    </div>
    <?php
}
?>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
