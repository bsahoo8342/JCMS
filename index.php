<?php include 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>JUDICIAL CASE MANAGEMENT SYSTEM</title>
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
.container1 {
    max-width: 1500px;
}

.parent {
    padding: 2px;
    border: 1px solid blue;
    border-radius: 10px;
    height: 500px;
    overflow-y: auto;
    background-color: rgb(16, 136, 231);
}

.child {
    background-color: rgb(240, 248, 254);
    border-radius: 10px;
    height: 453px;
    padding: 5px;
}
</style>

<body>
    <?php include 'header.php'; ?>
    <!-- Carousel Start -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="img/carousel1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/carousel-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carousel-3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel End -->
    <div class="my-2">
        <marquee behavior="scroll" direction="left" style="border-radious: 22px;" onmouseover="this.stop();"
            onmouseout="this.start();">
            <h2>Welcome to Judicial Case Management System </h2>
        </marquee>
    </div>
    <!-- Introduction -->
    <div class="container">
        <div class="mt-3">
            <h3 style="color: saddlebrown;">INTRODUCTION:</h3>
        </div>
        <p align="justify">
            The Judicial Case Management System (JCMS) revolutionizes the traditional filing process by
            introducing electronic filing of cases (E-Cases) before the Hon'ble High Court. This innovative
            system aims to promote paperless filing, enhance efficiency, and reduce both time and costs
            associated with case management in Indian courts.
        </p>
        <p align="justify">
            With the JCMS E-Case System, all types of cases can be seamlessly filed, facilitating a
            smoother and more streamlined judicial process. By leveraging technological solutions, JCMS
            simplifies and accelerates the filing process, offering numerous benefits to legal practitioners,
            litigants, and the judiciary alike.
        </p>
    </div>
    <!-- Introduction -->



    <!-- Notice And Calender -->
    <div class=" container1 text-center">
        <div class="row align-items-center">
            <div class="col parent m-2">
                <h3 style=" color: whitesmoke;">Notice Board</h3>
                <div class="child">
                    <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
                        <table class="table table-secondary table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col"><img src="img/calicon.png" alt="cal" height="22px" width="22px">
                                    </th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql="SELECT * FROM notices ORDER BY `date` DESC";
                                    $result = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                     $date=$row['date'];
                                     $cdate=date_create($date);
                                     $fdate=date_format($cdate,"d - m- Y");
                                     $description=$row['description'];
                                     $link=$row['link'];

                                     echo '
                                     <tr>
                                         <th scope="row"><img src="img/calicon.png" alt="cal" height="22px" width="22px"></th>
                                         <td>'.$fdate.'</td>
                                         <td>'.$description.'</td>
                                         <td><a class="btn btn-secondary" href="Notice/'.$link.'">View</a></td>
                                     </tr>
                                     ';
                                    }
                                ?>


                            </tbody>
                        </table>
                    </marquee>
                </div>
            </div>
            <div class="col parent">
                <h3 style=" color: whitesmoke;">Holidays</h3>
                <div class="child">
                    <a href="Notice/high_court_holiday_list_1704176684.pdf" target="_blank">
                        <img src="img/Calender.jpg" alt="Calender" height=445 width=600>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- Notice And Calender -->


    <div class="container mb-2">
        <div class="grid text-center" style="--bs-columns: 3;">
            <div>
                <h3>JCMS - Judicial Case Management System</h3>
                <p align="justify">JCMS Sysytem, which enables electronic filing of cases (E-Cases). Using the
                    JCMS
                    E-Case System every type of cases can be filed before Hon'ble High Court that adopt this
                    E-Case
                    system. Introduction of this JCMS E-Case System is aimed at promoting paperless filing and
                    create time and cost saving efficiencies by adopting technological solution to file cases
                    before
                    various courts in India.</p>
            </div>
            <div>
                <marquee behavior="scroll" direction="left" style="border-radious: 22px;" onmouseover="this.stop();"
                    onmouseout="this.start();">
                    <img src="img/mar/m1.jpeg" alt="jcms" height="200" width="300">
                    <img src="img/mar/m2.jpeg" alt="jcms" height="200" width="300">
                    <img src="img/mar/m3.jpeg" alt="jcms" height="200" width="300">
                    <img src="img/mar/m4.jpeg" alt="jcms" height="200" width="300">
                    <img src="img/mar/m5.jpeg" alt="jcms" height="200" width="300">
                    <img src="img/mar/m6.jpeg" alt="jcms" height="200" width="300">
                    <img src="img/mar/m7.jpeg" alt="jcms" height="200" width="300">
                    <img src="img/mar/m8.jpeg" alt="jcms" height="200" width="300">
                    <img src="img/mar/m9.jpeg" alt="jcms" height="200" width="300">
                    <img src="img/mar/m10.jpeg" alt="jcms" height="200" width="300">
                </marquee>
            </div>
        </div>
    </div>


    <!-- Services Cards End  -->
    <?php include 'footer.php'; ?>
</body>

</html>