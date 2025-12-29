<?php
require_once 'includes/config.php';

// Get FAQ ID
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

// Delete FAQ
$sql = "DELETE FROM faqs WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
