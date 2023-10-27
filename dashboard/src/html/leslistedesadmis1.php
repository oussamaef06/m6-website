<?php
session_start();

include 'connexion.php';

if (isset($_POST['submit'])) {
  $titreF = $_POST['titreF'] ?? '';
  $titreMCW = $_POST['titreMCW'] ?? '';
  $titreCG = $_POST['titreCG'] ?? '';
  $titreSE = $_POST['titreSE'] ?? '';
  $titrePROD = $_POST['titrePROD'] ?? '';

  // Assuming 'pdf_dataMCW' is a file input in your form
  $pdf_dataMCW = $_FILES['pdf_dataMCW'];
  $pdf_dataCG = $_FILES['pdf_dataCG'];
  $pdf_dataSE = $_FILES['pdf_dataSE'];
  $pdf_dataPROD = $_FILES['pdf_dataPROD'];

  // We'll just prepare these to be stored as blobs in the DB
  $pdf_dataMCW_data = file_get_contents($pdf_dataMCW['tmp_name']);
  $pdf_dataCG_data = file_get_contents($pdf_dataCG['tmp_name']);
  $pdf_dataSE_data = file_get_contents($pdf_dataSE['tmp_name']);
  $pdf_dataPROD_data = file_get_contents($pdf_dataPROD['tmp_name']);

  // Prepare an insert statement
  $stmt = $conn->prepare("INSERT INTO `listedesadmis` (titreF, pdf_dataMCW, pdf_dataCG, pdf_dataSE, pdf_dataPROD, titreMCW, titreCG, titreSE, titrePROD) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param('sssssssss', $titreF, $pdf_dataMCW_data, $pdf_dataCG_data, $pdf_dataSE_data, $pdf_dataPROD_data, $titreMCW, $titreCG, $titreSE, $titrePROD);

  if ($stmt->execute()) {
    echo "<script>alert('Data inserted successfully');</script>";
  } else {
    echo "<script>alert('Failed to execute statement: " . $stmt->error . "');</script>";
  }
  $_SESSION['startTime'] = time();
  // header('Location: leslistedesadmis.php');
  exit();

}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Les listes des admis</title>
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
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">M6 DASHBOARD</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./home1.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Home</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./Candidature1.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Candidature</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./leslistedesadmis1.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Les liste des admis</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
              <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <!-- form -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Formulaire</h5>
              <div class="card">
                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">
                    <!-- titreF input-->
                    <div class="mb-3">
                      <label for="titreF" class="form-label">titreF :</label>
                      <input type="text" class="form-control" id="titreF" name="titreF">
                    </div>
                    <!-- pdf_dataMCW input-->
                    <div class="mb-3">
                      <label for="pdf_dataMCW" class="form-label">pdf_dataMCW :</label>
                      <input type="file" class="form-control" id="pdf_dataMCW" name="pdf_dataMCW"
                        accept=".pdf,.xlsx,.xls,.ods,.csv">
                    </div>
                    <!-- titreMCW input-->
                    <div class="mb-3">
                      <label for="titreMCW" class="form-label">titreMCW :</label>
                      <input type="text" class="form-control" id="titreMCW" name="titreMCW">
                    </div>
                    <!-- pdf_dataCG input-->
                    <div class="mb-3">
                      <label for="pdf_dataCG" class="form-label">pdf_dataCG :</label>
                      <input type="file" class="form-control" id="pdf_dataCG" name="pdf_dataCG"
                        accept=".pdf,.xlsx,.xls,.ods,.csv">
                    </div>
                    <!-- titreCG input-->
                    <div class="mb-3">
                      <label for="titreCG" class="form-label">titreCG :</label>
                      <input type="text" class="form-control" id="titreCG" name="titreCG">
                    </div>
                    <!-- pdf_dataSE input-->
                    <div class="mb-3">
                      <label for="pdf_dataSE" class="form-label">pdf_dataSE :</label>
                      <input type="file" class="form-control" id="pdf_dataSE" name="pdf_dataSE"
                        accept=".pdf,.xlsx,.xls,.ods,.csv">
                    </div>
                    <!-- titreSE input-->
                    <div class="mb-3">
                      <label for="titreSE" class="form-label">titreSE :</label>
                      <input type="text" class="form-control" id="titreSE" name="titreSE">
                    </div>
                    <!-- pdf_dataPROD input-->
                    <div class="mb-3">
                      <label for="pdf_dataPROD" class="form-label">pdf_dataPROD :</label>
                      <input type="file" class="form-control" id="pdf_dataPROD" name="pdf_dataPROD"
                        accept=".pdf,.xlsx,.xls,.ods,.csv">
                    </div>
                    <!-- titrePROD input-->
                    <div class="mb-3">
                      <label for="titrePROD" class="form-label">titrePROD :</label>
                      <input type="text" class="form-control" id="titrePROD" name="titrePROD">
                    </div>
                    <!-- Submit Button-->
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </form>

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