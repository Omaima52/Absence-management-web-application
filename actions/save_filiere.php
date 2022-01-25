<?php
//Tache EDDARRAJI OMAIMA

include('../connect.php');

extract($_POST);
   $sql = "INSERT INTO `filiere` (`titreFiliere`, `codeFiliere`,`anneeaccreditation`,`anneeFinaccreditation` ) VALUES ('$titreFiliere', '$codeFiliere', '$anneeaccreditation','$anneeFinaccreditation')";
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Filière ajoutée avec succés';
     ?>
<script type="text/javascript">
window.location="../view_filiere.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de l\'ajout';
?>
<script type="text/javascript">
window.location="../view_filiere.php";
</script>
<?php } ?>
