<?php
session_start();
if (!isset($_SESSION["login"]) && $_SESSION["login"] != true) {
    header("location: a_login.php");
    exit();
}
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Case Filing | JCMS</title>
</head>
<style>
.form-label {
    font-size: 18px;
}
</style>

<body>
    <?php include 'head.php'; ?>
    <?php include 'a_nav.php';
    ?>

    <form action="filing.php" method="post" enctype="multipart/form-data">
        <div class="container boxtbl">
            <h4 class="mb-3 text-center"><u>Case Registration Form</u></h4>
            <h5 class="text-center">Case information:</h5>
            <div class="mt-4">
                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="state" class="form-label">State</label>
                        <div class="input-group mb-3">
                            <select class="form-select" id="state" name="state" required>
                                <option selected>Choose...</option>
                                <?php
                                $sql = mysqli_query($con, "SELECT * FROM `state_list`");

                                while ($row = mysqli_fetch_assoc($sql)) {
                                    echo '<option value="' . $row['state'] . '">' . $row['state'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 ps-2">
                        <label for="court" class="form-label">Court Name</label>
                        <select class="form-select" id="court" name="court" required>
                            <option selected>Choose...</option>
                            <?php
                            $sql = mysqli_query($con, "SELECT * FROM `court_list`");

                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '<option value="' . $row['hc_name'] . '">' . $row['hc_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="casetype" class="form-label">Case Type</label>
                        <div class="input-group mb-3">
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
                    <div class="col-md-6 ps-2">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" placeholder="DD-MM-YYYY" aria-label="DD-MM-YYYY"
                            id="date" name="date" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Petitioner Information -->
        <div class="container boxtbl">
            <h5 class="text-center">Petitioner information:</h5>
            <div class="mt-4">
                <div class="row g-3 mb-2">
                    <div class="col mb-2 p-2">
                        <label for="name" class="form-label">Petitioner Name:</label>
                        <input type="text" class="form-control" placeholder="Petitioner Name"
                            aria-label="Petitioner Name" id="name" name="pname" required>
                    </div>
                </div>
                <div class="row g-3 mb-2 p-2">
                    <div class="col mb-2 ">
                        <label for="name2" class="form-label">Guardian Name:</label>
                        <input type="text" class="form-control" placeholder="Father/Mother/Husband Name"
                            aria-label="Petitioner Name" id="name2" name="pgname" required>
                    </div>
                </div>

                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" class="form-control" placeholder="Age of Petitioner" maxlength="3"
                            aria-label="First name" id="age" name="page" required>
                    </div>
                    <div class="col-md-6 ps-2">
                        <label for="Gender" class="form-label">Gender:</label>
                        <select class="form-select" id="Gender" name="pgender" required>
                            <option selected>Choose...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 px-2">
                        <label for="nation" class="form-label">Natitionality:</label>
                        <div class="input-group mb-3">
                            <select class="form-select" id="nation" name="pnation" required>
                                <option selected>Choose...</option>
                                <option value="Indian">Indian</option>
                                <option value="American">American</option>
                                <option value="Europian">Europian</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 px-2">
                        <label for="caste" class="form-label">Caste:</label>
                        <div class="input-group mb-3">
                            <select class="form-select" id="caste" name="pcaste" required>
                                <option selected>Choose...</option>
                                <option value="General">UR/General</option>
                                <option value="OBC">OBC</option>
                                <option value="ST">ST</option>
                                <option value="SC">SC</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="someone@mail.com"
                            aria-label="someone@mail.com" name="pemail" required>
                    </div>
                    <div class="col-md-6 ps-2">
                        <label for="Number" class="form-label">Phone Number:</label>
                        <input type="number" class="form-control" id="Number" placeholder="0987654321" maxlength="10"
                            aria-label="0987654321" name="pphn" required>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-12 px-2">
                        <label for="inputAddress" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="inputAddress" name="padd"
                            placeholder="House Number/ Flat No/ Plot No." required>
                    </div>

                    <div class="col-md-4 px-2">
                        <label for="inputCity" class="form-label">City:</label>
                        <input type="text" class="form-control" id="inputCity" name="pcity" required
                            placeholder="Enter your City name">
                    </div>
                    <div class="col-md-4 px-2">
                        <label for="inputState" class="form-label">State:</label>
                        <select id="inputState" class="form-select" name="pstate" required>
                            <option selected>Choose...</option>
                            <?php
                            $sql = mysqli_query($con, "SELECT * FROM `state_list`");

                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '<option value="' . $row['state'] . '">' . $row['state'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 px-2">
                        <label for="inputZip" class="form-label">PIN Code:</label>
                        <input type="number" class="form-control" id="inputZip" name="ppin" placeholder="123456"
                            maxlength="6" required>
                    </div>
                </div>
            </div>
            <!-- Petitioner Information -->

            <!-- Respondnet Information -->
        </div>
        <div class="container boxtbl">
            <h5 class="text-center">Respondent information:</h5>
            <div class=" mt-4">
                <div class="row g-3 mb-2 p-2">
                    <div class="col mb-2 ">
                        <label for="name" class="form-label">Respondent Name:</label>
                        <input type="text" class="form-control" placeholder="Respondent Name"
                            aria-label="Respondent Name" id="name" name="rname" required>
                    </div>
                </div>
                <div class="row g-3 mb-2 p-2">
                    <div class="col mb-2 ">
                        <label for="name2" class="form-label">Guardian Name:</label>
                        <input type="text" class="form-control" placeholder="Father/Mother/Husband Name"
                            aria-label="Respondent Name" id="name2" name="rgname" required>
                    </div>
                </div>

                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" class="form-control" placeholder="Age of Respondent"
                            aria-label="First name" id="age" name="rage" maxlength="3" required>
                    </div>
                    <div class="col-md-6 ps-2">
                        <label for="Gender" class="form-label">Gender:</label>
                        <select class="form-select" id="Gender" name="rgender" required>
                            <option selected>Choose...</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 px-2">
                        <label for="nation" class="form-label">Natitionality:</label>
                        <div class="input-group mb-3">
                            <select class="form-select" id="nation" name="rnation" required>
                                <option selected>Choose...</option>
                                <option value="Indian">Indian</option>
                                <option value="American">American</option>
                                <option value="Europian">Europian</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 px-2">
                        <label for="caste" class="form-label">Caste:</label>
                        <div class="input-group mb-3">
                            <select class="form-select" id="caste" name="rcaste" required>
                                <option selected>Choose...</option>
                                <option value="General">UR/General</option>
                                <option value="OBC">OBC</option>
                                <option value="ST">ST</option>
                                <option value="SC">SC</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-2">
                    <div class="col-12 px-2">
                        <label for="inputAddress" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="inputAddress" name="radd" required
                            placeholder="House No/ Flat No /Plot No">
                    </div>

                    <div class="col-md-4 px-2">
                        <label for="inputCity" class="form-label">City:</label>
                        <input type="text" class="form-control" id="inputCity" name="rcity" required
                            placeholder="Enter your City name">
                    </div>
                    <div class="col-md-4 px-2">
                        <label for="inputState" class="form-label">State:</label>
                        <select id="inputState" class="form-select" name="rstate" required>
                            <option selected>Choose...</option>
                            <?php
                            $sql = mysqli_query($con, "SELECT * FROM `state_list`");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '<option value="' . $row['state'] . '">' . $row['state'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 px-2">
                        <label for="inputZip" class="form-label">PIN Code:</label>
                        <input type="number" class="form-control" id="inputZip" placeholder="123456" name="rpin" min="3"
                            maxlength="6" required>
                    </div>
                </div>
            </div>
        </div>
        <!-- Respondnet Information -->

        <!-- Advocate info -->
        <div class="container boxtbl">
            <h5 class="text-center">Advocate Information:</h5>
            <div class="mt-4">
                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="advno" class="form-label">Advocate Registration Number:</label>
                        <input type="text" class="form-control" placeholder="OR022010" id="advno" name="advno" readonly
                            required>
                    </div>
                    <div class="col-md-6 px-2">
                        <label for="lname" class="form-label">Advocate Name:</label>
                        <input type="text" class="form-control" placeholder="Advocate Name" aria-label="Advocate name"
                            readonly id="advname" name="advname" required>
                    </div>
                </div>
            </div>
        </div>
        <!-- Advocate info -->

        <!-- Matter Information -->
        <div class="container boxtbl">
            <h5 class="text-center">Matter:</h5>
            <div class="mt-2">
                <div class="row g-3 mb-2 p-2">
                    <div class="mb-3">
                        <label for="fact" class="form-label">Explain Facts:</label>
                        <textarea class="form-control" id="fact" rows="3" name="fact"></textarea>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col-md-6 px-2">
                        <label for="age" class="form-label">ACT Details:</label>
                        <select class="form-select" id="act" name="act" required>
                            <option selected>Indian Penal Code</option>
                            <option value="PMLA Act">PMLA Act</option>
                            <option value="Criminal Procedure Act">Criminal Procedure Act</option>
                            <option value="Commercial Courts Act, 2015">Commercial Courts Act, 2015</option>
                            <option value="Enforce Fundamentals Rights Act">Enforce Fundamentals Rights Act</option>
                            <option value="Special Court under the POCSO Act">Special Court under the POCSO Act</option>
                            <option value="Commissions for Protection of Child Rights Act, 2005">Commissions for
                                Protection of Child Rights Act, 2005</option>
                            <option value="Coal Mines Provident Fund and Miscellaneous Provisions Act, 1948">Coal Mines
                                Provident Fund and Miscellaneous Provisions Act, 1948</option>
                        </select>
                    </div>
                    <div class="col-md-6 px-2">
                        <label for="Gender" class="form-label">Section:</label>
                        <input type="text" class="form-control" placeholder="Section 141" aria-label="Section 141"
                            id="section" name="section" required>
                    </div>
                </div>
                <div class="row p-2">
                    <label for="docs" class="form-label">Upload Documents:</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" accept=".doc, .docx, .pdf, .txt" id="file" name="file"
                            aria-describedby="docs" required>
                    </div>
                    <div id="filename"></div>
                </div>
            </div>
            <div class="text-center m-2">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
        <!-- Matter Information -->
    </form>
    <script>
    var advno = document.getElementById('advno');
    var advnm = document.getElementById('advaname');
    advno.onfocus = function() {
        advno.value = "<?php echo $Regd; ?>";
    }
    advname.onfocus = function() {
        advname.value = "<?php echo $Name; ?>";
    }
    </script>

    <?php include 'foot.php'; ?>
</body>

</html>