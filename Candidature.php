<?php
include './dashboard/src/html/connexion.php';

// Fetch the last inserted row from the 'candidature' table
$sql = "SELECT * FROM candidature ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Assign values to variables
$titreF = $row['titreF'];
// Check if the form is submitted
if (isset($_POST['submit1'])) {
    // Retrieve form data
    $code_massar = $_POST['code_massar'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $date_de_naissance = $_POST['date_de_naissance'] ?? '';
    $note_de_bac = $_POST['note_de_bac'] ?? '';
    $direction_provinciale = $_POST['direction_provinciale'] ?? '';
    $academie = $_POST['academie'] ?? '';
    $type_de_bac = $_POST['type_de_bac'] ?? '';
    $fillier_demandee_1er_choix = $_POST['fillier_demandee_1er_choix'] ?? '';
    $fillier_demandee_2eme_choix = $_POST['fillier_demandee_2eme_choix'] ?? '';
    $fillier_demandee_3eme_choix = $_POST['fillier_demandee_3eme_choix'] ?? '';
    $fillier_demandee_4eme_choix = $_POST['fillier_demandee_4eme_choix'] ?? '';

    // Upload image files
    $bac = $_FILES['bac']['name'];
    $bac_tmp = $_FILES['bac']['tmp_name'];
    $bac_type = $_FILES['bac']['type'];

    $releve_de_note = $_FILES['releve_de_note']['name'];
    $releve_de_note_tmp = $_FILES['releve_de_note']['tmp_name'];
    $releve_de_note_type = $_FILES['releve_de_note']['type'];

    $cin = $_FILES['cin']['name'];
    $cin_tmp = $_FILES['cin']['tmp_name'];
    $cin_type = $_FILES['cin']['type'];

    $fiche_de_candidature = $_FILES['fiche_de_candidature']['name'];
    $fiche_de_candidature_tmp = $_FILES['fiche_de_candidature']['tmp_name'];
    $fiche_de_candidature_type = $_FILES['fiche_de_candidature']['type'];

    // Get the image data
    $bacContent = addslashes(file_get_contents($bac_tmp));
    $releve_de_noteContent = addslashes(file_get_contents($releve_de_note_tmp));
    $cinContent = addslashes(file_get_contents($cin_tmp));
    $fiche_de_candidatureContent = addslashes(file_get_contents($fiche_de_candidature_tmp));

    // Prepare the SQL statement with image data
    $stmt = $conn->prepare("INSERT INTO `candidat1` (code_massar, prenom, nom, date_de_naissance, note_de_bac, direction_provinciale, academie, type_de_bac, fillier_demandee_1er_choix, fillier_demandee_2eme_choix, fillier_demandee_3eme_choix, fillier_demandee_4eme_choix, bac, releve_de_note, cin, fiche_de_candidature) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssssssssss', $code_massar, $prenom, $nom, $date_de_naissance, $note_de_bac, $direction_provinciale, $academie, $type_de_bac, $fillier_demandee_1er_choix, $fillier_demandee_2eme_choix, $fillier_demandee_3eme_choix, $fillier_demandee_4eme_choix, $bacContent, $releve_de_noteContent, $cinContent, $fiche_de_candidatureContent);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Failed to execute statement: " . $stmt->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="text-black mt-0" name="titreF">
                        <?php echo $titreF; ?>
                    </h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Dépôt de candidature pour l'accès en 1ère année du BTS au Centre des
                        BTS Lycée Mohammed VI Marrakech. Une adresse mail Gmail est nécessaire pour pouvoir envoyer
                        les fichiers joints.</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <form id="contactForm" method="post" enctype="multipart/form-data">
                        <!-- Code Massar input-->
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control" id="codeInput" type="text" name="code_massar"
                                required />
                            <label for="codeInput">Code Massar</label>
                        </div>
                        <!-- Prénom input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="firstNameInput" type="text" readonly name="prenom" />
                            <label for="firstNameInput">Prénom</label>
                        </div>
                        <!-- Nom input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="lastNameInput" type="text" readonly name="nom" />
                            <label for="lastNameInput">Nom</label>
                        </div>
                        <!-- Date naissance input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="birthdateInput" type="text" readonly
                                name="date_de_naissance" />
                            <label for="birthdateInput">Date de naissance</label>
                        </div>
                        <!-- Note de bac input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="bacNoteInput" type="text" readonly name="note_de_bac" />
                            <label for="bacNoteInput">Note de bac</label>
                        </div>
                        <!-- Direction provinciale input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="directionInput" type="text" readonly
                                name="direction_provinciale" />
                            <label for="directionInput">Direction provinciale</label>
                        </div>
                        <!-- Academie input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="academieInput" type="text" readonly name="academie" />
                            <label for="academieInput">Académie</label>
                        </div>
                        <!-- Type de bac input -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="bacTypeInput" type="text" onchange="updateProgramChoices()"
                                readonly name="type_de_bac" />
                            <label for="bacTypeInput">Type de bac</label>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-xl mb-3" id="submitButton" type="submit"
                                name="submit">Remplir</button>
                        </div>
                        <!-- Filière demandée - 1er Choix -->
                        <p class="text-primary">Filière demandée - 1<sup>ère</sup> Choix</p>
                        <div class="text-right">
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_1er_choix"
                                    id="flexRadioDefault1_1" value="MCW">
                                <label class="form-check-label" for="flexRadioDefault1_1">
                                    MCW (Multimédia et Conception Web)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_1er_choix"
                                    id="flexRadioDefault1_2" value="CG">
                                <label class="form-check-label" for="flexRadioDefault1_2">
                                    CG (Comptabilité et Gestion)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_1er_choix"
                                    id="flexRadioDefault1_3" value="SE">
                                <label class="form-check-label" for="flexRadioDefault1_3">
                                    SE (Système Electronique)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_1er_choix"
                                    id="flexRadioDefault1_4" value="PROD">
                                <label class="form-check-label" for="flexRadioDefault1_4">
                                    PROD (Productique)
                                </label>
                            </div>
                        </div>
                        <!-- Filière demandée - 2eme Choix-->
                        <p class="text-primary">Filière demandée - 2<sup>ème</sup> Choix</p>
                        <div class="text-right">
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_2eme_choix"
                                    id="flexRadioDefault2_1" value="MCW">
                                <label class="form-check-label" for="flexRadioDefault2_1">
                                    MCW (Multimédia et Conception Web)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_2eme_choix"
                                    id="flexRadioDefault2_2" value="CG">
                                <label class="form-check-label" for="flexRadioDefault2_2">
                                    CG (Comptabilité et Gestion)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_2eme_choix"
                                    id="flexRadioDefault2_3" value="SE">
                                <label class="form-check-label" for="flexRadioDefault2_3">
                                    SE (Système Electronique)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_2eme_choix"
                                    id="flexRadioDefault2_4" value="PROD">
                                <label class="form-check-label" for="flexRadioDefault2_4">
                                    PROD (Productique)
                                </label>
                            </div>
                        </div>
                        <!-- Filière demandée - 3eme Choix-->
                        <p class="text-primary">Filière demandée - 3<sup>ème</sup> Choix</p>
                        <div class="text-right">
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_3eme_choix"
                                    id="flexRadioDefault3_1" value="MCW">
                                <label class="form-check-label" for="flexRadioDefault3_1">
                                    MCW (Multimédia et Conception Web)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_3eme_choix"
                                    id="flexRadioDefault3_2" value="CG">
                                <label class="form-check-label" for="flexRadioDefault3_2">
                                    CG (Comptabilité et Gestion)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_3eme_choix"
                                    id="flexRadioDefault3_3" value="SE">
                                <label class="form-check-label" for="flexRadioDefault3_3">
                                    SE (Système Electronique)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_3eme_choix"
                                    id="flexRadioDefault3_4" value="PROD">
                                <label class="form-check-label" for="flexRadioDefault3_4">
                                    PROD (Productique)
                                </label>
                            </div>
                        </div>
                        <!-- Filière demandée - 4eme Choix-->
                        <p class="text-primary">Filière demandée - 4<sup>ème</sup> Choix</p>
                        <div class="text-right">
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_4eme_choix"
                                    id="flexRadioDefault4_1" value="MCW">
                                <label class="form-check-label" for="flexRadioDefault4_1">
                                    MCW (Multimédia et Conception Web)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_4eme_choix"
                                    id="flexRadioDefault4_2" value="CG">
                                <label class="form-check-label" for="flexRadioDefault4_2">
                                    CG (Comptabilité et Gestion)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_4eme_choix"
                                    id="flexRadioDefault4_3" value="SE">
                                <label class="form-check-label" for="flexRadioDefault4_3">
                                    SE (Système Electronique)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input program-choice" type="radio" name="fillier_demandee_4eme_choix"
                                    id="flexRadioDefault4_4" value="PROD">
                                <label class="form-check-label" for="flexRadioDefault4_4">
                                    PROD (Productique)
                                </label>
                            </div>
                        </div>
                        <!-- Copie de Bac input-->
                        <p class="text-primary">Copie de Bac<br> Copie (légalisée) du Baccallauréat. Fichier au
                            format pdf ou jpg ne dépassant pas 1 Mo et lisible</p>
                        <div class="mb-3 filiere">
                            <label for="formFileBac" class="form-label"></label>
                            <input class="form-control" type="file" id="formFileBac" name="bac">
                        </div>
                        <!-- Copie de Relevé de notes input-->
                        <p class="text-primary">Copie de Relevé de notes<br> Copie (légalisée) du Baccalauréat.
                            Fichier au format pdf ou jpg ne dépassant pas 1 Mo et lisible</p>
                        <div class="mb-3 filiere">
                            <label for="formFileReleve" class="form-label"></label>
                            <input class="form-control" type="file" id="formFileReleve" name="releve_de_note">
                        </div>
                        <!-- Copie de CIN input-->
                        <p class="text-primary">Copie de CIN<br> Copie (légalisée) du Baccalauréat. Fichier au
                            format pdf ou jpg ne dépassant pas 1 Mo et lisible</p>
                        <div class="mb-3 filiere">
                            <label for="formFileCIN" class="form-label"></label>
                            <input class="form-control" type="file" id="formFileCIN" name="cin">
                        </div>
                        <!-- Copie Fiche de Candidature input-->
                        <p class="text-primary">Copie Fiche de Candidature<br> Copie (légalisée) du Baccalauréat.
                            Fichier au format pdf ou jpg ne dépassant pas 1 Mo et lisible</p>
                        <div class="mb-3 filiere">
                            <label for="formFileCandidature" class="form-label"></label>
                            <input class="form-control" type="file" id="formFileCandidature" name="fiche_de_candidature">
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-xl mb-3" id="submitButton" type="submit"
                                name="submit1">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="app.js"></script>
    <script src="choix.js"></script>
</body>

</html>
