<?php
// Connect to the database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "hotel_booking";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

// Start the HTML document
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            position: fixed;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 150px;
            padding: 20px;
            flex-grow: 1;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="topbar">
        <span>Hotel Name</span>
        <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
    </div>
    <div class="sidebar">
        <h4 class="text-center">Admin Dashboard</h4>
        <a href="admin_dashboard.php">Home</a>
        <a href="users.php">Users</a>
        <a href="edit_rooms.php">Edit Rooms</a>
        <a href="update_room_details.php">Update Room Details</a>
    </div>
    <div class="content">
        <?php
        if ($result->num_rows > 0) {
            echo "<h3>Users</h3>";
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr></thead><tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>";
                echo "<form method='POST' action='delete_user.php' style='display:inline;'>";
                echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "' />";
                echo "<button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No users found.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
