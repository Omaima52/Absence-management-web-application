
<?php
//Tache EDDARRAJI OMAIMA

include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');

?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des coordinations</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ajouter une coordination</li>
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
                                    <form class="form-horizontal" method="POST" action="actions/save_coordination.php" name="coordinationform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="">

                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Filière</label>
                                                <div class="col-sm-8">
                                                    <select type="text" name="idFiliere" class="form-control"  placeholder="Filière" required="">
                                                        <option value="">--Choisir une filière--</option>
                                                            <?php
                                                            $f1 = "SELECT * FROM `filiere`";
                                                            $result = $conn->query($f1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["idFiliere"];?>">
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
                                                     <label class="col-sm-4 control-label text-right">Coordonnateur</label>
                                                     <div class="col-sm-8">
                                                         <select type="text" name="idUtilisateur" class="form-control"  placeholder="Filière" required="">
                                                             <option value="">--Choisir un enseignant--</option>
                                                                 <?php
                                                                 $e1 = "SELECT * FROM `enseignant` e join `utilisateur` u on e.idUtilisateur=u.idUtilisateur";
                                                                 $result = $conn->query($e1);

                                                                 if ($result->num_rows > 0) {
                                                                     while ($row = mysqli_fetch_array($result)) {?>
                                                                         <option value="<?php echo $row["idUtilisateur"];?>">
                                                                             <?php echo $row['nom']; echo " "; echo $row['prenom'];?>
                                                                         </option>
                                                                         <?php
                                                                     }
                                                                 } else {
                                                                 echo "aucun enseignant trouvé";
                                                                     }
                                                                 ?>
                                                         </select>
                                                     </div>
                                                 </div>
                                             </div>

                                        <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-4 control-label text-right">Date de début</label>
                                                <div class="col-sm-8">
                                                  <input type="date" name="dateDebut" class="form-control" placeholder="Saisir la date de début">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-4 control-label text-right">Date de fin</label>
                                                <div class="col-sm-8">
                                                  <input type="date" name="dateFin" class="form-control" placeholder="Saisir la date de fin">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Enregistrer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



<?php include('footer.php');?>
<script>
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'NOT Matching';
  }
}
</script>
<script type="text/javascript">
 $('#class_id').change(function(){
    $("#subject_id").val('');
    $("#subject_id").children('option').hide();
    var class_id=$(this).val();
    $("#subject_id").children("option[data-id="+class_id+ "]").show();

  });
</script>
