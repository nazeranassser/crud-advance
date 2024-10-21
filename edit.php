<?php
include 'config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE students SET firstname = :firstname, lastname = :lastname, email = :email WHERE id = :id");
    $stmt->execute([':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':id' => $id]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="POST">
        <label>First Name:</label>
        <input type="text" name="firstname" value="<?= htmlspecialchars($student['firstname']) ?>" required>
        <br>
        <label>Last Name:</label>
        <input type="text" name="lastname" value="<?= htmlspecialchars($student['lastname']) ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
