
<?php
include('../connect.php');

//Etats d'absence
//0 non justifé (Par défaut)
//1 justifié
//-1 Annulé

//Type de saisie 'manuel' par défaut
extract($_POST);
$checkbox1 = $_POST['statut'] ;
$dateDebutAbs = $_POST['dateDebutAbsence_'];
$heureDebutAbs = $_POST['heureDebutAbsence_'];
$dateFinAbs = $_POST['dateFinAbsence_'];
$heureFinAbs = $_POST['heureFinAbsence_'];
$rowEtudiant =  $_POST['rowEtudiant'];
$dateHeureDebut= date('Y-m-d H:i:s',strtotime("$dateDebutAbs $heureDebutAbs"));
$dateHeureFin= date('Y-m-d H:i:s',strtotime("$dateFinAbs $heureFinAbs"));

/*for ($i = 0; $i < $rowEtudiant; $i++)
{*/
  $i=0;
  while($i<$rowEtudiant){
  $idInsc_ = $idInscription_[$i];
  if($checkbox1[$i] == "1")
  {
       $etatAbs = "1";
  }
  else {
    $etatAbs = "0";
  }
  if($etatAbs == "1"){
    $sql_abs_save = "INSERT INTO `absence` (`idInscription`,`idTypeSeance`,`idUtilisateur`,`dateHeureDebutAbsence`,`dateHeureFinAbsence`,`etat`,`typeSaisie` ) VALUES ('$idInsc_','$idTypeSeance_','$idUtilisateur_','$dateHeureDebut','$dateHeureFin',0,'automatique' )";
      if ($conn->query($sql_abs_save) === TRUE) {
         $_SESSION['success']=' Absence ajoutée avec succés';
       }
       else {
            $_SESSION['error']='Un problème est survenu lors de l\'ajout';
          }
  }
$i++;
}

 ?>
<script type="text/javascript">
window.location="../searchby_niveau.php";
</script>
