<?php
include 'connect.php';
session_start();

$sql = "DELETE FROM `compte` WHERE idCompte='".$_GET["idCompte"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Compte supprimé avec succés';
?>
<script>

window.location = "view_compte.php";
</script>
