<?php include "../Inc/header.php";
$usr = null;
if (isset($_SESSION["userID"])) {
    foreach ($users as $user) {

        $temp = $user->id;
        if ($_SESSION["userID"] == $temp) {
            $usr = $user;
        }
    }
}
$studentAttendence = $usr->getTotalAttendence();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["goback"])) {
        header("location:../pages/dashboard.php");
    }
}

?>
<div class="container my-3">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input class="btn btn-dark" type="submit" name="goback" value="Go Back">
    </form>

    <h1>Attendence Sheet</h1>
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Status</th>
            <th>Reason</th>
        </tr>
        <?php foreach ($studentAttendence as $date => $value) : ?>
            <?php foreach ($value as $attend => $reas) : ?>
                <tr>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $attend; ?></td>
                    <td><?php echo $reas; ?></td>
                </tr>
            <?php endforeach ?>
        <?php endforeach ?>
    </table>

</div>


<?php include "../Inc/footer.php"
?>