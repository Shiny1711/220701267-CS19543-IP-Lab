<?php
// Start session (if needed)
session_start();

// Database connection
$servername = "localhost:3307";  // Ensure the correct port is used
$username = "root";
$password = "";
$dbname = "hotel_booking";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);  // Ensure 'id' is an integer

    // Prepare the delete query
    $sql = "DELETE FROM bookings WHERE id = ?";
    
    // Prepare statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);  // Bind the 'id' parameter

        // Execute the query
        if ($stmt->execute()) {
            // If the query was successful, redirect to admin.php with success message
            header("Location: admin.php?message=Booking deleted successfully");
            exit();
        } else {
            // If execution failed, redirect with an error message
            header("Location: admin.php?message=Error deleting booking: " . $stmt->error);
            exit();
        }
        $stmt->close();  // Close the statement
    } else {
        // If there was an error preparing the query
        header("Location: admin.php?message=Error preparing delete statement: " . $conn->error);
        exit();
    }
} else {
    // If 'id' is not set or invalid, redirect with an error message
    header("Location: admin.php?message=Invalid booking ID");
    exit();
}

// Close the database connection
$conn->close();
?>
