<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include 'connect.php';
 mysqli_set_charset($conn,'utf8');
 $current_date = date('Y-m-d');
 extract($_POST);

$cnee = $_POST['cne'];
$sqle = "SELECT * from etudiant e join utilisateur u on u.idUtilisateur = e.idUtilisateur join inscription i on u.idUtilisateur = i.idUtilisateur join niveau n on i.idNiveau = n.idNiveau  where e.cne = '$cnee'";
mysqli_set_charset($conn,'utf8');

$result1_et = $conn->query($sqle);
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

        <div class="row">
            <div class="col-lg-8" style="margin-left: 10%;">
                <div class="card">
                    <div class="card-title">

                    </div>
                    <div class="card-body">

                        <div class="input-states">
                          <?php
                          if(mysqli_num_rows($result1_et)!=0){
                            while($row_et=mysqli_fetch_array($result1_et))
                            {
                              extract($row_et);
                              $photo_ = $row_et['photo'];
                              $cne_ = $row_et['cne'];
                              $nom_ = $row_et['nom'];
                              $prenom_ = $row_et['prenom'];
                              $email_ = $row_et['email'];
                              $cin_ = $row_et['cin'];
                              $telephone_ = $row_et['telephone'];
                              $nomArabe_ = $row_et['nomArabe'];
                              $prenomArabe_ = $row_et['prenomArabe'];
                              $niveau_ = utf8_decode($row_et['titre']);
                              $inscription_ = $row_et['idInscription'];
                            }
                          ?>
                            <form class="form-horizontal" method="POST" action="view_fiche_absence" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="hidden" value="<?php echo $photo_;?>"  name="photo_" class="form-control" readonly>
                                <center><image class="profile-img img-fluid responsive img-thumbnail" src="uploadImage/Profile/<?php echo $photo_;?>" style="height:170px;width:170px;"></center>
                            </div>
                                <div class="form-group row">
                                  <div class="row col-sm-6">
                                      <label class="col-sm-4 control-label text-right">N° Inscp.</label>
                                      <div class="col-sm-8">
                                          <input type="text" name="inscription_" value="<?php echo $inscription_;?>"  class="form-control" readonly>
                                      </div>
                                  </div>
                                  <div class="row col-sm-6">
                                      <label class="col-sm-4 control-label text-right">Niveau</label>
                                      <div class="col-sm-8">
                                          <input type="text" name="niveau_" value="<?php echo $niveau_;?>"  class="form-control" readonly>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                    <div class="row col-sm-6">
                                        <label class="col-sm-4 control-label text-right">Nom</label>
                                        <div class="col-sm-8">
                                            <input type="text"  name="nom_"  value="<?php echo $nom_;?>"  name="nom_" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row col-sm-6">
                                        <label class="col-sm-4 control-label text-right">Prénom</label>
                                        <div class="col-sm-8">
                                            <input type="text"  name="prenom_" value="<?php echo $prenom_;?>"  class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <div class="row col-sm-6">
                                        <label class="col-sm-4 control-label text-right">الإسم</label>
                                        <div class="col-sm-8">
                                            <input type="text"  value="<?php echo $nomArabe_;?>"  class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row col-sm-6">
                                        <label class="col-sm-4 control-label text-right">اللقب</label>
                                        <div class="col-sm-8">
                                            <input type="text"  value="<?php echo $prenomArabe_;?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                  <div class="form-group row">
                                     <div class="row col-sm-6">
                                         <label class="col-sm-4 control-label text-right">CIN</label>
                                         <div class="col-sm-8">
                                             <input type="text"  value="<?php echo $cin_;?>"  name="cin" class="form-control" readonly>
                                         </div>
                                     </div>
                                     <div class="row col-sm-6">
                                         <label class="col-sm-4 control-label text-right">CNE</label>
                                         <div class="col-sm-8">
                                             <input type="text"  value="<?php echo $cne_;?>"  name="cne_" class="form-control" readonly>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="form-group row">
                                    <div class="row col-sm-6">
                                        <label class="col-sm-4 control-label text-right">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo $email_;?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row col-sm-6">
                                        <label class="col-sm-4 control-label text-right">Téléphone</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo $telephone_;?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30 col-sm-12">Voir la fiche d'absence</button>
                            </form>
                            <?php } else{?>
                              <div class="form-group">
                                 <div class="alert alert-danger col-sm-12 font-weight-bold">
                                   Aucun étudiant trouvé pour le code CNE recherché! <a href="searchby_cne.php" class="link text-info ml-2">Saisir un autre CNE<a>
                                 </div>

                             </div>
                        <?php } ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>


<?php include('footer.php');?>
