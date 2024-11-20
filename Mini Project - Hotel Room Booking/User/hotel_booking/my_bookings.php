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
    // Do not output the connection success message
} catch (Exception $e) {
    echo "Connection error: " . $e->getMessage();
    exit();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to view your bookings.";
    exit();
}

// Retrieve user ID and name from session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'] ?? ''; // Avoid warnings if 'user_name' is not set

// Handle cancellation request
if (isset($_POST['cancel_booking'])) {
    $booking_id = $_POST['booking_id'];
    
    // Delete the booking from the database
    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $booking_id, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Booking cancelled successfully.');</script>";
    } else {
        echo "<script>alert('Failed to cancel booking.');</script>";
    }

    $stmt->close();
}

// Fetch all bookings for the logged-in user
$stmt = $conn->prepare("SELECT id, room_type, checkin_date, checkout_date, number_of_members FROM bookings WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$bookings = $result->fetch_all(MYSQLI_ASSOC);

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="my_bookings.css"> <!-- Link to your custom CSS -->
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h2>
        <h3>Your Booked Rooms</h3>
        <?php if (count($bookings) > 0): ?>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Room Type</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                        <th>Number of Members</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($booking['room_type']); ?></td>
                            <td><?php echo htmlspecialchars($booking['checkin_date']); ?></td>
                            <td><?php echo htmlspecialchars($booking['checkout_date']); ?></td>
                            <td><?php echo htmlspecialchars($booking['number_of_members']); ?></td>
                            <td>
                                <!-- Form to cancel a booking -->
                                <form action="my_bookings.php" method="post" style="display:inline;">
                                    <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                    <button type="submit" name="cancel_booking" class="btn btn-danger btn-sm">Cancel Room</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No rooms booked yet.</p>
        <?php endif; ?>
        <a href="index.php" class="btn btn-primary mt-3">Go to Home</a>
    </div>
</body>
</html>
