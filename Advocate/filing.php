<?php
session_start();
if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
    header("location: a_login.php");
    exit();
}
?>
<html>

<head>
    <title>Application</title>
</head>

<body>
    <?php
    include 'head.php';
    include '../dbcon.php';
    include 'a_nav.php';

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $filingno = random_int(100000, 999999);

        // Get the form data
        $state = $_POST['state'];
        $court = $_POST['court'];
        $casetype = $_POST['casetype'];
        $date = $_POST['date'];

        $pname = $_POST['pname'];
        $pgname = $_POST['pgname'];
        $page = $_POST['page'];
        $pgender = $_POST['pgender'];
        $pnation = $_POST['pnation'];
        $pcaste = $_POST['pcaste'];
        $pemail = $_POST['pemail'];
        $pphn = $_POST['pphn'];
        $padd = $_POST['padd'];
        $pcity = $_POST['pcity'];
        $pstate = $_POST['pstate'];
        $ppin = $_POST['ppin'];

        $rname = $_POST['rname'];
        $rgname = $_POST['rgname'];
        $rage = $_POST['rage'];
        $rgender = $_POST['rgender'];
        $rnation = $_POST['rnation'];
        $rcaste = $_POST['rcaste'];
        $radd = $_POST['radd'];
        $rcity = $_POST['rcity'];
        $rstate = $_POST['rstate'];
        $rpin = $_POST['rpin'];

        $advno = $_POST['advno'];
        $advname = $_POST['advname'];

        $fact = $_POST['fact'];
        $act = $_POST['act'];
        $section = $_POST['section'];


        //Upload Files
        $filenm = basename($_FILES['file']['name']);
        $filename = explode(".", $_FILES["file"]["name"]); 
        $ext = end($filename);
        $new_name = $filingno . "." . $ext; 
        $target_dir = "doc/";
        $target_file = $target_dir . $new_name;
        $file = $target_file;


        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
            try {
                $sql = "INSERT INTO `casefiling` (`slno`, `filingno`, `state`, `court`, `casetype`, `date`, `pname`, `pgname`, `page`, `pgender`, `pnation`, `pcaste`, `pemail`, `pphn`, `padd`, `pcity`, `pstate`, `ppin`, `rname`, `rgname`, `rage`, `rgender`, `rnation`, `rcaste`, `radd`, `rcity`, `rstate`, `rpin`, `advno`, `advname`, `fact`, `act`, `section`, `file`, `sts`, `verify`) VALUES (NULL, '$filingno', '$state', '$court', '$casetype', '$date', '$pname', '$pgname', '$page', '$pgender', '$pnation', '$pcaste', '$pemail', '$pphn', '$padd', '$pcity', '$pstate', '$ppin', '$rname', '$rgname', '$rage', '$rgender', '$rnation', '$rcaste', '$radd', '$rcity', '$rstate', '$rpin', '$advno', '$advname', '$fact', '$act', '$section', '$file', 'pending', 0)";

                $res = mysqli_query($con, $sql);
                if ($res) {

                    echo '
          <div class="container text-center col-md-8 mt-4">
          <div class="alert alert-success " role="alert">
          <h4 class="alert-heading mt-4 mb-4">Success!</h4>
          <p> Your Case successfully registered with your ID:  <strong>' . $advno . '</strong> bearing filing number: <strong>' . $filingno . '</strong><br>
          Notedown the filing number for your future reference.</p>
          <hr>
          <p class="mt-4 mb-4"></p
          </div>
          </div></div>';
                } else {
                    echo "Please Try again later";
                }
            } catch (\Throwable $th) {

                // echo ("Error description: " . mysqli_error($con));
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Registration Unsuccess!</strong> Because of database isuue.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            }
    }
    echo '  <div class="mb-4"></div>
            <div class="mb-4"><br><br><br><br></div>
            <div class="mb-4"><br></div>
            <div class="mb-4"></div>
            ';

    include 'foot.php';
    ?>
</body>

</html>