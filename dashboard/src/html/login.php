<?php
session_start();

// Check if the login form is submitted
if (isset($_POST['submit'])) {
    // Get the submitted email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email and password are correct
    // You would need to implement your own logic here to validate the login credentials
    if ($email === 'example@example.com' && $password === 'password') {
        // Login successful
        $_SESSION['email'] = $email;
        header('Location: home1.php'); // Redirect to the welcome page
        exit();
    } else {
        // Login failed
        echo $error = '<h3 class = "text-danger text-center">Invalid email or password</h3>';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon1.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/favicon1.png" width="70" alt="">
                </a>
                <p class="text-center">Centre des BTS Lycée Mohammed VI</p>
                <form id="loginForm" method="POST" action="">
                  <!-- Email input-->
                  <div class="mb-3">
                    <label for="email" class="form-label">address email</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required>
                  </div>
                  <!-- Password input-->
                  <div class="mb-4">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                  </div>
                  <!-- Submit Button-->
                  <div class="d-grid"><button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="submit" type="submit">Login</button></div>
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
</body>

</html>