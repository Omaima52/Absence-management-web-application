
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Africa/Casablanca');
 $current_date = date('d/m/Y');

 if(isset($_POST["btn_update"]))
 {
     extract($_POST);
     $photo = $_FILES['photo']['name'];
     $target = "uploadImage/Profile/".basename($photo);

  if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
   @unlink("uploadImage/Profile/".$_POST['old_photo']);
       $msg = "Photo chargée avec succés";
     }else{
       $msg = "Un problème est survenu lors de la mise à jour du photo.";
     }

       $q1="UPDATE utilisateur SET `nom`='$nom',`prenom`='$prenom',`nomArabe`='$nomArabe',`prenomArabe`='$prenomArabe',`cin`='$cin',`email`='$email',`telephone`='$telephone' ,`photo`='$photo' WHERE `idUtilisateur`='".$_GET['idUtilisateur']."'";
       $q2="UPDATE etudiant SET `cne`='$cne',`dateNaissance`='$dateNaissance' WHERE `idUtilisateur`='".$_GET['idUtilisateur']."'";

     if ($conn->query($q1) === TRUE) {
       if ($conn->query($q2) === TRUE) {
           $_SESSION['success']=' Etudiant modifié avec succés';
        ?>
 <script type="text/javascript">
 window.location="view_etudiant.php";
 </script>
 <?php
}}else {
       $_SESSION['error']='Un problème est survenu lors de la modification';
 ?>
 <script type="text/javascript">
 window.location="view_etudiant.php";
 </script>
 <?php
 }
 }

 ?>



 <?php
$que="SELECT * from etudiant e join utilisateur u  on u.idUtilisateur=e.idUtilisateur  where u.idUtilisateur='".$_GET["idUtilisateur"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{

extract($row);
$nom = $row['nom'];
$prenom = $row['prenom'];
$nomArabe = $row['nomArabe'];
$prenomArabe = $row['prenomArabe'];
$cin = $row['cin'];
$email = $row['email'];
$telephone = $row['telephone'];
$photo = $row['photo'];
$dateNaissance = $row['dateNaissance'];
$cne= $row['cne'];
}

?>


<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Gestion des étudiants</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Modifier un étudiant</li>
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
                            <form class="form-horizontal" method="POST" name="etudiantform" enctype="multipart/form-data">
                              <input type="hidden" name="currnt_date" class="form-control" value="">
                              <div class="form-group">
                                  <div class="row">
                                      <label class="col-sm-4 control-label"></label>
                                      <div class="col-sm-8 image">
                                        <image class="profile-img profile-img img-fluid responsive img-thumbnail" src="uploadImage/Profile/<?=$photo?>" style="width:35%;">
                                        <input type="hidden" value="<?=$photo?>" name="old_photo">
                                        <input type="file" class="form-control" name="photo">
                                      </div>
                                  </div>
                              </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Nom</label>
                                        <div class="col-sm-8">
                                          <input type="text" name="nom" class="form-control" placeholder="Saisir le nom" required="" value="<?php echo $nom; ?>">
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Prénom</label>
                                        <div class="col-sm-8">
                                            <input type="text"  name="prenom" class="form-control" placeholder="Saisir le prénom" required="" value="<?php echo $prenom; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Nom en Arabe</label>
                                        <div class="col-sm-8">
                                          <input type="text" name="nomArabe" class="form-control" placeholder="Saisir le nom en Arabe" required="" value="<?php echo $nomArabe; ?>">
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Prénom en Arabe</label>
                                        <div class="col-sm-8">
                                            <input type="text"  name="prenomArabe" class="form-control" placeholder="Saisir le prénom" required="" value="<?php echo $prenomArabe; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Date Naissance</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="dateNaissance" class="form-control" placeholder="Saisir le CIN" required value="<?php echo date('Y-m-d', strtotime($dateNaissance)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">CNE</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="cne" class="form-control" placeholder="Saisir le CNE" required value="<?php echo $cne; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">CIN</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="cin" class="form-control" placeholder="Saisir le CIN" required value="<?php echo $cin; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Télephone</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="telephone" class="form-control" placeholder="Saisir le N° Téléphone" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required  value="<?php echo $telephone; ?>">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php include('footer.php');?>
