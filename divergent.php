<?php
require "settings/init.php";

$film = $db->sql("SELECT * FROM film WHERE filmId = 28");
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="divergentstyle.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php
foreach ($film as $film){
?>
<div class="row gradient">
    <h1 class="col-12">
        <?php
        echo $film->filmNavn;
        ?>
    </h1>
    <div class="col-12 overbillede">
        <li>
            <?php
            echo $film->filmUdgivelsesaar;
            ?>
        </li>
        <li>
            <?php
            echo $film->filmRating;
            ?>
        </li>
        <li>
            <?php
            echo $film->filmLaengde;
            ?>
        </li>
    </div>

    <img class="globalimg" src="uploads/<?php
    echo $film->filmBillede;
    ?>">

    <div class="underbillede">
        <p>
            <?php
            echo $film->filmBeskrivelse;
            ?>
        </p>

        <hr>

        <p>
            <?php
            echo $film->filmInstruktoer;
            ?>
        </p>

        <hr>

        <p>
            <?php
            echo $film->filmSkuespillere;
            ?>
        </p>

        <hr>

        <p>
            <?php
            echo $film->filmUdkommer;
            ?>
        </p>

        <hr>

        <p>
            <?php
            echo $film->filmGenre;
            ?>
        </p>
</div>
<div/>
<?php
}
?>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
