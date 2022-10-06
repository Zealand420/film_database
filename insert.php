<?php
require "settings/init.php";

if(!empty($_POST["data"])){
    $data = $_POST["data"];
    $file = $_FILES;

    if(!empty($file["filmBillede"]["tmp_name"])){
    move_uploaded_file($file["filmBillede"]["tmp_name"], "uploads/" . basename($file["filmBillede"]["name"]));
    }

    $sql = "INSERT INTO film (filmNavn, filmUdgivelsesaar, filmGenre, filmLaengde, filmRating, filmSkuespillere, filmInstruktoer, filmBeskrivelse, filmUdkommer, filmBillede) VALUES(:filmNavn, :filmUdgivelsesaar, :filmGenre, :filmLaengde, :filmRating, :filmSkuespillere, :filmInstruktoer, :filmBeskrivelse, :filmUdkommer, :filmBillede)";
    $bind = [
        ":filmNavn" => $data["filmNavn"],
        ":filmUdgivelsesaar" => $data["filmUdgivelsesaar"],
        ":filmGenre" => $data["filmGenre"],
        ":filmLaengde" => $data["filmLaengde"],
        ":filmRating" => $data["filmRating"],
        ":filmSkuespillere" => $data["filmSkuespillere"],
        ":filmInstruktoer" => $data["filmInstruktoer"],
        ":filmBeskrivelse" => $data["filmBeskrivelse"],
        ":filmUdkommer" => $data["filmUdkommer"],
        ":filmBillede" => (!empty($file["filmBillede"]["tmp_name"])) ? $file["filmBillede"]["name"] : NULL,
    ];

    $db->sql( $sql, $bind, false);
    echo "Filmen er nu indsendt <a href='insert.php'>Klik her for at indtaste en ny film!</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Indsæt film</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/pcxm5a27blrcmgerv42gvtu2b2hs1tlur9shhgoowz6qn9ln/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

    <form method="post" action="insert.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="filmNavn">Navn på filmen</label>
                    <input class="form-control" type="text" name="data[filmNavn]" id="filmNavn" placeholder="Film navn" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="filmUdgivelsesaar">Udgivelsesår</label>
                    <input class="form-control" type="text" name="data[filmUdgivelsesaar]" id="filmUdgivelsesaar" placeholder="Film udgivelsesaar" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="filmGenre">Genre</label>
                    <input class="form-control" type="text" name="data[filmGenre]" id="filmGenre" placeholder="Film genre" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="filmLaengde">varighed</label>
                    <input class="form-control" type="text" name="data[filmLaengde]" id="filmLaengde" placeholder="Film laengde" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="filmRating">Rating</label>
                    <input class="form-control" type="number" step="0.1" name="data[filmRating]" id="filmRating" placeholder="Film rating" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="filmSkuespillere">Skuespillere</label>
                    <input class="form-control" type="text" name="data[filmSkuespillere]" id="filmSkuespillere" placeholder="Film skuespillere" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="filmInstruktoer">Instruktør</label>
                    <input class="form-control" type="text" name="data[filmInstruktoer]" id="filmInstruktoer" placeholder="Film instruktoer" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="filmUdkommer">Udkommer</label>
                    <input class="form-control" type="date" name="data[filmUdkommer]" id="filmUdkommer" placeholder="Fild udkommer" value="">
                </div>
            </div>

            <div class="col-12">
                <label class="form-label" for="filmBillede">Film billeder</label>
                <input type="file" class="form-control" id="filmBillede" name="filmBillede">
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="filmBeskrivelse">Beskrivelse</label>
                    <textarea class="form-control" name="data[filmBeskrivelse]" id="filmBeskrivelse"></textarea>
                </div>
            </div>

            <div class="col-12 col-md-6 offset-md-6">
                <button class="form-control btn btn-primary" type="submit">Indsæt film</button>
            </div>

        </div>
    </form>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
        });
    </script
</body>
</html>
