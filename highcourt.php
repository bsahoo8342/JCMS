<!DOCTYPE html>
<html lang="en">

<head>
    <title>High Court of India | JCMS</title>
</head>

<body style="font-family: Georgia, 'Cambria' !important;">
    <?php include 'header.php'; ?>

    <section>
        <div class="container m-3  align-items-center">
            <div class="container  text-center">
                <h1>High Courts of India</h1>
            </div>

            <div class="container m-3  align-items-center">
                <div class="list-group  align-items-center">
                    <?php include 'dbcon.php';
                $sql = "select * from `court_list`";
                $result = mysqli_query($con, $sql);

                foreach ($result as $row) {
                    echo '
                <a href="' . $row['link'] . '" class="list-group-item list-group-item-action">' . $row['hc_name'] . '</a>
                        ';
                }
                ?>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>

</html>