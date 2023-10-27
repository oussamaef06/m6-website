<?php
include './dashboard/src/html/connexion.php';

// Fetch the last inserted row from the 'annonce1' table
$sql = "SELECT * FROM annonce1 ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Assign values to variables
$h2premiere = $row['h2premiere'];
$paragraphe = $row['paragraphe'];
$h2deuxieme = $row['h2deuxieme'];
$h2troisieme = $row['h2troisieme'];
$h4premiere = $row['h4premiere'];

// Fetch the last inserted row from the 'admission1' table
// $sql = "SELECT * FROM admission1 ORDER BY id DESC LIMIT 1";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);

// Assign values to variables
$paragrapheF = $row['paragrapheF'];
$paragrapheS = $row['paragrapheS'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Centre des BTS Lycée Mohammed VI</title>
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
    <?php include 'header.php'; ?>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Une bonne éducation est la base d'un avenir meilleur</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Centre BTS Mohammed 6, situé à Marrakech Azli, propose quatre filières
                        de formation professionnelle de qualité.
                    </p>
                    <a class="btn btn-light btn-xl" href="#Annonce">Plus d'informations!</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Annonce-->
    <section class="page-section bg-primary" id="Annonce">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0" name="h2premiere">
                        <?php echo $h2premiere; ?>
                    </h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4" name="paragraphe">
                        <?php echo $paragraphe; ?>
                    </p>
                    <h2 class="text-white mt-3" name="h2deuxiem">
                        <?php echo $h2deuxieme; ?>
                    </h2>
                    <h2 class="text-white mt-3" name="h2troisieme">
                        <?php echo $h2troisieme; ?>
                    </h2>
                    <h4 class="text-white mt-3 mb-5" name="h4premiere">
                        <?php echo $h4premiere; ?>
                    </h4>
                    <a class="btn btn-light btn-xl" href="#Admission">Plus d'informations!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Admission-->
    <section class="page-section" id="Admission">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Admission</h2>
            <hr class="divider" />
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <?php echo $paragrapheF; ?>
                        </p>
                        <strong>
                            <p class="font-weight-bold">
                                <?php echo $paragrapheS; ?>
                            </p>
                        </strong>
                    </div>
                    <div class="col-md-6">
                        <img src="pictures1\EmbeddedImage.jpg" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>
    </section>
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