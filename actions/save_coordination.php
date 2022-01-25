
<?php
//Tache EDDARRAJI OMAIMA

include('../connect.php');

extract($_POST);
   $sql = "INSERT INTO `coordination` (`idFiliere`, `idUtilisateur`, `dateDebut`, `dateFin`) VALUES ('$idFiliere', '$idUtilisateur', '$dateDebut', '$dateFin')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Coordination ajoutée avec succés';
     ?>
<script type="text/javascript">
window.location="../view_coordination.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de l\'ajout';
?>
<script type="text/javascript">
window.location="../view_coordination.php";
</script>
<?php } ?>
