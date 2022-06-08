<?php include "../inc/header.php"; ?>

<?php

$emailErr = '';
$passErr = '';
if (isset($_POST["submit"])) {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $chk = true;
    foreach ($users as $user) {
        if ($user->email == $email) {
            $chk = false;
            if ($user->email == $email && $user->password == $password) {
                $_SESSION["userID"] = $user->id;
                header("location:dashboard.php");
            } else {
                $passErr = "Wrong Password";
            }
        }
    }
    if ($chk) {
        $emailErr = "Email Do Not Exist";
    }
}

?>



<link rel="stylesheet" href="../style/style.css">
<main class="portalPage position-relative" style="overflow-x: hidden;">
    <div class="blackOverlay"></div>
    <div class="page container d-flex align-items-center flex-column justify-content-center" style="height: inherit">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../Assets/img/loginCover.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="POST">

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" style="font-weight: 700;" for="form3Example3">Email address</label>
                            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg <?php echo !$emailErr ? '' : 'is-invalid' ?>" required placeholder="Enter a valid email address" />
                            <div class="invalid-feedback">
                                <?php echo $emailErr; ?>
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" style="font-weight: 700;" for="form3Example4">Password</label>
                            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg <?php echo !$passErr ? '' : 'is-invalid' ?>" required placeholder="Enter password" />
                            <div class="invalid-feedback">
                                <?php echo $passErr; ?>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="link-light">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <input value="Login" type="submit" name="submit" class="btn btn-light btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!" class="link-warning">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
</main>
<?php include "../inc/footer.php"; ?>