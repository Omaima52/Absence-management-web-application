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

      $q1="UPDATE `module` SET `idNiveau`='$idNiveau',`titre`='$titreModule',`code`='$codeModule'  WHERE `idModule`='".$_GET['idModule']."'";

    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Module modifié avec succés';
     ?>
<script type="text/javascript">
window.location="view_module.php";
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
$que="SELECT * from `module` WHERE idNiveau='".$_GET["idModule"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{

extract($row);
$idNiveau = $row['idNiveau'];
$titreModule = $row['titre'];
$codeModule = $row['code'];

}

?>






        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des modules</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ajouter un module</li>
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
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="moduleform">

                                   <input type="hidden" name="currnt_date" class="form-control" value="">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Niveau</label>
                                                <div class="col-sm-8">
                                                    <select type="text" name="idNiveau" class="form-control"   placeholder="Class" required="">
                                                      <option value="">--Choisir un niveau--</option>
                                                            <?php
                                                            $n1 = "SELECT * FROM `niveau`";
                                                            $result = $conn->query($n1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["idNiveau"];?>" <?php if($row["idNiveau"]==$idNiveau){ echo "selected"; } ?>>
                                                                        <?php echo $row['alias'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "aucun niveau trouvée";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Titre du module</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="titreModule" class="form-control" placeholder="Saisir le titre du module" value="<?php echo $titreModule; ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Code du module</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="codeModule" class="form-control" placeholder="Saisir le code du module" value="<?php echo $codeModule; ?>" required="">
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
