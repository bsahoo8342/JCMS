<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judge Resgistration | JCMS</title>
</head>

<body>
    <?php include 'head.php'; ?>
    <!--  Page Content -->
    <div class="container boxtbl">
        <h3 class="text-center">Judge Registration Form</h3>
        <form action="jregd.php" method="post" enctype="multipart/form-data">
            <div class="container col-md-8 mt-4">
                <div class="row g-3 mb-2">
                    <div class="col mb-2 ">
                        <label for="Regd" class="form-label">Employee ID</label>
                        <input type="text" class="form-control" placeholder="OR-11-YYYY" aria-label="First name" id="Regd" required name="RegistrationNo">
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="First name" aria-label="First name" id="fname" required name="fname">
                    </div>
                    <div class="col-md-6 ps-2">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" id="lname" name="lname" required>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="someone@mail.com" name="Email" required aria-label="someone@mail.com">
                    </div>
                    <div class="col-md-6 ps-2">
                        <label for="Number" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="Number" placeholder="0987654321" name="ContactNumber" required aria-label="0987654321">
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="pass1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass1" placeholder="Password" aria-label="Password" name="pass">
                    </div>
                    <div class="col-md-6 ps-2">
                        <label for="pass2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="pass2" placeholder="Confirm Password" name="cpass" required onkeyup="validate_password()" aria-label="Confirm Password">
                        <span id="wrong_pass_alert"></span>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="img" class="form-label">Upload Photo</label>
                        <input type="file" class="form-control" id="img" required name="img">
                    </div>

                    <div class="col-md-6 ps-2">
                        <label for="img" class="form-label">Preview</label>
                        <div class="card" style="width: 10rem;">
                            <img src="../img/user.png" height="140px" class="card-img-top" alt="image" accept="image/*" id="profile">
                            <div id="file-upload-filename"></div>
                        </div>
                    </div>
                </div>
                <div class="form-label">

                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary" id="create">Sign Up</button>
                </div>
            </div>
            <div class="container text-center mt-3">
                <span>Click Here to</span>
                <a href="j_login.php">Login</a>
            </div>
        </form>
    </div>
    <script>
        function preview(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const element = document.getElementById('profile');
                element.src = reader.result;
            }
            reader.onerror = function() {
                const element = document.getElementById('errorMsg');
                element.value = "Couldn't load the image.";
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        const input = document.getElementById('img');
        input.addEventListener('change', (event) => {
            preview(event)
        });

        function validate_password() {

            let pass = document.getElementById('pass1').value;
            let confirm_pass = document.getElementById('pass2').value;
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML = '☒ Use same password';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '🗹 Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }

        function wrong_pass_alert() {
            if (document.getElementById('pass').value != "" &&
                document.getElementById('confirm_pass').value != "") {
                alert("Your response is submitted");
            } else {
                alert("Please fill all the fields");
            }
        }
    </script>
    <!--  End of Page Content -->
    <?php include 'foot.php'; ?>

</body>

</html>