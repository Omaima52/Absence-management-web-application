<?php
//Tache EDDARRAJI OMAIMA

include 'connect.php';
session_start();

$sql = "DELETE FROM `matiere` WHERE idMatiere='".$_GET["idMatiere"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Matière supprimée avec succés';
?>
<script>

window.location = "view_matiere.php";
</script>
