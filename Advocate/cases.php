<?php
session_start();
if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
    header("location: a_login.php");
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
    <?php include 'a_nav.php'; ?>

    <div class="container boxtbl">
        <h3 class="text-center">My All Cases</h3>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Case No</th>
                    <th>Parties Name</th>
                    <th>Case Status</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include '../dbcon.php';
                $amail = $_SESSION['username'];
                $sql = "select * from `advocate_info` where  `a_email` = '$amail' ";
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
                $sql = "SELECT * FROM `casefiling` WHERE `advno`= '$Regd' OR `r_advno`='$Regd' ";
                $res = mysqli_query($con, $sql);
                if ($res) {
                    if (mysqli_num_rows($res) > 0) {
                        $sl = 1;
                        foreach ($res as $row) {
                            echo '<tr>
                            <td>' . $sl . '</td>';
                            $sl++;

                            $sql2 = "SELECT * FROM `case_info` WHERE `f_filingno`= " . $row['filingno'] . " ";
                            $res2 = mysqli_query($con, $sql2);
                            if (mysqli_num_rows($res2) == 0) {
                                $case = "Not Assign yet!";
                                echo '
                                <td id="off">' . $case . '</td>';
                            }
                            foreach ($res2 as  $rw) {
                                $case = $rw['case_no'] . '/' . $rw['year'];
                                echo '                            
                                <td>' . $case . '</td>';
                            }
                            echo '
                            <td>' . $row['pname'] . '  Vs  ' . $row['rname'] . '</td>
                            <td><span class="badge text-bg-info" >' . $row['sts'] . '</span></td>
                            <td><a href="caseinfo.php?fno=' . $row['filingno'] . '" class="btn btn-warning" id="link">View</a></td>
                            </tr>';
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


            </tbody><a href="../Client/caseinfo.php?fno="></a>
        </table>
    </div>
    <?php include 'foot.php'; ?>
</body>

</html>