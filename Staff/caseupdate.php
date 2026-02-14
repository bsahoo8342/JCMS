<?php
session_start();
if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
    header("location: s_login.php");
    exit();
}
include 'head.php';
include 's_nav.php';
include '../dbcon.php';

if (isset($_POST['submit'])) {
    $case = $_POST['caseno'];
    $year = $_POST['year'];
    $casenum = $case. '/' .$year;
    $date = $_POST['date'];
    $cdate=date_create($date);
    $fdate=date_format($cdate,"l d/m/Y");
    $remark = $_POST['remark'];

    $sql = "INSERT INTO `case_history` (`slno`, `case_no`, `year`, `next_date`, `remark`) VALUES (NULL, '$case', '$year', '$date', '$remark')";
    $run = mysqli_query($con, $sql);

    $sql2="SELECT * FROM `case_info` WHERE `case_no`=$case AND `year`=$year";
    $run2 = mysqli_query($con, $sql2);
    if (mysqli_num_rows($run2) >  0) {
        while ($r = mysqli_fetch_assoc($run2)) {
            $advno=$r['a_regd'];
        }
    }

    $sql3="SELECT * FROM `advocate_info` WHERE `a_regd`='$advno' ";
    $run3 = mysqli_query($con, $sql3);
    if(mysqli_num_rows($run3)>0){
        while($r = mysqli_fetch_assoc($run3)){
            $advname=$r['a_name'];
            $email=$r['a_email'];
        }
    }
    
    if ($run) {
        echo '<div class="alert alert-success alert-dismissible align-items-center fade show text-center" role="alert">
        <strong>Remark Update Successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    //SWIFTMAILER SETUP
    require_once '../Swiftmailer/vendor/autoload.php';

    // Create the Transport
    $transport = (new Swift_SmtpTransport('<smtp provider>', '<port number>', 'TLS'))
    ->setUsername('<Mail Address>')
    ->setPassword('<Password>');

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message('Case Information Update'))
    ->setFrom(['<Mail Address>' => 'Judicial Case Management System - JCMS'])
    ->setTo([$email => $advname])
    ->setBody('Dear <br>'. $advname.', Your Case No:<b>'.$casenum.'</b> is posted to <b>'.$fdate.'</b> for <b>'.$remark. '</b><br> 
    For More details visit <a href="localhost/jcms">Click Here</a>', 'text/html');
    
    // Send the message
    $result = $mailer->send($message);

    echo '<script>
    alert("Mail Sent!!!")</script>';




    
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASE INFORMATION UPDATE | JCMS</title>
</head>
<style>
.card {
    margin-top: 40px;

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

.me-md-2 {
    margin-right: .5rem;
    margin-top: 2rem;
}
</style>

<body>

    <section class="mb-4">
        <div class="card">
            <div style="background-color:#F4CC4C; text-align: center;">
                <h3 class="p-2">Case Information Update Form</h3>

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
                                required name="caseno">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="colFormLabel" class="col-sm-4 col-form-label">Year</label>
                        <div class="col-sm-5">
                            <input type="number" maxlength="4" class="form-control" id="year" placeholder="YYYY"
                                required name="year">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="colFormLabel" class="col-sm-4 col-form-label">Next Date</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="date" placeholder="DD-MM-YYYY" name="date"
                                required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Remark</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" rows="3" placeholder="Status" name="remark"
                                required></textarea>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-primary me-md-2" style="background-color: black" type="submit"
                            name="submit">SUBMIT</button>
                        <button class="btn btn-primary me-md-2" style="background-color: #F4CC4C;"
                            type="reset">RESET</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <?php include 'foot.php' ?>
</body>

</html>