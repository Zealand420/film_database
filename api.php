<?php
require "settings/init.php";

$data = json_decode(file_get_contents('php://input'), true);

/*
 * password: Skal udfyldes og være PHP1234
 * nameSearch: valgfri
 */
header('content-type: application/json; charset=utf-8');

$data["password"] = "PHP1234";

if(isset($data["password"]) && $data["password"] == "PHP1234") {
    $sql = "SELECT * FROM film WHERE 1=1";
    $bind = [];

    if(!empty($data["nameSearch"])) {
        $sql .= " AND filmNavn = :filmNavn ";
        $bind[":filmNavn"] = $data["nameSearch"];
    }

    $film = $db->sql($sql, $bind);
    header("HTTP/1.1 200 OK");

    echo json_encode ($film);

} else {
    header("HTTP/1.1 401 unauthorized");
    $error["errorMessage"] = "Dit kodeord var forket, prøv igen";
    echo json_encode($error);
}
?>