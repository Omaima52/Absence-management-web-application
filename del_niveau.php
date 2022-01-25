<?php
//Tache EDDARRAJI OMAIMA

include 'connect.php';
session_start();

$sql = "DELETE FROM `niveau` WHERE idNiveau='".$_GET["idNiveau"]."'";
$sql1 = "DELETE FROM `module` WHERE idNiveau='".$_GET["idNiveau"]."'";

$res = $conn->query($sql) ;
$res1 = $conn->query($sql1) ;

 $_SESSION['success']=' Niveau supprimé avec succés';
?>
<script>

window.location = "view_niveau.php";
</script>
