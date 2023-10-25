<?php
require "settings/init.php";

/*Henter det data der bliver sendt*/
$data = json_decode(file_get_contents("php://input"), true);

/*Hvad vil vi gerne have med i vores API?:
password: Skal udfyldes
nameSearch: Valgfri
*/

header("Content-Type: application/json; charset=utf-8"); /*Fortæller det at den skal opfører sig som en json fil i stedet for en PHP fil*/

if(isset($data["password"]) && $data["password"] == "Bookstore"){ /*Tjekker om password er der og om det er rigtigt*/
    $sql = "SELECT * FROM produkter WHERE 1=1";
    $bind = [];

    if(!empty($data["nameSearch"])) {
        $sql .= " AND bogNavn  LIKE CONCAT('%', :bogNavn, '%')";
        $bind [":bogNavn"] = $data["nameSearch"];
    }




    $produkter = $db -> sql($sql, $bind);
    header("HTTP/1.1 200 OK");

    echo json_encode($produkter);


} else { /*Det er det der sker, hvis ens password er forkert*/
    header("HTTP/1.1 401 Unauthorized"); /*Viser der er sket en fejl*/
    $error["errorMessage"] = "Dit kodeord var forkert"; /*Fejlmeddelse*/
    echo json_encode($error); /*Printer vores fejlmeddelse til skærmen i json format*/
}
?>