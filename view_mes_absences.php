<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include 'connect.php';
 mysqli_set_charset($conn,'utf8');
$current_user = $_SESSION['idUtilisateur'];
$sql_ma = "SELECT *, ab.etat as ab_etat from absence ab join inscription i on ab.idInscription = i.idInscription
 join typeseance ts on ts.idTypeSeance = ab.idTypeSeance
 where i.idUtilisateur = $current_user";
$result1_ma = $conn->query($sql_ma);
?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des absences</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Mes absences</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                 <div class="card">
                            <div class="card-body">
                              <!--?php if(isset($useroles)){ if(in_array("add_teacher",$useroles)){ ?-->
                          <!--?php } } ?-->
                          <form  ="form-horizontal" action="actions/save_absence" method="POST" name="absenceform" enctype="multipart/form-data">
                          <div class="row page-titles">

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Type séance</th>
                                                <th class="text-center">Date & Heure de début</th>
                                                <th class="text-center">Date & Heure de Fin</th>
                                                <th class="text-center">Etat</th>
                                                <th class="text-center">Justificative</th>
                                                <th class="text-center">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                  //$sql1 = "SELECT * FROM  `utilisateur` u join enseignant e on u.idUtilisateur = e.idUtilisateur";
                                   while($row_ma = $result1_ma->fetch_assoc()) {
                                      ?>
                                            <tr class="text-center" data-id="<?php echo $row_ma['idAbsence']; ?>">
                                                <td><?php echo $row_ma['intitule']; ?></td>
                                                <td><?php echo $row_ma['dateHeureDebutAbsence']; ?></td>
                                                <td><?php echo $row_ma['dateHeureFinAbsence']; ?></td>
                                                <td><?php
                                                if($row_ma['ab_etat'] == -1){
                                                  echo "Annulé";
                                                }
                                                elseif($row_ma['ab_etat'] == 1){
                                                  echo "Justifié";
                                                }
                                                else{
                                                  echo "Non justifié";
                                                }
                                                 ?></td>
                                                 <td class="text-center">
                                                   <?php
                                                   $sql_pj = "SELECT * from piecejustificative pj join absence_piecejustificative ap on pj.idPieceJustificative = ap.idPieceJustificative where ap.idAbsence = '".$row_ma['idAbsence']."'";
                                                   $query_pj=$conn->query($sql_pj);
                                                   while($row_pj=mysqli_fetch_array($query_pj))
                                                   {
                                                   extract($row_pj);
                                                   $intituleFichier = $row_pj['intitule'];
                                                   $cheminFichier = $row_pj['cheminFichier'];

                                                 if($cheminFichier != ""){
                                                   ?>
                                                   <a href="uploadFile/absence/<?php echo $cheminFichier?>" title="voir la justificative" target="_blank"><i class="fa fa-file text-danger mr-2"></i><?php echo $intituleFichier;?></a>
                                                <?php }} ?>
                                                  </td>
                                                <td class="text-center">
                                                  <a href="add_absence_justificative.php?idAbsence=<?=$row_ma['idAbsence'];?>"><button type="button" class="btn btn-xs btn-primary" title="Attacher une justification"><i class="fa fa-paperclip"></i></button></a>
                                                </td>

                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                              </form>
                            </div>

<?php include('footer.php');?>
