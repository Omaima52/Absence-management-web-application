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

      $q1="UPDATE `matiere` SET `idModule`='$idModule',`nom`='$nomMatiere',`code`='$codeMatiere'  WHERE `idMatiere`='".$_GET['idMatiere']."'";

    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Matière modifiée avec succés';
     ?>
<script type="text/javascript">
window.location="view_matiere.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de la modification';
?>
<script type="text/javascript">
window.location="view_matiere.php";
</script>
<?php
}

}
?>

<?php
$que="SELECT * from `matiere` WHERE idMatiere='".$_GET["idMatiere"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{

extract($row);
$idModule = $row['idModule'];
$nomMatiere = $row['nom'];
$codeMatiere = $row['code'];

}

?>






        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des matières</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Modifier une matière</li>
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
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="matiereform">

                                   <input type="hidden" name="currnt_date" class="form-control" value="">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Module</label>
                                                <div class="col-sm-8">
                                                    <select type="text" name="idModule" class="form-control"   placeholder="Module" required="">
                                                      <option value="">--Choisir un module--</option>
                                                            <?php
                                                            $m1 = "SELECT * FROM `module`";
                                                            $result = $conn->query($m1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["idModule"];?>" <?php if($row["idModule"]==$idModule){ echo "selected"; } ?>>
                                                                        <?php echo $row['titre'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "aucun module trouvé";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Nom du matière</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="nomMatiere" class="form-control" placeholder="Saisir le nom du matière" value="<?php echo $nomMatiere; ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Code du matière</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="codeMatiere" class="form-control" placeholder="Saisir le code du matière" value="<?php echo $codeMatiere; ?>" required="">
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
