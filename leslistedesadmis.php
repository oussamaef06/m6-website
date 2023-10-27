<?php

session_start();

include './dashboard/src/html/connexion.php';



// Fetch the last inserted row from the 'listedesadmis' table
$sql = "SELECT * FROM listedesadmis ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Assign values to variables
$titreF = $row['titreF'];
$pdf_dataMCW = base64_encode($row['pdf_dataMCW']);
$pdf_dataCG = base64_encode($row['pdf_dataCG']);
$pdf_dataSE = base64_encode($row['pdf_dataSE']);
$pdf_dataPROD = base64_encode($row['pdf_dataPROD']);
$titreF = $row['titreF'];
$titreMCW = $row['titreMCW'];
$titreCG = $row['titreCG'];
$titreSE = $row['titreSE'];
$titrePROD = $row['titrePROD']; 
function getTimeAgo(){
    if (isset($_SESSION['startTime'])) {
        $startTime = $_SESSION['startTime'];
        $currentTime = time();
        $elapsedTime = $currentTime - $startTime;
        $minutes = round($elapsedTime/60);
        if($minutes < 60){
            echo $minutes . " mins ago";
        }elseif($minutes < 1440){
            $hours = round($minutes / 60);
            echo $hours . " hours ago";
        }else{
            $day = round($minutes / 1440);
            echo $day . " days ago";
        }
    } else {
        echo "Start time not found.";
    }
}  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Les listes des admis</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="pictures1\fav png.png" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <?php  include 'header.php'; ?>
    <!-- Masthead-->
    <div class="container page-section">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mt-0">
                    <?php echo htmlspecialchars($titreF); ?>
                </h2>
                <hr class="divider" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <embed class="card-img-top"
                        src="data:application/pdf;base64,<?php echo htmlspecialchars($pdf_dataMCW); ?>"
                        type="application/pdf" width="100%" height="400px">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($titreMCW); ?>
                        </h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">
                            <?php echo getTimeAgo(); ?>
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <embed class="card-img-top"
                        src="data:application/pdf;base64,<?php echo htmlspecialchars($pdf_dataCG); ?>"
                        type="application/pdf" width="100%" height="400px">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($titreCG); ?>
                        </h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">
                            <?php echo getTimeAgo(); ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <embed class="card-img-top"
                        src="data:application/pdf;base64,<?php echo htmlspecialchars($pdf_dataSE); ?>"
                        type="application/pdf" width="100%" height="400px">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($titreSE); ?>
                        </h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"> 
                            <?php echo getTimeAgo(); ?>
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <embed class="card-img-top"
                        src="data:application/pdf;base64,<?php echo htmlspecialchars($pdf_dataPROD); ?>"
                        type="application/pdf" width="100%" height="400px">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($titrePROD); ?>
                        </h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">
                            <?php echo getTimeAgo(); ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php include 'footer.php'; ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>