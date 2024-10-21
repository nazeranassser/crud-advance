<?php

include 'config.php'; 
try {
    $sql = "SELECT id, firstname, lastname, email FROM students";
    $result = $conn->query($sql);


    if ($result->rowCount() > 0) {

        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>

        </tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";

            echo "<td>
            <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
            <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
          </td>";


            echo "</tr>";
        }


        echo "</table>";
    } else {
        echo "No results found.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>