<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include 'connect.php';
 mysqli_set_charset($conn,'utf8');
 $current_date = date('Y-m-d');

$current_user = $_SESSION['idUtilisateur'];

extract($_POST);
$annee_ = $_POST['anneeAbs'];

$sql_ma = "SELECT *, ab.etat as ab_etat from absence ab join inscription i on ab.idInscription = i.idInscription
join typeseance ts on ts.idTypeSeance = ab.idTypeSeance
where i.idUtilisateur = $current_user and year(ab.dateHeureDebutAbsence) = $annee_";

$result1_ma = $conn->query($sql_ma);

$sql_da = "SELECT * from utilisateur u join etudiant e on u.idUtilisateur = e.idUtilisateur where u.idUtilisateur = $current_user";
$query_da=$conn->query($sql_da);
while($row_da=mysqli_fetch_array($query_da))
{
extract($row_da);
$photo_ = $row_da['photo'];
$nom_ = $row_da['nom'];
$prenom_ = $row_da['prenom'];
$cne_ = $row_da['cne'];
}
?>


        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des absences</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ma Fiche d'absence</li>
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

                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
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
                                                <td><?php echo $row_ma['typeSaisie']; ?></td>

                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                  <button class="btn btn-primary float-right mt-3" type="submit" disabled>Imprimer Ma fiche d'absence</button>

                              </form>
                            </div>

<?php include('footer.php');?>
