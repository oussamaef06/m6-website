<?php
include 'connexion.php';

$titreF = $currentValuetitreF = "Default titre";

if (isset($_POST['submit'])) {
    $titreF = $_POST['titreF'] ?? '';

    $stmt = $conn->prepare("INSERT INTO `candidature` (titreF) VALUES (?)");
    $stmt->bind_param('s', $titreF);
    if ($stmt->execute()) {
        echo "<script>alert('Données insérées avec succès');</script>";
    } else {
        echo "<script>alert('Échec de l'exécution de l'instruction : " . $stmt->error . "');</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Candidature</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon1.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/favicon1.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
          <?php include('slidebar.php'); ?>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php include('headerStart.php'); ?>
      <!--  Header End -->
      <!-- form -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Formulaire</h5>
              <div class="card">
                <div class="card-body">
                  <form method="POST">
                    <!-- titreF input-->
                    <div class="mb-3">
                      <label for="titreF" class="form-label">titreF :</label>
                      <textarea type="text" id="titreF" class="form-control" name="titreF">
                        <?php echo isset($_POST['titreF']) ? $_POST['titreF'] : ''; ?>
                      </textarea>
                    </div>
                    <!-- Submit Button-->
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>