<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Africa/Casablanca');
 $current_date = date('Y-m-d');
?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion des comptes</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ajouter un compte</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">

                            <div class="card-body">
                                <div class="input-states">
                                  <form class="form-horizontal" method="POST" action="add_compte_etudiant.php" name="cneform" >
                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Recherche par CNE</label>
                                                <div class="col-sm-8">
                                                     <input type="text" name="cne" class="form-control" placeholder="Saisir CNE d'étudiant" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Rechercher un étudiant</button>
                                    </form>
                                  </div>
                                </div>
                                <div class="input-states">
                                  <form class="form-horizontal" method="POST" action="add_compte_enseignant.php" name="cinform" >
                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Recherche par CIN</label>
                                                <div class="col-sm-8">
                                                     <input type="text" name="cin" class="form-control" placeholder="Saisir CIN d'enseignant" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Rechercher un enseignant</button>
                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>

                </div>

<?php include('footer.php');?>
