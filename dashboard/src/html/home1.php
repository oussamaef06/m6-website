<?php
include 'connexion.php';

// Set initial values or retrieve from the database
$h2premiere = $currentValueH2premiere = "Default H2premiere";
$paragraphe = $currentValueParagraphe = "Default Paragraphe";
$h2deuxieme = $currentValueH2deuxieme = "Default H2deuxieme";
$h2troisieme = $currentValueH2troisieme = "Default H2troisieme";
$h4premiere = $currentValueH4premiere = "Default H4premiere";
$paragrapheF = $currentValueParagrapheF = "Default ParagrapheF";
$paragrapheS = $currentValueParagrapheS = "Default ParagrapheS";

if (isset($_POST['submit'])) {
    $h2premiere = $_POST['h2premiere'] ?? $currentValueH2premiere;
    $paragraphe = $_POST['paragraphe'] ?? $currentValueParagraphe;
    $h2deuxieme = $_POST['h2deuxieme'] ?? $currentValueH2deuxieme;
    $h2troisieme = $_POST['h2troisieme'] ?? $currentValueH2troisieme;
    $h4premiere = $_POST['h4premiere'] ?? $currentValueH4premiere;
    $paragrapheF = $_POST['paragrapheF'] ?? $currentValueParagrapheF;
    $paragrapheS = $_POST['paragrapheS'] ?? $currentValueParagrapheS;

    $stmt = $conn->prepare("INSERT INTO `annonce1` (h2premiere, paragraphe, h2deuxieme, h2troisieme, h4premiere, paragrapheF, paragrapheS) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $h2premiere, $paragraphe, $h2deuxieme, $h2troisieme, $h4premiere, $paragrapheF, $paragrapheS);

    if ($stmt->execute()) {
        echo "<script>alert('Données insérées avec succès');</script>";
    } else {
        echo "<script>alert('Échec de l'exécution de l'instruction " . $stmt->error . "');</script>";
    }
}
?>

<!-- home -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon1.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
        data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
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
                <?php include('slidebar.php');  ?>
                <!-- End Sidebar scroll-->
            </div>
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
                                <div class="card-body" id="Annonce">
                                    <form method="post">
                                        <!-- h2premiere input-->
                                        <div class="mb-3">
                                            <label for="h2premiere" class="form-label">Le premier ligne :</label>
                                            <textarea type="text" id="h2premiere" class="form-control"
                                                name="h2premiere">
                                                <?php echo isset($_POST['h2premiere']) ? $_POST['h2premiere'] : ''; ?></textarea>
                                        </div>
                                        <!-- paragraphe input-->
                                        <div class="mb-3">
                                            <label for="paragraphe" class="form-label">paragraphe :</label>
                                            <textarea type="text" id="paragraphe" class="form-control"
                                                name="paragraphe">
                                                <?php echo isset($_POST['paragraphe']) ? $_POST['paragraphe'] : ''; ?></textarea>
                                        </div>
                                        <!-- h2deuxieme input-->
                                        <div class="mb-3">
                                            <label for="h2deuxieme" class="form-label">Le deuxième titre :</label>
                                            <textarea type="text" id="h2deuxieme" class="form-control"
                                                name="h2deuxieme">
                                                <?php echo isset($_POST['h2deuxieme']) ? $_POST['h2deuxieme'] : ''; ?></textarea>
                                        </div>
                                        <!-- h2troisieme input-->
                                        <div class="mb-3">
                                            <label for="h2troisieme" class="form-label">Le troisieme titre :</label>
                                            <textarea type="text" id="h2troisieme" class="form-control"
                                                name="h2troisieme">
                                                <?php echo isset($_POST['h2troisieme']) ? $_POST['h2troisieme'] : ''; ?></textarea>
                                        </div>
                                        <!-- h4premiere input-->
                                        <div class="mb-3">
                                            <label for="h4premiere" class="form-label">Le quatrième titre :</label>
                                            <textarea type="text" id="h4premiere" class="form-control"
                                                name="h4premiere"><?php echo isset($_POST['h4premiere']) ? $_POST['h4premiere'] : ''; ?></textarea>
                                        </div>
                                        <!-- paragrapheF input-->
                                        <div class="mb-3">
                                            <label for="paragrapheF" class="form-label">Les documents nécéssaire :</label>
                                            <textarea type="text" id="paragrapheF" class="form-control"
                                                name="paragrapheF"><?php echo isset($_POST['paragrapheF']) ? $_POST['paragrapheF'] : ''; ?></textarea>
                                        </div>
                                        <!-- paragrapheS input-->
                                        <div class="mb-3">
                                            <label for="paragrapheS" class="form-label">Frais d'inscription :</label>
                                            <textarea type="text" id="paragrapheS" class="form-control"
                                                name="paragrapheS"><?php echo isset($_POST['paragrapheS']) ? $_POST['paragrapheS'] : ''; ?></textarea>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  End Main wrapper -->
        <!--  Scripts -->
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <!--  simplebar js -->
        <script src="../assets/plugins/simplebar/js/simplebar.js"></script>
        <!-- Chart JS -->
        <script src="../assets/plugins/Chart.js/Chart.min.js"></script>
        <!--  Custom scripts -->
        <script src="../assets/js/main.min.js"></script>
        <script src="../assets/js/custom.js"></script>
</body>

</html>