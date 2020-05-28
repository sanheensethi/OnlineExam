<?php
$servername = "localhost";
$username = "root";
$password = "";
$dab = "newcomp";
try {
    $db = new PDO("mysql:host=$servername;dbname=$dab", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>