<?php
session_start();
if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
    header("location: s_login.php");
    exit();
}
$f = $_GET['fno'];
if ($f == null) {
    header("location: dashboard.php");
    exit();
}
include '../dbcon.php';
include 'head.php';
include 's_nav.php';
try {
    $sql = "SELECT * FROM `casefiling` WHERE `filingno`='$f'";
    $run = mysqli_query($con, $sql);
    if (mysqli_num_rows($run) > 0) {
        while ($row = mysqli_fetch_assoc($run)) {
            $filingno = $row['filingno'];
            $state = $row['state'];
            $court = $row['court'];
            $casetype = $row['casetype'];
            $date = $row['date'];
            $pname = $row['pname'];
            $pgname = $row['pgname'];
            $page = $row['page'];
            $pgender = $row['pgender'];
            $pnation = $row['pnation'];
            $pcaste = $row['pcaste'];
            $pemail = $row['pemail'];
            $pphn = $row['pphn'];
            $padd = $row['padd'];
            $pcity = $row['pcity'];
            $pstate = $row['pstate'];
            $ppin = $row['ppin'];
            $rname = $row['rname'];
            $rgname = $row['rgname'];
            $rage = $row['rage'];
            $rgender = $row['rgender'];
            $rnation = $row['rnation'];
            $rcaste = $row['rcaste'];
            $radd = $row['radd'];
            $rcity = $row['rcity'];
            $rstate = $row['rstate'];
            $rpin = $row['rpin'];
            $advno = $row['advno'];
            $advname = $row['advname'];
            $fact = $row['fact'];
            $act = $row['act'];
            $section = $row['section'];
            $sts = $row['sts'];
        }
    } else {
        echo "Records not available";
        exit();
    }
} catch (\Throwable $th) {
    echo "Error to Found data";
}

//Admission
if (isset($_POST['admit'])) {
    $caseno = $_POST['caseno'];
    $caseyear = $_POST['caseyear'];
    $regddate = $_POST['rdate'];
    $courtno = $_POST['courtno'];
    $judge = $_POST['judge'];
    $firstdate = $_POST['fdate'];
    $remark = $_POST['remark'];

    $ins1 = "INSERT INTO `case_info` (`slno`, `f_filingno`, `f-date`, `case_type`, `case_no`, `year`, `regd_date`, `j_regd`, `a_regd`, `courtno`) VALUES (NULL, '$filingno', '$date', '$casetype', '$caseno', '$caseyear', '$regddate', '$judge', '$advno', '$courtno')";
    $run1 = mysqli_query($con, $ins1);

    $ins2 = "INSERT INTO `case_history` (`slno`, `case_no`, `year`, `next_date`, `remark`) VALUES (NULL, '$caseno', '$caseyear', '$firstdate', '$remark')";
    $run2 = mysqli_query($con, $ins2);

    $update = "UPDATE `casefiling` SET `verify`='1' WHERE `filingno`='$filingno'";
    $run3 = mysqli_query($con, $update);

    if ($run1 && $run2 && $run3) {

        echo '<div class="alert alert-success alert-dismissible align-items-center fade show text-center" role="alert">
        <strong>Case Admission Successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASE ADMISSION | JCMS</title>
</head>
<style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }

    .me-md-2 {
        margin-right: .5rem;
        margin-top: 4rem;
    }
</style>

<body>


    <section class="gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-9">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="text-align: center;">Case Admission Form</h3>
                            <form action="#" method="POST">

                                <div class="row">

                                    <div class="col-md-6 mb-4">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">Filing no:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" value="<?php echo $filingno; ?>" disabled readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">Adv Regd.</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" value="<?php echo $advno; ?>" disabled readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">Case Type:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" value="<?php echo $casetype; ?>" disabled readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">Filing
                                                date:</label>
                                            <div class="col-sm-7">
                                                <input type="disabled" class="form-control" value="<?php echo $date; ?>" disabled readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container text-center mb-4">

                                    <a href="caseinfo.php?fno=<?php echo $filingno; ?>" class="btn btn-primary">Check
                                        Information</a>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">Case no:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="caseno">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">Year:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="caseyear">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">


                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">Regd date:</label>
                                            <div class="col-sm-7">
                                                <input type="date" class="form-control" name="rdate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">


                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">Court no.:</label>
                                            <div class="col-sm-7">
                                                <input type="number" class="form-control" name="courtno">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">


                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">Judge
                                                Name:</label>
                                            <div class="col-sm-7">
                                                <select class="form-select" name="judge">
                                                    <option selected>Choose...</option>
                                                    <?php
                                                    $sql1 = "SELECT * FROM judge_info";
                                                    $result1 = mysqli_query($con, $sql1);
                                                    while ($row = mysqli_fetch_array($result1)) {
                                                        echo '
                                                    <option value="' . $row['j_regd'] . '">' . $row['j_name'] . '</option>
                                                        ';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 mb-4">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">1st Listing
                                                date:</label>
                                            <div class="col-sm-7">
                                                <input type="date" class="form-control" name="fdate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb-4">
                                        <div class="row">
                                            <label class="col-sm-4 col-form-label">Remark:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="remark">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <button class="btn btn-warning me-md-2" type="submit" name="admit">ADMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'foot.php' ?>
</body>

</html>