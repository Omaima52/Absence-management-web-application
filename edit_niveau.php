<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 //Tache EDDARRAJI OMAIMA

 include('connect.php');
 date_default_timezone_set('Africa/Casablanca');
 $current_date = date('Y-m-d');
if(isset($_POST["btn_update"]))
{
    extract($_POST);

      $q1="UPDATE `niveau` SET `idFiliere`='$idFiliere',`alias`='$aliasNiveau',`titre`='$titreNiveau'  WHERE `idNiveau`='".$_GET['idNiveau']."'";

    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Niveau modifié avec succés';
     ?>
<script type="text/javascript">
window.location="view_niveau.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de la modification';
?>
<script type="text/javascript">
window.location="view_niveau.php";
</script>
<?php
}

}
?>

<?php
$que="SELECT * from `niveau` WHERE idNiveau='".$_GET["idNiveau"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{

extract($row);
$idFiliere = $row['idFiliere'];
$aliasNiveau = $row['alias'];
$titreNiveau = $row['titre'];

}

?>






        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des niveaux</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Modifier un niveau</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">

                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="niveauform">

                                   <input type="hidden" name="currnt_date" class="form-control" value="">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Filière</label>
                                                <div class="col-sm-8">
                                                    <select type="text" name="idFiliere" class="form-control"   placeholder="Class" required="">
                                                      <option value="">--Choisir une filière--</option>
                                                            <?php
                                                            $f1 = "SELECT * FROM `filiere`";
                                                            $result = $conn->query($f1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["idFiliere"];?>" <?php if($row["idFiliere"]==$idFiliere){ echo "selected"; } ?>>
                                                                        <?php echo $row['titreFiliere'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "aucune filière trouvée";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Alias du niveau</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="aliasNiveau" class="form-control" placeholder="Saisir l'alias du niveau" value="<?php echo $aliasNiveau; ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Titre du niveau</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="titreNiveau" class="form-control" placeholder="Saisir le titre du niveau" value="<?php echo $titreNiveau; ?>" required="">
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
