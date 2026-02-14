<?php
session_start();
if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
    header("location: j_login.php");
    exit();
}

include '../dbcon.php';
$is = $_SESSION['username'];
$sql = "select * from `judge_info` where  `j_email` = '$is' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $Name = $row['j_name'];
        $Regd = $row['j_regd'];
        $a = $row['j_phn'];
        $email = $row['j_email'];
        $img = $row['j_path'];
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

<body>
    <?php include 'head.php'; ?>
    <?php include 'j_nav.php'; ?>


    <div class="container boxtbl">
        <div class="row">
            <div class="col-auto me-auto">
                <h3>Welcome <strong><?php echo $Name; ?></strong></h3>
                <h6 class="d-inline-flex"><strong>Employee ID:</strong><?php echo $Regd; ?> </h6>
            </div>
            <div class="col-2"><img class="round" src="<?php echo $img; ?>" alt="logo" height="100" width="80"></div>
        </div>
    </div>
    <div class="container boxtbl">
        <h3 class="text-center">Table</h3>
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

                $sql = "SELECT * FROM `case_info` WHERE `j_regd` = '$Regd'";
                $runsql = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($runsql)) {
                    $casetype = $row['case_type'];
                    $caseno = $row['case_no'];
                    $year = $row['year'];
                    $filingo = $row['f_filingno'];
                    $case = $caseno . '/' . $year;

                    $sql1 = "SELECT * FROM `casefiling` WHERE `filingno`='$filingo' ";
                    $runsql1 = mysqli_query($con, $sql1);
                    while ($row1 = mysqli_fetch_array($runsql1)) {
                        $party1 = $row1['pname'];
                        $party2 = $row1['rname'];
                        $party = $party1 . ' Vs. ' . $party2;
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