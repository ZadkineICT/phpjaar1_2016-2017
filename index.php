<?php
error_reporting(E_ALL);
include_once ("php/include/class.TemplatePower.inc.php");
include_once ("php/include/database.php");

include("php/header.php");

if(!empty($_GET['bestand'])){
    $checkBestand = $db->prepare("SELECT count(*) FROM bestand 
          WHERE bestandid = :bestand");
    $checkBestand->bindParam(":bestand", $_GET['bestand']);
    $checkBestand->execute();

    if($checkBestand->fetchColumn() == 1){
        // 1 rij gevonden met bestandid
        $getBestand = $db->prepare("SELECT * FROM bestand 
          WHERE bestandid = :bestand");
        $getBestand->bindParam(":bestand", $_GET['bestand']);
        $getBestand->execute();

        $bestand = $getBestand->fetch(PDO::FETCH_ASSOC);

        if(file_exists("php/".$bestand['naam'])){
            include("php/".$bestand['naam']);
        }else{
            print "bestand bestaat niet";
        }

        var_dump($bestand);
    }else{
        print "geen rij gevonden met dat id";

    }
}else{
    print "Geen bestand in url";
}

include("php/aside.php");
include("php/footer.php");