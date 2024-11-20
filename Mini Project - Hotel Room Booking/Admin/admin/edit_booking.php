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

    // Fetch booking details
    $sql = "SELECT checkin_date, checkout_date FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();

    if (!$booking) {
        die("Booking not found.");
    }
    
    // Update booking dates on form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $checkin_date = $_POST['checkin_date'];
        $checkout_date = $_POST['checkout_date'];
        
        $update_sql = "UPDATE bookings SET checkin_date = ?, checkout_date = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssi", $checkin_date, $checkout_date, $id);
        
        if ($update_stmt->execute()) {
           header("Location: view_bookings.php?message=Booking deleted successfully");

            exit;
        } else {
            echo "Error updating booking: " . $conn->error;
        }
    }
} else {
    die("Invalid request.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Booking Dates</h2>
        <form method="POST">
            <div class="form-group">
                <label for="checkin_date">Check-in Date:</label>
                <input type="date" id="checkin_date" name="checkin_date" class="form-control" value="<?php echo htmlspecialchars($booking['checkin_date']); ?>" required>
            </div>
            <div class="form-group">
                <label for="checkout_date">Check-out Date:</label>
                <input type="date" id="checkout_date" name="checkout_date" class="form-control" value="<?php echo htmlspecialchars($booking['checkout_date']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Booking</button>
            <a href="admin_dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
