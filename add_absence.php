<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include 'connect.php';
 mysqli_set_charset($conn,'utf8');

extract($_POST);
$sql_add_ab = "SELECT * from utilisateur u join inscription i on u.idUtilisateur = i.idUtilisateur join etudiant e on u.idUtilisateur = e.idUtilisateur where i.idNiveau =  '$idNiveau'";
$result1_add_ab = $conn->query($sql_add_ab);
if ($result1_add_ab === FALSE) {
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
                        <li class="breadcrumb-item active">Contrôler une absence</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                 <div class="card">
                            <div class="card-body">
                          <form  ="form-horizontal" action="actions/save_absence" method="POST" name="absenceform" enctype="multipart/form-data">
                          <div class="row page-titles">
                              <div class="form-group col-md-2">
                                <select type="text" name="idTypeSeance_" class="form-control"  placeholder="Niveau" required="">
                                    <option value="">--Type séance--</option>
                                        <?php
                                        $s1 = "SELECT * FROM `typeseance`";
                                        $result = $conn->query($s1);

                                        if ($result->num_rows > 0) {
                                            while ($row = mysqli_fetch_array($result)) {?>
                                                <option value="<?php echo $row["idTypeSeance"];?>">
                                                    <?php echo $row['alias'];?>
                                                </option>
                                                <?php
                                            }
                                        } else {
                                        echo "aucun type de séeance trouvé";
                                            }
                                        ?>
                                </select>
                              </div>
                              <div class="form-group col-md-5">
                                  <div class="row">
                                      <label class="col-sm-4 control-label  text-sm-right mt-2">Date Début</label>
                                      <div class="col-sm-8 row">
                                          <input type="date" name="dateDebutAbsence_" class="form-control col-sm-8" required>
                                          <input type="time" name="heureDebutAbsence_" class="form-control col-sm-4" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group col-md-5">
                                  <div class="row">
                                      <label class="col-sm-4 control-label  text-sm-right  mt-2">Date Fin</label>
                                      <div class="col-sm-8 row">
                                        <input type="date" name="dateFinAbsence_" class="form-control col-sm-8" required>
                                        <input type="time" name="heureFinAbsence_" class="form-control col-sm-4" required>                                      </div>
                                  </div>
                              </div>
                          </div>

                          <a href="searchby_niveau.php" class="float-right"><button class="btn btn-primary">Choisir un niveau</button></a>

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="d-none">idutilisateur</th>
                                                <th class="d-none">idinscription</th>
                                                <th class="text-center">Photo</th>
                                                <th class="text-center">CNE</th>
                                                <th class="text-center">Nom</th>
                                                <th class="text-center">Prénom</th>
                                                <th class="text-center">Absence</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                  $rowEtudiant = 0;
                                   while($row = $result1_add_ab->fetch_assoc()) {
                                     $rowEtudiant = $rowEtudiant+1;
                                      ?>
                                            <tr class="text-center" data-id="<?php echo $row['idUtilisateur']; ?>">
                                               <td class="d-none"><input type="hidden" id="etat" name="idUtilisateur_" value="<?php echo $_SESSION['idUtilisateur']; ?>"></td>
                                               <td class="d-none"><input type="hidden" id="etat" name="idInscription_[]" value="<?php echo $row['idInscription']; ?>"></td>
                                                <td class="text-center">
                                                  <image class="profile-img img-fluid responsive" src="uploadImage/Profile/<?=$row['photo']?>" style="height:40px;width:40px;">
                                                </td>
                                                <td><?php echo $row['cne']; ?></td>
                                                <td><?php echo $row['nom']; ?></td>
                                                <td><?php echo $row['prenom']; ?></td>
                                                <td class="text-center">
                                                  <input type="checkbox" id="etat" name="statut[]" value="1">
                                                </td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                  <input type="hidden" id="rowEtudiant" name="rowEtudiant" value="<?php echo $rowEtudiant?>">
                                  <button class="btn btn-primary float-right mt-3" type="submit">Enregistrer l'absence</button>

                              </form>
                            </div>

<?php include('footer.php');?>
