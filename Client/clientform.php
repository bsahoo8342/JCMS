<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Case Status | JCMS </title>
</head>
<style>
.card {
    margin-top: 50px;

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
    <?php include 'head.php'; ?>
    <section>
        <div class="card">
            <div style="background-color:#F4CC4C; text-align: center;">
                <h5>Case Status:Search by Case Number</h5>

            </div>
            <div class="card-body py-5 px-md-5">
                <!-- form started -->
                <form action="">
                    <div class="row">
                        <label for="colFormLabel" class="col-sm-4 col-form-label">Case Type</label>
                        <div class="col-sm-6 mb-2">
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
                                name="caseno" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="colFormLabel" class="col-sm-4 col-form-label">Year</label>
                        <div class="col-sm-3">
                            <input type="number" maxlength="4" class="form-control" id="year" placeholder="YYYY"
                                name="year" required>
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
        <div class="card mb-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">slno.</th>
                        <th scope="col">Case Type/Case
                            Number/Case Year</th>
                        <th scope="col">Petitioner Name versus Respondent Name</th>
                        <th scope="col">Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET["submit"])) {
                        $casetype = $_GET["casetype"];
                        $caseno = $_GET["caseno"];
                        $caseyear = $_GET["year"];
                        include '../dbcon.php';
                        try {
                            $sql = "SELECT * FROM `case_info` WHERE `case_no`='$caseno' AND `year`= '$caseyear'";
                            $res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($res) >  0) {
                                while ($r = mysqli_fetch_assoc($res)) {
                                    $case = $r["case_no"] . '/' . $r["year"];
                                    echo ' <tr>
                                    <th scope="row">1</th>
                                    <td>' . $r["case_type"] . ' ' . $case . '</td>
                                    ';
                                    $fno = $r["f_filingno"];
                                }
                                $sql2 = "SELECT * FROM `casefiling` WHERE `filingno`= '$fno'";
                                $result = mysqli_query($con, $sql2);
                                while ($f = mysqli_fetch_array($result)) {
                                    // echo $f['pname'];
                                    echo '<td>' . $f["pname"] . ' Vs ' . $f["rname"] . '</td>
                                    <td><a href="caseinfo.php?fno=' . $fno . '" class="btn btn-warning">View</a></td>
                                </tr>';
                                }
                            } else {
                                echo "
                                <td class='text-center' style='color:red' colspan='4'>No Data Found</td>
                                ";
                            }
                        } catch (\Throwable $th) {
                            echo "Error to processing data";
                        }
                    }
                    ?>


                </tbody>
            </table>

        </div>
    </section>
    <?php include 'foot.php'; ?>

</body>

</html>