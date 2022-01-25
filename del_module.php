<?php
//Tache EDDARRAJI OMAIMA

include 'connect.php';
session_start();

$sql = "DELETE FROM `module` WHERE idModule='".$_GET["idModule"]."'";
$sql1 = "DELETE FROM `matiere` WHERE idModule='".$_GET["idModule"]."'";

$res = $conn->query($sql) ;
$res1 = $conn->query($sql1) ;

 $_SESSION['success']=' Module supprimé avec succés';
?>
<script>

window.location = "view_module.php";
</script>
