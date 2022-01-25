<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
mysqli_set_charset($conn,'utf8');

extract($_POST);
$cne_ = $_POST['cne'];
$sql_et = "SELECT * from etudiant e  join utilisateur u on u.idUtilisateur = e.idUtilisateur where e.cne = '".$_POST["cne"]."'";
$result1_et = $conn->query($sql_et);

  function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }

while($row_et=mysqli_fetch_array($result1_et))
{
extract($row_et);
$idUtilisateur_ = $row_et['idUtilisateur'];
$nom_ = $row_et['nom'];
$prenom_ = $row_et['prenom'];
}

$default_login = strtolower($nom_.$prenom);
$default_password = generateRandomString();
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
                          <form class="form-horizontal" method="POST" action="actions/save_compte.php" name="cneform" >

                             <input type="hidden" class="form-control" name="idUtilisateur" value="<?php echo $idUtilisateur_ ?>" >

                                 <div class="form-group">
                                      <div class="row">
                                          <label class="col-sm-4 control-label text-right">Nom de l'étudiant</label>
                                          <div class="col-sm-8">
                                               <input type="text" class="form-control" value="<?php echo $nom_ ?>" disabled>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                       <div class="row">
                                           <label class="col-sm-4 control-label text-right">Prénom de l'étudiant</label>
                                           <div class="col-sm-8">
                                                <input type="text" class="form-control" value="<?php echo $prenom_ ?>" disabled>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label text-right">Rôle</label>
                                            <div class="col-sm-8">
                                              <select name="idRole" class="form-control"  placeholder="Rôle" required>
                                                  <option value="">--Choisir une rôle--</option>
                                                      <?php
                                                      $m1 = "SELECT * FROM `role`";
                                                      $result = $conn->query($m1);

                                                      if ($result->num_rows > 0) {
                                                          while ($row = mysqli_fetch_array($result)) {?>
                                                              <option value="<?php echo $row["idRole"];?>" <?php if($row["idRole"]==4){echo " selected";}?>>
                                                                  <?php echo $row['nomRole'];?>
                                                              </option>
                                                              <?php
                                                          }
                                                      } else {
                                                      echo "aucun rôle trouvé";
                                                          }
                                                      ?>
                                              </select>                                            </div>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label text-right">Login</label>
                                            <div class="col-sm-8">
                                                 <input type="text" name="login" class="form-control" value="<?php echo $default_login?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <div class="row">
                                             <label class="col-sm-4 control-label text-right">Mot de passe</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="password" class="form-control" value="<?php echo $default_password ?>"   required>
                                             </div>
                                         </div>
                                     </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30 float-right">Ajouter</button>
                            </form>
                          </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>




<?php include('footer.php');?>
