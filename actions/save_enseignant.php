<?php
include('../connect.php');
mysqli_set_charset($conn,'utf8');

$photo = $_FILES['photo']['name'];
$target = "../uploadImage/Profile/".basename($photo);

if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
      $msg = "Photo chargé avec succés";
    }else{
      $msg = "Echec de chargement du photo";
    }
extract($_POST);
   $sql = "INSERT INTO `utilisateur` (`nom`, `prenom`, `cin`, `email`, `telephone`,`nomArabe`, `prenomArabe`, `photo`) VALUES ('$nom', '$prenom', '$cin', '$email', '$telephone','$nomArabe', '$prenomArabe', '$photo')";

if ($conn->query($sql) === TRUE) {
  $last_id = mysqli_insert_id($conn);
  $sql1 = "INSERT INTO `enseignant` (`idUtilisateur`, `specialite`) Values ('$last_id', '$specialite')";
  if($conn->query($sql1) === TRUE){
    $_SESSION['success']=' Enseignant ajouté avec succés';
  }

     ?>
<script type="text/javascript">
window.location="../view_enseignant.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de l\'ajout';
?>
<script type="text/javascript">
window.location="../view_enseignant.php";
</script>
<?php } ?>
