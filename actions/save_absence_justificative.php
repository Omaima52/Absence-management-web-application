<?php
include('../connect.php');
mysqli_set_charset($conn,'utf8');

$justificative = $_FILES['justificative']['name'];
$target = "../uploadFile/absence/".basename($justificative);
move_uploaded_file($_FILES['justificative']['tmp_name'], $target);

extract($_POST);
   $sql = "INSERT INTO `piecejustificative` (`cheminFichier`, `intitule`, `dateLivraison`) VALUES ('$justificative', '$intituleJustif', '$dateLivraison')";
if ($conn->query($sql) === TRUE) {
  $last_id = mysqli_insert_id($conn);
  $sql1 = "INSERT INTO `absence_piecejustificative` (`idAbsence`, `idPieceJustificative`) Values ('$idAbsence','$last_id')";
  if($conn->query($sql1) === TRUE){
    $_SESSION['success']=' Jusitificative ajoutée avec succés';
  }
     ?>
<script type="text/javascript">
window.location="../view_mes_absences.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de l\'ajout';
?>
<script type="text/javascript">
window.location="../view_mes_absences.php";
</script>
<?php } ?>
