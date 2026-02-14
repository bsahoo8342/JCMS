<?php
session_start();
if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
    header("location: a_login.php");
    exit();
}

include '../dbcon.php';
$is = $_SESSION['username'];
$sql = "select * from `advocate_info` where  `a_email` = '$is' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $Name = $row['a_name'];
        $Regd = $row['a_regd'];
        $a = $row['a_phn'];
        $email = $row['a_email'];
        $img = $row['a_path'];
    }
} else {
    echo "Unable to Show your Information";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPROVE RESPONDENT | JCMS</title>
</head>
<style>
.card {
    margin-top: 20px;
    background: hsla(0, 0%, 100%, 0.8);
    backdrop-filter: blur(30px);
    margin-right: 10%;
    margin-left: 10%;

}

.row {
    --bs-gutter-x: 3.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: 1.5rem;
    margin-right: calc(1* var(--bs-gutter-x));
    margin-left: 3.5rem;
}
</style>

<body>
    <?php include 'head.php'; ?>
    <?php include 'a_nav.php'; ?>



    <!-- Main Content -->

    <section class="mb-4">
        <div class="card">
            <div style="background-color:#F4CC4C; text-align: center;">
                <h3 class="p-2">Respondnet Approve Form</h3>

            </div>
            <div class="card-body py-5 px-md-5">
                <!-- form started -->
                <form method="POST">
                    <div class="row">
                        <label for="colFormLabel" class="col-sm-4 col-form-label">Case Type</label>
                        <div class="col-sm-5 mb-2">
                            <select class="form-select" id="casetype" name="casetype" required>
                                <option selected>Choose...</option>
                                <option value="WP(C)">WP(C) - WP(C)-Writ Petition under Art.226 and 227</option>
                                <option value="ABLAPL">ABLAPL - ABLAPL- Anticipatory Bail</option>
                                <option value="CRLMC">CRLMC - CRLMC-Appl.under Sec.482 Cr.P.C</option>
                                <option value="CMAPL">CMAPL - CMAPL-Miscellaneous Applications</option>
                                <option value="CMP">CMP - CMP-Civil Miscellaneous Petition</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="colFormLabel" class="col-sm-4 col-form-label">Case Number</label>
                        <div class="col-sm-5">
                            <input type="number" maxlength="6" class="form-control" id="caseno" placeholder="1234"
                                name="caseno">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="colFormLabel" class="col-sm-4 col-form-label">Year</label>
                        <div class="col-sm-5">
                            <input type="number" maxlength="4" class="form-control" id="year" placeholder="YYYY"
                                name="year">
                        </div>
                    </div>

                    <h5 class="text-center mt-3">Advocate Information:</h5>
                    <div class="mt-4">
                        <div class="row g-3 mb-2">
                            <div class="col-md-6 px-2">
                                <label for="advno" class="form-label">Advocate Registration Number:</label>
                                <input type="text" class="form-control" placeholder="OR022010" id="advno" name="advno"
                                    readonly required>
                            </div>
                            <div class="col-md-6 px-2">
                                <label for="lname" class="form-label">Advocate Name:</label>
                                <input type="text" class="form-control" placeholder="Advocate Name"
                                    aria-label="Advocate name" readonly id="advname" name="advname" required>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-3">
                                <button class="btn btn-warning" type="submit" name="submit">Add as an Advocate</button>
                            </div>
                        </div>
                    </div>


                </form>

                <?php

                if (isset($_POST['submit'])) {
                    $casetype = $_POST['casetype'];
                    $case = $_POST['caseno'];
                    $year = $_POST['year'];
                    $advnm = $_POST['advname'];
                    $advno = $_POST['advno'];

                    $sql1 = "SELECT * FROM `case_info` WHERE `case_type`='$casetype' AND `case_no`='$case' AND `year`='$year' ";
                    $run3 = mysqli_query($con, $sql1);

                    if (mysqli_num_rows($run3) > 0) {
                        while ($r = mysqli_fetch_array($run3)) {
                            global $filingno;
                            $filingno = $r['f_filingno'];
                            $sql2 = "UPDATE `casefiling` SET `r_advname` = '$advnm', `r_advno` = '$advno' WHERE `filingno`='$filingno'";
                            $run4 = mysqli_query($con, $sql2);
                            echo '<div class="alert alert-success alert-dismissible align-items-center fade show text-center" role="alert">
                            <strong>You are Add as an Respondent Advocate Successfully!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    } else {
                        echo '<div class="text-center mt-4" style="color:red;">
                        Please enter correct case Number
                        </div>
                        ';
                    }
                }

                ?>



            </div>
        </div>
    </section>
    <!-- Main Content -->
    <script>
    var advno = document.getElementById('advno');
    var advnm = document.getElementById('advaname');
    advno.onfocus = function() {
        advno.value = "<?php echo $Regd; ?>";
    }
    advname.onfocus = function() {
        advname.value = "<?php echo $Name; ?>";
    }
    </script>

    <?php include 'foot.php'; ?>
</body>

</html>