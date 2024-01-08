<?php
include 'connect.inc.php';

$sql = "SELECT * FROM `Type`";

try {
    // Prepare the SQL query
    $stmt = $pdo->prepare($sql);

    // Execute the statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the result set
    echo "<table class='table table-striped table-bordered table-hover'>";
    echo "<thead class='thead-dark'><tr>";
    foreach ($result[0] as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr></thead><tbody>";
    foreach ($result as $row) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table>";
} catch (PDOException $e) {
    // Handle any errors
    die("Error: " . $e->getMessage());
}


$pdo = null;
?>