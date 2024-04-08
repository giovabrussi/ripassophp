<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "cinema";

mysqli_report(MYSQLI_REPORT_OFF);

$connection = new mysqli($servername, $user, $password, $dbname);