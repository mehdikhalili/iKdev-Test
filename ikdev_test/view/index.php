<?php 
require_once '../modal/AdminDB.php';
?>

<!DOCTYPE html>
<html lang="fr">

  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ikDev Test</title>
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/4291810b13.js" crossorigin="anonymous"></script>

    <link href="css/sb-admin-2.css" rel="stylesheet">

    <script src="js/sb-admin-2.js"></script>

    <!-- Stocker les informations de la base de donneés sur des varriables JS -->
    <script>

      // importer les catégories
      var ListeCategories = [];
      <?php 
      $i = 0;
      foreach (AdminDB::getAllCategories() as $categorie) {
      ?>
      ListeCategories[<?php echo $i; ?>] = "<?php echo $categorie; ?>";
      <?php 
        $i++;
      }
      ?>

      // importer tous les objets
      var ListeObjets = [];
      <?php 
      $i = 0;
      foreach (AdminDB::getAllObjets(null) as $objet) {
      ?>
      var Objet = {
        id : <?php echo $objet->getId(); ?>,
        nom : "<?php echo $objet->getNom(); ?>",
        volume_m3 : <?php echo $objet->getVolume_m3(); ?>,
        categorie : "<?php echo $objet->getCategorie(); ?>",
        img : "<?php echo $objet->getImg(); ?>"
      };
      ListeObjets[<?php echo $i; ?>] = Objet;
      <?php 
        $i++;
      }
      ?>
      
    </script>

    <script src="js/index.js"></script>

  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="javascript:void(0)">
          <div class="sidebar-brand-icon">
            <i class="fas fa-project-diagram"></i>
          </div>
          <div class="sidebar-brand-text mx-3">ikDev test</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div id="" class="sidebar-heading mb-2">
          catégories
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand-sm navbar-light bg-white topbar mb-4 static-top shadow row d-flex">

            <!-- Search Form -->
            <input id="recherche_input" class="col form-control mr-sm-2 ml-4" type="text" placeholder="Tapez le nom d'un objet...">

            <!-- Volume Form-->
            <div class="col-8 form-inline">
              <div class="ml-auto">
                <span class="text-uppercase font-weight-bold mr-2">
                  Volume total estimé : 
                </span>

                <kbd class="mr-4 p-2">
                  <span id="volume_txt">0.00</span> m<sup>3</sup>
                </kbd>

                <input id="volume_input" type="number" name="volume_m3" value="0" hidden>

                <!-- Valider Button -->
                <button class="btn btn-info mr-2" id="valider_btn">Valider</button>

                <!-- Remise à ZERO Button -->
                <button class="btn btn-secondary" id="remise_btn">Remise à zéro</button>
              </div>
            </div>

          </nav>
          <!-- End of Topbar -->

          <!-- Liste des objets -->
          <div class="row mx-3" id="listeObjets">

            <!-- Object Card -->
            
          </div>
          <!-- End of Liste des objets -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; <b>Mehdi Khalili</b> 2020</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

  </body>
  
</html>