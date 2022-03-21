<?php 
     // Defining constant php variable for local host
    define('DB_host', 'localhost:3307');
    define('DB_username', 'root');
    define('DB_password', '');
    define('DB_name', 'ssgcBank');
    $conn = mysqli_connect(DB_host, DB_username, DB_password, DB_name);
    if (!$conn) {
        die("connection failed" . mysqli_connect_error());
         echo "Connection Fail";
    }
?>