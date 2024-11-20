<?php
// Start session to manage user authentication
session_start();

// Database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "hotel_booking";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    // Database connected successfully
} catch (Exception $e) {
    echo "Connection error: " . $e->getMessage();
    exit();
}

// Check if the form data is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $room_type = $_POST['room_type'] ?? '';
    $checkin_date = $_POST['checkin'] ?? '';
    $checkout_date = $_POST['checkout'] ?? '';
    $number_of_members = $_POST['members'] ?? '';

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "You must be logged in to book a room.";
        exit();
    }

    // Retrieve user ID from session
    $user_id = $_SESSION['user_id'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, room_type, checkin_date, checkout_date, number_of_members) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $user_id, $room_type, $checkin_date, $checkout_date, $number_of_members);

    // Execute the statement
    if ($stmt->execute()) {
        // Booking successful, display the confirmation page
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Booking Successful - Hotel Booking</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="rooms.css"> <!-- Your existing styles -->
            <link rel="stylesheet" href="booking.css"> <!-- Link to the new CSS file -->
        </head>
        <body>
            <div class="container mt-5">
                <h2>Booking Successful!</h2>
                <div class="details">
                    <h3>Your Booking Details</h3>
                    <p><strong>Room Type:</strong> <?php echo htmlspecialchars($room_type); ?></p>
                    <p><strong>Check-In Date:</strong> <?php echo htmlspecialchars($checkin_date); ?></p>
                    <p><strong>Check-Out Date:</strong> <?php echo htmlspecialchars($checkout_date); ?></p>
                    <p><strong>Number of Rooms:</strong> <?php echo htmlspecialchars($number_of_members); ?></p>
                </div>
                <a href="trans.php" class="btn btn-primary mt-3">Make Payment</a>
<a href="index.php" class="btn btn-primary mt-3">Home page</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No data received.";
}
?>
