<?php
include("../dbcon.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $pass = md5(trim(($_POST['pass'])));
    $sql = "SELECT * FROM `staff_info` where `s_email`='$user' ";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_array($result)) {
            if ($pass == $row["s_pass"]) {
                echo "Logged in successfully!!!";
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user;
                header('location:dashboard.php');
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Password Incorrect!</strong> Please enter correct password.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Username Not found!</strong> Please Check your username.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login | JCMS</title>
</head>
<style>
    .boxtbl {
        width: 50% !important;
        height: 400px;
    }
</style>

<body>
    <?php include 'head.php'; ?>
    <!--  Page Content -->
    <div class="container boxtbl">
        <h3 class="text-center mt-4">Staff Login</h3>
        <form action="#" method="post">
            <div class="container col-md-8">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="user">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
            <div class="container text-center mt-3">
                <span>Click Here to</span>
                <a href="s_signup.php">Register</a>
            </div>
        </form>
    </div>
    <!--  End of Page Content -->
    <?php include 'foot.php'; ?>

</body>

</html>