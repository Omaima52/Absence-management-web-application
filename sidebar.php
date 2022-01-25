
        <div class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <?php if(($_SESSION["idRole"] == 1) || ($_SESSION["idRole"] == 2)){?>
                        <li class="nav-label  mt-2">Stats</li>
                        <li> <a href="index.php" aria-expanded="false"><i class="fa fa-tachometer"></i>Dashboard</a>
                        </li>
                      <li class="nav-label  mt-2">Pédagogie</li>
                       <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-folder-open"></i><span class="hide-menu">Gestion des Filières</span></a>
                           <ul aria-expanded="false" class="collapse">
                               <li><a href="add_filiere.php">Ajouter une filière</a></li>
                               <li><a href="view_filiere.php">Consulter les filières</a></li>
                           </ul>
                       </li>
                       <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-map-signs"></i><span class="hide-menu">Gestion des Niveaux</span></a>
                           <ul aria-expanded="false" class="collapse">
                               <li><a href="add_niveau.php">Ajouter un niveau</a></li>
                               <li><a href="view_niveau.php">Consulter les niveaus</a></li>
                           </ul>
                       </li>
                       <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cube"></i><span class="hide-menu">Gestion des Modules</span></a>
                           <ul aria-expanded="false" class="collapse">
                               <li><a href="add_module.php">Ajouter un module</a></li>
                               <li><a href="view_module.php">Consulter les modules</a></li>
                           </ul>
                       </li>
                       <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cubes"></i><span class="hide-menu">Gestion des Matières</span></a>
                           <ul aria-expanded="false" class="collapse">
                               <li><a href="add_matiere.php">Ajouter une matière</a></li>
                               <li><a href="view_matiere.php">Consulter les matières</a></li>
                           </ul>
                       </li>
                       <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-briefcase"></i><span class="hide-menu">Gestion des Coordinations</span></a>
                           <ul aria-expanded="false" class="collapse">
                               <li><a href="add_coordination.php">Ajouter une Coordination</a></li>
                               <li><a href="view_coordination.php">Consulter les Coordinations</a></li>
                           </ul>
                       </li>

                    <?php } ?>
                    <?php if($_SESSION["idRole"] == 1){?>
                      <li class="nav-label  mt-2">COMPTES & USERS</li>
                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-lock"></i><span class="hide-menu">Gestion des comptes</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="searchby_cne_cin.php">Ajouter un compte</a></li>
                            <li><a href="view_compte.php">Consulter les comptes</a></li>

                        </ul>

                    </li>
                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Gestion des Enseignants</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="add_enseignant.php">Ajouter un enseignant</a></li>
                            <li><a href="view_enseignant.php">Consulter les enseignants</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Gestion des Etudiants</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="add_etudiant.php">Ajouter un étudiant</a></li>
                            <li><a href="view_etudiant.php">Consulter les étudiants</a></li>
                        </ul>
                    </li>
                    <?php } ?>

                     <li class="nav-label mt-2">Absence</li>
                      <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Gestion d'Absence</span></a>
                          <ul aria-expanded="false" class="collapse">
                            <?php if($_SESSION["idRole"] != 4){?>
                              <li><a href="searchby_niveau.php">Contrôler l'absence</a></li>
                              <li><a href="searchby_cne.php">Fiche d'absence</a></li>
                              <?php } ?>
                              <?php if($_SESSION["idRole"] == 4){?>
                              <li><a href="view_mes_absences.php">Mes absences</a></li>
                              <li><a href="searchby_annee.php">Ma fiche d'absence</a></li>
                              <?php } ?>
                          </ul>
                      </li>

                </nav>
    </div>

        </div>
