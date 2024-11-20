<?php
// Start session
session_start();

// Database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "hotel_booking"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, user_id, room_type, checkin_date, checkout_date, number_of_members FROM bookings"; 
$result = $conn->query($sql);

if (!$result) {
    die("Error executing query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Booking Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Admin - Booking Management</h2>

        <?php
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-info'>" . htmlspecialchars($_GET['message']) . "</div>";
        }
        ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Room Type</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Number of Members</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["user_id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["room_type"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["checkin_date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["checkout_date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["number_of_members"]) . "</td>";
                        echo "<td><a href='delete.php?id=" . urlencode($row["id"]) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this booking?\")'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No bookings found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
