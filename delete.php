<?php
include "db_conn.php";
$id = $_GET['id'];

// Prepare the query using a parameterized statement
$sql = "DELETE FROM crud WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Execute the query
if ($stmt->execute()) {
    // Redirect to the index page with a success message
    header("Location: index.php?msg=Record deleted successfully");
} else {
    // Display an error message
    echo "Failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
