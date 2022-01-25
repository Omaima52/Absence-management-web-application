
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 mysqli_set_charset($conn,'utf8');

?>

 <?php
 $sql_ab = "SELECT *, ab.etat as ab_etat from absence ab join inscription i on ab.idInscription = i.idInscription join typeseance ts on ts.idTypeSeance = ab.idTypeSeance where ab.idAbsence = '".$_GET["idAbsence"]."'";
$query_ab=$conn->query($sql_ab);
while($row_ab=mysqli_fetch_array($query_ab))
{

extract($row_ab);
$idAbsence = $row_ab['idAbsence'];
$typeSeance = $row_ab['intitule'];
$dateHeureDebut = $row_ab['dateHeureDebutAbsence'];
$dateHeureFin = $row_ab['dateHeureFinAbsence'];
}
?>


<div class="page-wrapper">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Gestion des absences</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Justifier une absence</li>
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
                            <form class="form-horizontal" method="POST" name="enseignantform" action="actions/save_absence_justificative.php" enctype="multipart/form-data">
                              <input type="hidden" name="idAbsence" class="form-control" value="<?php echo $idAbsence; ?>">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Type de séance</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" value="<?php echo $typeSeance; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Date et Heure de Début</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control"  value="<?php echo $dateHeureDebut; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Date et Heure de Fin</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control"  value="<?php echo $dateHeureFin; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Justificative</label>
                                        <div class="col-sm-8">
                                          <input type="file" class="form-control" name="justificative"  accept="application/pdf"/ >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Intitulé</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" name="intituleJustif" / >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label  text-sm-right">Date livraison</label>
                                        <div class="col-sm-8">
                                          <input type="date" class="form-control" name="dateLivraison"/ >
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php include('footer.php');?>
