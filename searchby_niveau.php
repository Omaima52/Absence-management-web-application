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
                    <h3 class="text-primary">Gestion d'Absence</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Contrôler les absences</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">

                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="add_absence.php" name="niveauform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="">

                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-4 control-label text-right">Recherche par niveau</label>
                                                <div class="col-sm-8">
                                                    <select type="text" name="idNiveau" class="form-control mt-2"  placeholder="Niveau" required>
                                                        <option value="">--Choisir un niveau--</option>
                                                            <?php
                                                            $n1 = "SELECT * FROM `niveau`";
                                                            $result = $conn->query($n1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["idNiveau"];?>">
                                                                        <?php echo $row['alias'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "aucun niveau trouvé";
                                                                }
                                                            ?>
                                                    </select>
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
