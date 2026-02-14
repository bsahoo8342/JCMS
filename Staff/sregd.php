<?php

include 'head.php';
include '../dbcon.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $regd = strtoupper(trim($_POST['RegistrationNo']));
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $name = $fname . " " . $lname;
  $email = $_POST['Email'];
  $contactno = $_POST['ContactNumber'];
  $password = md5(trim(($_POST['pass'])));


  //Upload Files
  // $target_file = $target_dir . basename($_FILES['img']["name"]);
  $filenm = $_FILES['img']['name'];
  $filename = explode(".", $_FILES["img"]["name"]);
  $ext = end($filename);
  $new_name = $regd . "." . $ext;
  $target_dir = "profile/";
  $target_file = $target_dir . $new_name;
  // $temp = $_FILES["img"]["tmp_name"];


  if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {

    try {
      // Insert the data into the database
      $query = "INSERT INTO `staff_info` (`slno`, `s_regd`, `s_name`, `s_email`, `s_phn`, `s_pass`, `s_path`, `status`) VALUES (NULL, '$regd', '$name', '$email', '$contactno', '$password', '$target_file', '1')";
      $result = mysqli_query($con, $query);
      if ($result) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Registration Success!</strong> Your information successfully stored.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        echo '
                  <div class="container text-center col-md-8">
                  <div class="alert alert-success " role="alert">
                  <h4 class="alert-heading">Success!</h4>
                  <p>Aww yeah, you successfully registered your ID in Judicial Case Management System !<br>
                  Thankyou and enjoy your online dashboard in every where.</p>
                  <hr>
                  <p class="mb-0">Now login your dashboard panel -> <a href="s_login.php">Login Now</a>.</p>
                  </div>
                  </div>';
      } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Registration Unsuccess!</strong> Kindly Contact your administration.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
      }
    } catch (\Throwable $th) {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Registration Unsuccess!</strong> Because of database isuue.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
      echo '
          <div class="container text-center col-md-8">
          <div class="alert alert-danger " role="alert">
          <h4 class="alert-heading">Failed!</h4>
          <p>Sorry, There is some issue ! Please Try again.</p>
          <hr>
          <p class="mb-0">Try again -> <a href="s_signup.php">SignUP Again</a>.</p>
          </div>
          </div>';
    }
  } else {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>File Not Upload!</strong> Try again.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    echo '
  <div class="container text-center col-md-8">
  <div class="alert alert-danger " role="alert">
  <h4 class="alert-heading">Failed!</h4>
  <p>Sorry, There is some issue ! Please Try again.</p>
  <hr>
  <p class="mb-0">Try again -> <a href="s_signup.php">SignUP Again</a>.</p>
  </div>
  </div>';
  }
}
include 'foot.php';
