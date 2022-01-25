<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include 'connect.php';
 mysqli_set_charset($conn,'utf8');
 $current_date = date('Y-m-d');

extract($_POST);
$nom_ = $_POST['nom_'];
$prenom_ = $_POST['prenom_'];
$cne_ = $_POST['cne_'];
$niveau_ = $_POST['niveau_'];
$inscription_ = $_POST['inscription_'];

$sql_fa = "SELECT *, ab.etat as ab_etat from absence ab join inscription i on ab.idInscription = i.idInscription join etudiant e on i.idUtilisateur = e.idUtilisateur join typeseance ts on ts.idTypeSeance = ab.idTypeSeance where ab.idInscription = $inscription_";
$result1_fa = $conn->query($sql_fa);
if (mysqli_num_rows($result1_fa)!=0) {
    $_SESSION['NotFound']=' Aucun étudiant trouvé dans ce niveau';
  }
?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des absences</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Fiche d'absence</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                 <div class="card">
                            <div class="card-body">
                          <form  ="form-horizontal" action="actions/save_absence" method="POST" name="absenceform" enctype="multipart/form-data">
                          <div class="row page-titles">
                              <div class="form-group col-md-3">
                                <div class="form-group">
                                  <image class="profile-img img-fluid responsive img-thumbnail" src="uploadImage/Profile/<?php echo $photo_;?>" style="height:170px;width:170px;">
                              </div>
                              </div>

                                  <div class="float-right text-right col-md-9">
                                      <h4 class="control-label  mt-1 font-weight-bold text-dark"><?php echo $nom_;echo" ";  echo $prenom_?></h4>
                                      <p class="control-label  text-sm-right  mt-1 font-weight-blod"><?php echo $cne_;?></p>
                                      <p class="control-label  text-sm-right  mt-1 font-weight-blod"><?php echo $niveau_;?></p>

                                  </div>
                              </div>
                          </div>

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Type séance</th>
                                                <th class="text-center">Date & Heure de début</th>
                                                <th class="text-center">Date & Heure de Fin</th>
                                                <th class="text-center">Etat</th>
                                                <th class="text-center">Type de saisie</th>
                                                <th class="text-center">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                   while($row_fa = $result1_fa->fetch_assoc()) {
                                      ?>
                                            <tr class="text-center" data-id="<?php echo $row_fa['idAbsence']; ?>">
                                                <td><?php echo $row_fa['intitule']; ?></td>
                                                <td><?php echo $row_fa['dateHeureDebutAbsence']; ?></td>
                                                <td><?php echo $row_fa['dateHeureFinAbsence']; ?></td>
                                                <td><?php
                                                if($row_fa['ab_etat'] == -1){
                                                  echo "Annulé";
                                                }
                                                elseif($row_fa['ab_etat'] == 1){
                                                  echo "Justifié";
                                                }
                                                else{
                                                  echo "Non justifié";
                                                }
                                                 ?></td>
                                                <td><?php echo $row_fa['typeSaisie']; ?></td>
                                                <td>
                                                  <a href="edit_absence.php?idAbsence=<?=$row_fa['idAbsence'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-edit"></i></button></a>
                                                  <a href="del_absence.php?idAbsence=<?=$row_fa['idAbsence'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>

                                                </td>

                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                  <button class="btn btn-primary float-right mt-3" type="submit">Imprimer la fiche d'absence</button>

                              </form>
                            </div>

<?php include('footer.php');?>
