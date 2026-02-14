<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</head>

<body>

    <?php
    try {
        //Database connection
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "jcms";

        $con = mysqli_connect($server, $username, $password, $database);
        // if (mysqli_connect_errno()) {
        //     echo "Connection not success!!" . mysqli_connect_error();
        // }
    } catch (\Throwable $th) {
        echo "
    <center>
    <div class='container  m-3'>
    <div class='card' style='width: 18rem;'>
  <div class='card-body'>
    <h5 class='card-title' style='color:red; font-size:22px; font-weight:600;'>Error 502: Database Conection Error</h5>
    <p class='card-text'>Please contact to administration.</p>
    <a href='index.php' class='card-link'>Go to Home Page</a>
  </div>
</div>
</div>
</center>
    ";
    }
    ?>
</body>

</html>