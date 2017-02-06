<?php
include_once ("php/include/class.TemplatePower.inc.php");
include_once ("php/include/database.php");

include("php/header.php");

$getBestand = $db->prepare("SELECT * FROM bestand 
WHERE bestandid = :bestand");
$getBestand->bindParam(":bestand", $_GET['bestand']);
$getBestand->execute();

$bestand = $getBestand->fetch(PDO::FETCH_ASSOC);

var_dump($bestand);


include("php/content.php");
include("php/aside.php");
include("php/footer.php");