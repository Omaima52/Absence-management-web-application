<?php
//Tache EDDARRAJI OMAIMA

include 'connect.php';
session_start();

$sql = "DELETE FROM `coordination` WHERE idCoordination='".$_GET["idCoordination"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Coordination supprimée avec succés';
?>
<script>

window.location = "view_coordination.php";
</script>
