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

// Check if booking ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete booking
    $sql = "DELETE FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: view_bookings.php?message=Booking deleted successfully");

        exit;
    } else {
        echo "Error deleting booking: " . $conn->error;
    }
} else {
    die("Invalid request.");
}

$conn->close();
?>
