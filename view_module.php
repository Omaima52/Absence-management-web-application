
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

if(isset($_GET['idModule']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Confirmation
    </h1>
    <p>Voulez-vous supprimer ce module?</p>
    <p>
      <a href="del_module.php?idModule=<?php echo $_GET['idModule']; ?>" class="button button--success" data-for="js_success-popup">Oui</a>
      <a href="view_module.php" class="button button--error" data-for="js_success-popup">Non</a>
    </p>
  </div>
</div>
<?php } ?>



        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Consulter les modules</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Consulter les modules</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                 <div class="card">
                            <div class="card-body">
                              <!--?php if(isset($useroles)){  if(in_array("add_subject",$useroles)){ ?-->
                            <a href="add_niveau.php"><button class="btn btn-primary">Ajouter un module</button></a>
                          <!--?php } } ?-->
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Code</th>
                                                <th>Niveau</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    include 'connect.php';

                                  $sql1 = "SELECT * FROM  `module` m Join `niveau` n On m.IdNiveau = n.IdNiveau";
                                   $result1 = $conn->query($sql1);
                                   while($row = $result1->fetch_assoc()) {


                                      ?>
                                            <tr>
                                                <td><?php echo $row['titre']; ?></td>
                                                <td><?php echo $row['code']; ?></td>
                                                <td><?php echo $row['alias']; ?></td>

                                                <td class="text-center">
            <!--?php if(isset($useroles)){  if(in_array("edit_niveau",$useroles)){ ?-->
                                                <a href="edit_module.php?idModule=<?=$row['idModule'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-edit"></i></button></a>
                                              <!--?php } } ?-->

            <!--?php if(isset($useroles)){  if(in_array("delete_niveau",$useroles)){ ?-->
                                                <a href="view_module.php?idModule=<?=$row['idModule'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>
                                              <!--?php } } ?-->

                                                </td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


<?php include('footer.php');?>

<link rel="stylesheet" href="css/popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Succés
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Fermer</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Erreur
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Fermer</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
