<?php
session_start();
if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
    header("location: j_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Cases | JCMS</title>
</head>

<body>
    <?php include 'head.php'; ?>
    <?php include 'j_nav.php'; ?>


    <div class="container boxtbl">
        <h3 class="text-center">Table</h3>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Case No</th>
                    <th>Parties Name</th>
                    <th>Date</th>
                    <th>Time slot</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../dbcon.php';
                $amail = $_SESSION['username'];
                $sql = "select * from `judge_info` where  `j_email` = '$amail' ";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $Name = $row['j_name'];
                        $Regd = $row['j_regd'];
                    }
                } else {
                    echo "Unable to Show your Information";
                }
                $qr = "SELECT * FROM casefiling, case_info WHERE (case_info.f_filingno=casefiling.filingno AND case_info.j_regd='$Regd')";
                $res = mysqli_query($con, $qr);
                if ($res) {
                    if (mysqli_num_rows($res) > 0) {
                        $sl = 1;
                        foreach ($res as $row) {
                            $sql2 = "SELECT * FROM `case_info` WHERE `f_filingno`= " . $row['filingno'] . "";
                            $res2 = mysqli_query($con, $sql2);
                                            foreach ($res2 as  $rw) {
                                                $case = $rw['case_no'] . '/' . $rw['year'];
                                                echo '<tr>
                                                <td>' . $sl . '</td>
                                                <td>' . $case . '</td>';
                                            }

                            echo '
                                <td>' . $row['pname'] . '  Vs  ' . $row['rname'] . '</td>
                                <td><span class="badge text-bg-secondary">' . $row['sts'] . '</span></td>
                                <td><a href="caseinfo.php?fno=' . $row['filingno'] . '" class="btn btn-warning">View</a></td>
                                </tr>';
                            $sl++;
                        }
                    } else {
                        echo '<tr><td></td><td></td>
                        <td>No Cases are found</td>
                        <td></td><td></td><tr>';
                    }
                } else {
                    echo "Error";
                }
                ?>

            </tbody>
        </table>
    </div>
    <?php include 'foot.php'; ?>
</body>

</html>