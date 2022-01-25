
<?php
//Tache EDDARRAJI OMAIMA
include('../connect.php');

extract($_POST);
   $sql = "INSERT INTO `niveau` (`idFiliere`,`alias`,`titre`) VALUES ('$idFiliere','$aliasNiveau','$titreNiveau')";
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Niveau ajoutée avec succés';
     ?>
<script type="text/javascript">
window.location="../view_niveau.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de l\'ajout';
?>
<script type="text/javascript">
window.location="../view_niveau.php";
</script>
<?php } ?>
