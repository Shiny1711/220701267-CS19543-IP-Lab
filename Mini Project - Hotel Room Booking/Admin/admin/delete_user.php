<?php
// Start session and database connection
session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "hotel_booking";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user ID is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare SQL statement to delete the user
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect back to users page with a success message
        header("Location: users.php?message=User deleted successfully");
        exit;
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    die("Invalid request.");
}

$conn->close();
?>
