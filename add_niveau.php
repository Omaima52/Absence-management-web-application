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
                    <h3 class="text-primary">Gestion des niveaux</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ajouter un niveau</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="actions/save_niveau.php" name="niveauform" enctype="multipart/form-data">

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
                                                <label class="col-sm-4 control-label text-right">Alias du niveau</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="aliasNiveau" class="form-control" placeholder="Saisir l'alias du niveau" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Titre du niveau</label>
                                                <div class="col-sm-8">
                                                  <input type="text" name="titreNiveau" class="form-control" placeholder="Saisir le titre du niveau" required="">
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
