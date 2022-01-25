
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
?>

 <?php
 $sql_ab = "SELECT *, ab.etat as ab_etat from absence ab join inscription i on ab.idInscription = i.idInscription join typeseance ts on ts.idTypeSeance = ab.idTypeSeance where ab.idAbsence = '".$_GET["idAbsence"]."'";
$query_ab=$conn->query($que_ab);
while($row_ab=mysqli_fetch_array($query_ab))
{

extract($row);
$idAbsence = $row_ab['idAbsence'];
$prenom = $row_ab['prenom'];
$nomArabe = $row_ab['nomArabe'];
$prenomArabe = $row_ab['prenomArabe'];
$cin = $row_ab['cin'];
$email = $row_ab['email'];
$telephone = $row_ab['telephone'];
$photo = $row_ab['photo'];
$specialite = $row_ab['specialite'];
}

?>


<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Gestion des enseignants</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Modifier un enseignant</li>
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
                            <form class="form-horizontal" method="POST" name="enseignantform" enctype="multipart/form-data">
                              <input type="hidden" name="currnt_date" class="form-control" value="">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Nom</label>
                                        <div class="col-sm-8">
                                          <input type="text" name="nom" class="form-control" placeholder="Saisir le nom" required="" value="<?php echo $nom; ?>">
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
