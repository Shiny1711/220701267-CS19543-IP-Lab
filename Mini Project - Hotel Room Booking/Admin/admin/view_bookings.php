<?php
// Start session to manage user state
session_start(); // Start a session

// Database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "hotel_booking";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a user_id is provided in the URL
if (isset($_GET['user_id'])) {
    $_SESSION['user_id'] = intval($_GET['user_id']); // Set user_id in session
}

// Use the user_id from session if available
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Button to go back to the previous page
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous_page = htmlspecialchars($_SERVER['HTTP_REFERER']);
}

// Link to CSS
echo '<link rel="stylesheet" type="text/css" href="styles.css">';
?>

<div class="container">
    <a href="edit_rooms.php" class="btn btn-secondary mb-3">Go Back</a>

    <?php
    if ($user_id) {
        // Fetch bookings data for the specific user
        $sql_bookings = "SELECT id, room_type, checkin_date, checkout_date, number_of_members FROM bookings WHERE user_id = ?";
        $stmt = $conn->prepare($sql_bookings);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result_bookings = $stmt->get_result();

        echo "<h3>Bookings for User ID: " . htmlspecialchars($user_id) . "</h3>";
        if ($result_bookings->num_rows > 0) {
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead><tr><th>ID</th><th>Room Type</th><th>Check-in Date</th><th>Check-out Date</th><th>Number of Members</th><th>Actions</th></tr></thead><tbody>";

            while ($booking = $result_bookings->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($booking['id']) . "</td>";
                echo "<td>" . htmlspecialchars($booking['room_type']) . "</td>";
                echo "<td>" . htmlspecialchars($booking['checkin_date']) . "</td>";
                echo "<td>" . htmlspecialchars($booking['checkout_date']) . "</td>";
                echo "<td>" . htmlspecialchars($booking['number_of_members']) . "</td>";

                // Edit and Delete buttons for bookings
                echo "<td>";
                echo "<a href='edit_booking.php?id=" . urlencode($booking['id']) . "' class='btn btn-primary btn-sm'>Edit</a> ";
                echo "<a href='delete_booking.php?id=" . urlencode($booking['id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this booking?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No bookings found for this user.</p>";
        }
    } else {
        echo "<p>Select a user to view bookings.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>
