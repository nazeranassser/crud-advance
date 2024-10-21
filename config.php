<?php
$servername = "localhost"; // Your database server, typically localhost
$username = "root";         // Your database username
$password = "";             // Your database password (leave empty if none)
$dbname = "mydb";          // Your database name

try {
    // Create a PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optionally, uncomment the line below for debugging purposes
    // echo "Connected successfully"; 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
