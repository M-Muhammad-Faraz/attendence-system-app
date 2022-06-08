<?php
$attendenceSubmit = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['markAttendence'])) {
        $usr->markAttendence(date("j M,Y"), "P", "");
        $attendenceSubmit = true;
    } elseif (isset($_POST['markLeave'])) {
        $showModal = true;
    } elseif (isset($_POST['viewAttendence'])) {
        header("location:../extras/attendence.php");
    } elseif (isset($_POST['reason'])) {
        $reason = $_POST["res"];
        $usr->markLeave(date("j M,Y"), "L", $reason);
        $attendenceSubmit = true;
    } elseif (isset($_POST['changes'])) {
        $usr->class = $_POST["class"];
        $usr->section = $_POST["section"];
        $usr->Grade = $_POST["grade"];
    }
}

$studentInfo = $usr->getTotalAttendence();
?>

<main class="container">
    <div class="row">
        <div class="col d-flex flex-column justify-content-between">
            <div class="text-heading2 text-center">
                Student Details
            </div>
            <div class="d-flex justify-content-center">
                <div class="profile"><img src="../Assets/img/portalBackground.jpg" alt=""></div>
            </div>

            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="class">Class</label>
                                    <input type="text" class="form-control" value="<?php echo $usr->class ?>" name="class" id="class">
                                    <label for="section">Section</label>
                                    <input type="text" class="form-control" value="<?php echo $usr->section ?>" name="section" id="section">
                                    <label for="grade">Grade</label>
                                    <input type="text" class="form-control" value="<?php echo $usr->Grade ?>" name="grade" id="grade">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="changes" class="btn btn-primary">Send Leave</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end align-items-center">
                <button data-bs-toggle="modal" data-bs-target="#myModal2" class="edit btn btn-light d-flex align-items-center"><span><b>Edit Profile</b></span> <span class="mx-2 lnr lnr-cog"></span></button>
            </div>
            <div>
                <table class="table">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th class="text-center" colspan="2">Student Information</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($usr->getStudentData() as $infoKey => $infoValue) : ?>
                            <tr>
                                <th><?php echo $infoKey ?></th>
                                <td><?php echo $infoValue ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="reason">Submit Reason For Leave</label>
                                    <input type="text" class="form-control" name="res" id="reason">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="reason" class="btn btn-primary">Send Leave</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-heading2 text-center">
                Status
            </div>
            <div class="row">
                <div class="col text-center"><b>Day & Date</b></div>
                <div class="col text-center"><b>Attendence</b></div>
            </div>
            <div class="row">
                <div class="date col">
                    <div class="row">
                        <div class="col"><b>Day</b></div>
                        <div class="col"><b>Date</b></div>
                    </div>
                    <div class="row">
                        <div class="col"><?php echo date("l") ?></div>
                        <div class="col">
                            <?php echo date("d M Y") ?>
                        </div>

                    </div>
                </div>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="btns col">
                    <button type="submit" name="markAttendence" class="btn btn-success <?php echo $attendenceSubmit ? "disabled" : "" ?>">Mark Attendence</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-warning <?php echo $attendenceSubmit ? "disabled" : "" ?>">Mark Leave</button>
                    <button type="submit" name="viewAttendence" class="btn btn-primary">View Attendence</button>
                </form>
            </div>
            <div class="attendence">
                <table class="table">
                    <tr class="bg-dark text-light">
                        <th class="">Date</th>
                        <th class="">Attendence</th>
                        <th class="">Reason</th>
                    </tr>
                    <?php foreach ($studentInfo as $date => $value) : ?>
                        <?php foreach ($value as $attend => $reas) : ?>
                            <tr>
                                <td class=""><?php echo $date ?></td>
                                <td class=""><?php echo $attend ?></td>
                                <td class=""><?php echo $reas ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endforeach ?>
                </table>
            </div>
        </div>


    </div>
    </div>
</main>