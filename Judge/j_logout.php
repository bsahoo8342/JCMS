<?php
session_start();

session_unset();
session_destroy();

header("location: j_login.php");
exit;
