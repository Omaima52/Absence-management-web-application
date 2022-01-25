
<?php
//Tache EDDARRAJI OMAIMA

include('../connect.php');

extract($_POST);
   $sql = "INSERT INTO `matiere` (`idModule`,`nom`,`code`) VALUES ('$idModule','$nomMatiere','$codeMatiere')";
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Matière ajoutée avec succés';
     ?>
<script type="text/javascript">
window.location="../view_matiere.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de l\'ajout';
?>
<script type="text/javascript">
window.location="../view_matiere.php";
</script>
<?php } ?>
