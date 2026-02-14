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
    <title>DASHBOARD | JCMS</title>
</head>
<style>
.round {
    border-radius: 70px;
}
</style>

<body>
    <?php include 'head.php'; ?>
    <?php include 'a_nav.php'; ?>


    <div class="container row boxtbl ">
        <div class="row">
            <div class="col-auto me-auto">
                <h3>Welcome <strong><?php echo $Name; ?></strong></h3>
                <h6 class="d-inline-flex"><strong>Registration No:</strong><?php echo $Regd; ?> </h6>
            </div>
            <div class="col-2"><img class="round" src="<?php echo $img; ?>" alt="logo" height="100" width="80"></div>
        </div>
    </div>
    <div class="container boxtbl">
        <h3 class="text-center">List for date tommorow:</h3>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Case No</th>
                    <th>Parties Name</th>
                    <th>Date</th>
                    <th>Reamark</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM `casefiling` WHERE `advno`= '$Regd' OR `r_advno`='$Regd' ";
                $runsql = mysqli_query($con, $sql);
                while ($row1 = mysqli_fetch_array($runsql)) {
                    $filingo = $row1['filingno'];
                    $party1 = $row1['pname'];
                    $party2 = $row1['rname'];
                    $party = $party1 . ' Vs. ' . $party2;
                    

                $sql2 = "SELECT * FROM `case_info` WHERE `f_filingno` = '$filingo'";
                $runsql1 = mysqli_query($con, $sql2);
                while ($row = mysqli_fetch_array($runsql1)) {

                    $casetype = $row['case_type'];
                    $caseno = $row['case_no'];
                    $year = $row['year'];
                    $case = $caseno . '/' . $year;
                       
                    }


                    $d = strtotime("tomorrow");
                    $t = date("Y-m-d", $d);
                    // echo $t;


                    $sql2 = "SELECT * FROM `case_history` WHERE  `case_no`='$caseno' AND `year`='$year' AND `next_date`='$t' ";
                    $runsql2 = mysqli_query($con, $sql2);
                    $sl = 1;
                    while ($row2 = mysqli_fetch_array($runsql2)) {
                        echo '
                        <tr>
                        <td>' . $sl . '</td>
                        <td>' . $case . '</td>
                        <td>' . $party . '</td>
                        <td>' . $row2['next_date'] . '</td>
                        <td>' . $row2['remark'] . '</td>
                    </tr>
                        ';
                        $sl = $sl + 1;
                    }
                }

                ?>

            </tbody>
        </table>
    </div>

    <?php include 'foot.php'; ?>
</body>

</html>