<?php
session_start();
if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
    header("location: s_login.php");
    exit();
}

include '../dbcon.php';
$is = $_SESSION['username'];
$sql = "select * from `staff_info` where  `s_email` = '$is' ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $Name = $row['s_name'];
        $Regd = $row['s_regd'];
        $a = $row['s_phn'];
        $email = $row['s_email'];
        $img = $row['s_path'];
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
    <?php include 's_nav.php'; ?>


    <div class="container row boxtbl ">
        <div class="row">
            <div class="col-auto me-auto">
                <h3>Welcome <strong><?php echo $Name; ?></strong></h3>
                <h6 class="d-inline-flex"><strong>Employee No:</strong><?php echo $Regd; ?> </h6>
            </div>
            <div class="col-2"><img class="round" src="<?php echo $img; ?>" alt="logo" height="100" width="80"></div>
        </div>
    </div>
    <div class="container boxtbl">
        <h3 class="text-center">Case Admission Request:</h3>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Filing No</th>
                    <th>Parties Name</th>
                    <th>Date of Filing</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `casefiling` WHERE `verify` = '0'";
                $query = mysqli_query($con, $sql);
                $slno = 1;
                while ($num = mysqli_fetch_array($query)) {
                    $parties = $num['pname'] . ' Vs. ' . $num['rname'];
                    echo '<tr>
                    <td>' . $slno . '</td>
                    <td>' . $num['filingno'] . '</td>
                    <td>' . $parties . '</td>
                    <td>' . $num['date'] . '</td>
                    <td><a href="admission.php?fno=' . $num['filingno'] . '" class="btn btn-warning">View</a></td>
                </tr>';
                    $slno = $slno + 1;
                }
                ?>

            </tbody>
        </table>
    </div>

    <?php include 'foot.php'; ?>
</body>

</html>