<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        .hotel-name {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="topbar">
        <span>Admin Dashboard</span>
        <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
    </div>
    <div class="sidebar">
        <h4 class="text-center">Admin Dashboard</h4>
        <a href="admin_dashboard.php">Home</a>
        <a href="users.php">Users</a>
        <a href="edit_rooms.php">Edit Rooms</a>
        <a href="update_room_details.php">Update Room Details</a>
    </div>
    <div class="content" id="mainContent">
        <h3 class="hotel-name">Hotel Shines</h3>
        <p>Welcome to the Admin Dashboard of Your Hotel Name! This platform empowers you to efficiently manage our hotel operations, from overseeing guest bookings and managing room availability to handling user accounts. As an essential part of our team, your contributions help ensure that every guest enjoys a seamless and memorable experience. Stay updated with the latest bookings, view critical analytics, and make informed decisions that drive our hotel's success. Together, let’s continue to provide exceptional service and hospitality!</p>
    </div>
</body>
</html>
