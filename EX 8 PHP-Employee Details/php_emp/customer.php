<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cname = $_POST['cname'];
    
    $stmt = $conn->prepare("INSERT INTO CUSTOMER (CNAME) VALUES (?)");
    $stmt->bind_param("s", $cname);
    
    if ($stmt->execute()) {
        echo "<p class='success-message'>New customer added successfully!</p>";
    } else {
        echo "<p class='error-message'>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customers</title>
    <style>
        /* Base styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            color: #333;
            padding: 20px;
            margin: 0;
        }

        h2 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Form styling */
        form {
            margin-bottom: 30px;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            display: inline-block;
        }

        input[type="text"], input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            margin: 8px 0;
        }

        input[type="text"] {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #3498db;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #2980b9;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Success and error message styling */
        .success-message {
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .error-message {
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Customer</h2>
    <form action="customer.php" method="POST">
        <label for="cname">Customer Name:</label>
        <input type="text" id="cname" name="cname" required><br><br>
        <input type="submit" value="Add Customer">
    </form>

    <h2>Existing Customers</h2>
    <?php
    $result = $conn->query("SELECT * FROM CUSTOMER");
    if ($result->num_rows > 0) {
        echo "<table><tr><th>CID</th><th>Name</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["CID"] . "</td><td>" . $row["CNAME"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No customers found.</p>";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
