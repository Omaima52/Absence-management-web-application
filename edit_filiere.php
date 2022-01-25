<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 //Tache EDDARRAJI OMAIMA

 include('connect.php');
if(isset($_POST["btn_update"]))
{
    extract($_POST);
    $q1="UPDATE `filiere` SET `titreFiliere`='$titreFiliere', `codeFiliere`='$codeFiliere',`anneeaccreditation`='$anneeaccreditation',`anneeFinaccreditation`='$anneeFinaccreditation' WHERE `idFiliere`='".$_GET['idFiliere']."'";

    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Filière modifiée avec succés';
     ?>
<script type="text/javascript">
window.location="view_filiere.php";
</script>
<?php
} else {
  $_SESSION['error']='Un problème est survenu lors de la modification';
?>
<script type="text/javascript">
window.location="view_filiere.php";
</script>
<?php
}
}
?>

<?php
$que="SELECT * from `filiere` WHERE idFiliere='".$_GET["idFiliere"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    extract($row);
$titreFiliere = $row['titreFiliere'];
$codeFiliere = $row['codeFiliere'];
$anneeaccreditation = $row['anneeaccreditation'];
$anneeFinaccreditation = $row['anneeFinaccreditation'];
}

?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des filières</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Modfier une filière</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">



                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">

                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="filiereform">

                                   <input type="hidden" name="currnt_date" class="form-control" value="">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Titre du filière</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="titreFiliere" class="form-control" placeholder="Saisir le nom de la filière" value="<?php echo $titreFiliere; ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                              <label class="col-sm-4 control-label text-right">Code du filière</label>
                                              <div class="col-sm-8">
                                                <input type="text" name="codeFiliere" class="form-control" placeholder="Saisir le code de la filière" value="<?php echo $codeFiliere; ?>" required="">
                                              </div>
                                          </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Année d'accréditation</label>
                                                <div class="col-sm-8">
                                                  <input type="number" name="anneeaccreditation" class="form-control" placeholder="Séléctionner l'année d'accréditation" value="<?php echo $anneeaccreditation; ?>" min="2008" max="2050" required="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                              <div class="row">
                                                  <label class="col-sm-4 control-label text-right">Année de fin accréditation</label>
                                                  <div class="col-sm-8">
                                                    <input type="text" name="anneeFinaccreditation" class="form-control" placeholder="Séléctionner l'année de fin d'accréditation" value="<?php echo $anneeFinaccreditation; ?>" min="2008" max="2050" required="">
                                                  </div>
                                              </div>
                                              </div>
                                         <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Modifier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

<?php include('footer.php');?>
