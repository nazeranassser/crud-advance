<?php
include 'config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM students WHERE id = :id");
    $stmt->execute([':id' => $id]);
    header("Location: index.php");
} else {
    echo "No ID specified.";
}
?>
