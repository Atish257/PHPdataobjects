<?php
$servername = "sql2.njit.edu";
$username = "an478";
$password = "8QD1YLZg";

try {
    $conn = new PDO("mysql:host=$servername;dbname=an478", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
 ?>