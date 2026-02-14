    <?php
    session_start();
    if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
        header("location: j_login.php");
        exit();
    }
    include 'head.php';
    include 'j_nav.php';
    include '../dbcon.php';
    //Judgement Insert
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $filingno = $_POST['fno'];
        $judgement = $_POST['textarea'];

        $query = "UPDATE `casefiling` SET `judgement`='$judgement', `sts`='Disposed' WHERE `filingno`='$filingno' ";
        $update = mysqli_query($con, $query);
        if ($update) {
            echo '<div class="alert alert-success alert-dismissible align-items-center fade show text-center" role="alert">
        <strong>Judgement Update Successfully!</strong>
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
        <title>Judgement Update Successfully | JCMS</title>
    </head>

    <body>
        <div class="container text-center">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                <p>Case Disposed successfully.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
        </div>

    </body>

    </html>
    <?php include 'foot.php'; ?>