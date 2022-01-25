
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

if(isset($_GET['idCoordination']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Confirmation
    </h1>
    <p>Voulez-vous supprimer cette coordination?</p>
    <p>
      <a href="del_coordination.php?idCoordination=<?php echo $_GET['idCoordination']; ?>" class="button button--success" data-for="js_success-popup">Oui</a>
      <a href="view_coordination.php" class="button button--error" data-for="js_success-popup">Non</a>
    </p>
  </div>
</div>
<?php } ?>



        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Consulter les coordinations</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Consulter les coordinations</li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">

                 <div class="card">
                            <div class="card-body">
                            <a href="add_coordination.php"><button class="btn btn-primary">Ajouter une coordination</button></a>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Filière</th>
                                                <th>Coordonnateur</th>
                                                <th>Date de début</th>
                                                <th>Date de fin</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    include 'connect.php';

                                  $sql1 = "SELECT * FROM  `coordination` c Join `filiere` f On c.IdFiliere = f.IdFiliere Join `utilisateur` u On c.IdUtilisateur = u.IdUtilisateur";
                                   $result1 = $conn->query($sql1);
                                   while($row = $result1->fetch_assoc()) {


                                      ?>
                                            <tr>
                                                <td><?php echo $row['titreFiliere']; ?></td>
                                                <td><?php echo $row['nom'];echo " "; echo $row['prenom']; ?></td>
                                                <td><?php echo date("Y-m-d", strtotime($row['dateDebut'])); ?></td>
                                                <td><?php echo date("Y-m-d", strtotime($row['dateFin'])); ?></td>

                                                <td class="text-center">
                                                <a href="edit_coordination.php?idCoordination=<?=$row['idCoordination'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-edit"></i></button></a>
                                                <a href="view_coordination.php?idCoordination=<?=$row['idCoordination'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>

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
