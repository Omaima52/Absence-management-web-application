<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
if(isset($_POST["btn_update"]))
{
    extract($_POST);

      $q1="UPDATE `compte` SET `idRole`='$idRole',`enabled`='$enabled'WHERE `idCompte`='".$_GET['idCompte']."'";

    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Compte modifiée avec succés';
     ?>
<script type="text/javascript">
window.location="view_compte.php";
</script>
<?php
} else {
      $_SESSION['error']='Un problème est survenu lors de la modification';
?>
<script type="text/javascript">
window.location="view_compte.php";
</script>
<?php
}

}
?>

<?php
$que="SELECT * from `compte` WHERE idCompte='".$_GET["idCompte"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{

extract($row);
$idRole = $row['idRole'];
$enabled = $row['enabled'];

}

?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des comptes</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Modifier un compte</li>
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
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="compteform">

                                   <input type="hidden" name="currnt_date" class="form-control" value="">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Rôle</label>
                                                <div class="col-sm-8">
                                                    <select type="text" name="idRole" class="form-control"   placeholder="Module" required="">
                                                      <option value="">--Choisir un rôle--</option>
                                                            <?php
                                                            $m1 = "SELECT * FROM `role`";
                                                            $result = $conn->query($m1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["idRole"];?>" <?php if($row["idRole"]==$idRole){ echo "selected"; } ?>>
                                                                        <?php echo $row['nomRole'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "aucun rôle trouvé";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Activité</label>
                                                <div class="col-sm-8">
                                                  <select type="text" name="enabled" class="form-control"   placeholder="Module" required="">
                                                    <option value="">--Choisir un rôle--</option>
                                                                  <option value="1" <?php if($enabled==1){ echo "selected"; } ?>>Activé</option>
                                                                  <option value="0" <?php if($enabled==0){ echo "selected"; } ?>>Désactivé</option>

                                                  </select>                                                </div>
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
