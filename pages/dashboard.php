<link rel="stylesheet" href="../style/style.css">
<?php include '../Inc/header.php';
$usr = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logout'])) {
        session_destroy();
        header("location:../index.php");
    }
}
if (isset($_SESSION["userID"])) :
?>

    <?php
    foreach ($users as $user) {

        $temp = $user->id;
        if ($_SESSION["userID"] == $temp) {
            $usr = $user;
        }
    }
    ?>
    <nav class="bg-dark py-2 text-light">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="profile small mx-3"><img src="../Assets/img/portalBackground.jpg" alt=""></div>
                <div class="text-heading3">Welcome! <?php echo $usr->getName() ?></div>
            </div>

            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="d-flex align-items-center">
                <button class="btn btn-light" name="logout" type="submit"><span>Logout</span> <span class=" mx-2 lnr lnr-exit"></span></button>
            </form>
        </div>
    </nav>
<?php

    $usertype = $usr->userAccount;
    if ($usertype == "Student") {

        include "../dashboards/student_dashboard.php";
    } else {
        include "../dashboards/teacher_dashboard.php";
    }
endif
?>


<nav>Hello</nav>


<?php include '../Inc/footer.php' ?>