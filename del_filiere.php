<?php
//Tache EDDARRAJI OMAIMA

include 'connect.php';
session_start();

$sql = "DELETE FROM `filiere` WHERE idFiliere='".$_GET["idFiliere"]."'";
$sql1 = "DELETE FROM `niveau` WHERE idFiliere='".$_GET["idFiliere"]."'";
$sql2 = "DELETE FROM `coordination` WHERE idFiliere='".$_GET["idFiliere"]."'";

$res = $conn->query($sql) ;
$res1 = $conn->query($sql1) ;
$res2 = $conn->query($sql2) ;

 $_SESSION['success']=' Filière supprimée avec succés';
?>
<script>

window.location = "view_filiere.php";
</script>
