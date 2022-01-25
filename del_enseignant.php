<?php
//Tache EDDARRAJI OMAIMA

include 'connect.php';
session_start();

$sql1 = "DELETE FROM `utilisateur` WHERE idUtilisateur='".$_GET["idUtilisateur"]."'";
$sql2 = "DELETE FROM `enseignant` WHERE idUtilisateur='".$_GET["idUtilisateur"]."'";

$res = $conn->query($sql1) ;
$res2 = $conn->query($sql2) ;
 $_SESSION['success']=' Enseignant supprimé avec succés';
?>
<script>

window.location = "view_enseignant.php";
</script>
