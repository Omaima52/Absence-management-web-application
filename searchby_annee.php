<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
?>

        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Gestion d'Absence</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ma fiche d'absence</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">

                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="view_mafiche_absence.php" name="anneeform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="">

                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Recherche par année</label>
                                                <div class="col-sm-8">
                                                  <input type="number" name="anneeAbs" class="form-control" placeholder="Saisir une année" required>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Rechercher</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

<?php include('footer.php');?>
