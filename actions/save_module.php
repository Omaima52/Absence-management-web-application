
<?php
//Tache EDDARRAJI OMAIMA

include('../connect.php');

extract($_POST);
   $sql = "INSERT INTO `module` (`idNiveau`,`titre`,`code`) VALUES ('$idNiveau','$titreModule','$codeModule')";
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Module ajoutée avec succés';
     ?>
<script type="text/javascript">
window.location="../view_module.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de l\'ajout';
?>
<script type="text/javascript">
window.location="../view_module.php";
</script>
<?php } ?>
