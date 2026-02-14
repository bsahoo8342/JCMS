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
    <title>Profile | JCMS</title>
</head>
<style>
    label {
        color: blue;
        font-weight: 700;
    }

    .boxtbl {
        height: 600px;
    }
</style>

<body>
    <?php include 'head.php'; ?>
    <?php include 'a_nav.php'; ?>

    <div class="container boxtbl">
        <h3 class="text-center underline" style="color:whitesmoke; font-weight:700;"><u>Profile Information</u></h3>
        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color" style="line-height: 70px;">Welcome <?php echo $Name; ?></h3>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>NAME:</label>
                                        <p><?php echo $Name; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>REGISTRATION NUMBER:</label>
                                        <p><?php echo $Regd; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>PHONE NUMBER:</label>
                                        <p><?php echo $a; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>E-MAIL:</label>
                                        <p><?php echo $email; ?></p>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="<?php echo $img; ?>" height="300" width="300" alt="profile">
                        </div>
                    </div>
                </div>
              
            </div>
        </section>


    </div>
    <?php include 'foot.php'; ?>
</body>

</html>