<?php
session_start();
if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
    header("location: j_login.php");
    exit();
}

include '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $casetype = $_POST['casetype'];
    $caseno = $_POST['caseno'];
    $year = $_POST['year'];


    $sql = "SELECT * FROM `case_info` WHERE `case_type`='$casetype' AND `case_no`='$caseno' AND `year`= '$year'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) >  0) {
        while ($r = mysqli_fetch_assoc($res)) {
            $case = $caseno . '/' . $year;
            $filingno = $r['f_filingno'];
            $_COOKIE['filingno'] = $r['f_filingno'];
            $judgeid = $r['j_regd'];
            $courtno = $r['courtno'];

            //Judge table
            $sql1 = "SELECT * FROM `judge_info` WHERE `j_regd`='$judgeid'";
            $runsql1 = mysqli_query($con, $sql1);
            while ($judge = mysqli_fetch_array($runsql1)) {
                $jname = $judge['j_name'];
            }

            //Cases information
            $sql2 = "SELECT * FROM `casefiling` WHERE `filingno`='$filingno'";
            $runsql2 = mysqli_query($con, $sql2);
            while ($row = mysqli_fetch_assoc($runsql2)) {
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
                $radvno = $row['r_advno'];
                $radvname = $row['r_advname'];
                $fact = $row['fact'];
                $act = $row['act'];
                $section = $row['section'];
                $sts = $row['sts'];
                $doc = $row['file'];
                $path = '../Advocate/' . $doc;
            }
        }
    } else {
        include 'head.php';
        include 'j_nav.php';
        echo '<div class="text-center mt-5 mb-5" style="color:red;">
        <h1> Enter Correct Case No</h1>
        <a href="judgement.php">Go Back</a>
        </div>';
        include 'foot.php';

        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judgement Panel | JCMS</title>
</head>

<body>
    <?php include 'head.php'; ?>
    <?php include 'j_nav.php'; ?>
    <div class="container mt-3 mb-4">
        <h3 class="text-center">All Information About Case</h3>
        <table class="table table-bordered border-warning">
            <thead>
                <tr>
                    <th colspan="4" class="text-center">Information</th>
                </tr>
            </thead>
            <tbody>
                <!-- Judge -->
                <tr>
                    <th scope="row">State:</th>
                    <td><?php echo $state; ?></td>
                    <th scope="row">Court:</th>
                    <td><?php echo $court; ?></td>
                </tr>
                <tr>
                    <th scope="row">Filing No:</th>
                    <td><?php echo $filingno; ?></td>
                    <th scope="row">Filing Date:</th>
                    <td><?php echo $date; ?></td>
                </tr>
                <tr>
                    <th scope="row">Case type:</th>
                    <td><?php echo $casetype; ?></td>
                    <th scope="row">Case No:</th>
                    <td><?php echo $case; ?></td>
                </tr>
                <tr>
                    <th scope="row">Name of Judge:</th>
                    <td><?php echo $jname; ?></td>
                    <th scope="row">Court No:</th>
                    <td><?php echo $courtno; ?></td>
                </tr>
                <!-- Petitioner -->
                <tr>
                    <th colspan="4">Petitioner Information</th>
                </tr>
                <tr>
                    <th scope="row">Name:</th>
                    <td><?php echo $pname; ?></td>
                    <th scope="row">Age:</th>
                    <td><?php echo $page; ?></td>
                </tr>
                <tr>
                    <th scope="row">Guardian:</th>
                    <td><?php echo $pgname; ?></td>
                    <th scope="row">Gender:</th>
                    <td><?php echo $pgender; ?></td>
                </tr>
                <tr>
                    <th scope="row">Caste:</th>
                    <td><?php echo $pcaste; ?></td>
                    <th scope="row">Nationality:</th>
                    <td><?php echo $pnation; ?></td>
                </tr>
                <tr>
                    <th scope="row">Phone:</th>
                    <td><?php echo $pphn; ?></td>
                    <th scope="row">Email:</th>
                    <td><?php echo $pemail; ?></td>
                </tr>
                <tr>
                    <th scope="row">Village:</th>
                    <td><?php echo $padd; ?></td>
                    <th scope="row">City:</th>
                    <td><?php echo $pcity; ?></td>
                </tr>
                <tr>
                    <th scope="row">State:</th>
                    <td><?php echo $pstate; ?></td>
                    <th scope="row">PIN:</th>
                    <td><?php echo $ppin; ?></td>
                </tr>
                <tr>
                    <th colspan="4">Petitioner Counsel</th>
                </tr>
                <tr>
                    <th scope="row">Advocate Name:</th>
                    <td><?php echo $advname; ?></td>
                    <th scope="row">Advocate Registration No:</th>
                    <td><?php echo $advno; ?></td>
                </tr>
                <!-- Respondent -->
                <tr>
                    <th colspan="4">Respondent Information</th>
                </tr>
                <tr>
                    <th scope="row">Name:</th>
                    <td><?php echo $rname; ?></td>
                    <th scope="row">Age:</th>
                    <td><?php echo $rage; ?></td>
                </tr>
                <tr>
                    <th scope="row">Guardian:</th>
                    <td><?php echo $rgname; ?></td>
                    <th scope="row">Gender:</th>
                    <td><?php echo $rgender; ?></td>
                </tr>
                <tr>
                    <th scope="row">Caste:</th>
                    <td><?php echo  $rcaste; ?></td>
                    <th scope="row">Nationality:</th>
                    <td><?php echo $rnation; ?></td>
                </tr>
                <tr>
                    <th scope="row">Village:</th>
                    <td><?php echo  $radd; ?></td>
                    <th scope="row">City:</th>
                    <td><?php echo  $rcity; ?></td>
                </tr>
                <tr>
                    <th scope="row">State:</th>
                    <td><?php echo $rstate; ?></td>
                    <th scope="row">PIN:</th>
                    <td><?php echo $rpin; ?></td>
                </tr>
                <tr>
                    <th colspan="4">Respondent Counsel</th>
                </tr>
                <tr>
                    <th scope="row">Advocate Name:</th>
                    <td><?php echo $radvname; ?></td>
                    <th scope="row">Advocate Registration No:</th>
                    <td><?php echo $radvno; ?></td>
                </tr>
                <tr>
                    <th colspan="4">Case Fact:</th>
                </tr>
                <tr>
                    <td colspan="4">
                        <p align="justify">
                            <?php echo $fact; ?>
                        </p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Acts:</th>
                    <td><?php echo $act; ?></td>
                    <th scope="row">Section:</th>
                    <td><?php echo $section; ?></td>
                </tr>
                <tr>
                    <th scope='row'>Documents:</th>
                    <td colspan="3"><a href="<?php echo $path; ?>" class="btn btn-warning">Preview</a></td>

                </tr>
            </tbody>
        </table>
        <form action="judgement3.php" method="post">
            <input type="hidden" name="fno" value="<?php echo $filingno; ?>">
            <div class="mb-3">
                <label for="Judgement" class="form-label">Judgement:</label>
                <textarea class="form-control" id="textarea" rows="3" name="textarea"></textarea>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button class="btn btn-primary me-md-2" style="background-color: black" type="submit" name="judgement">SUBMIT</button>
                <button class="btn btn-primary me-md-2" style="background-color: #F4CC4C;" type="reset">RESET</button>
            </div>
    </div>
    </form>
    <?php include 'foot.php'; ?>
</body>

</html>