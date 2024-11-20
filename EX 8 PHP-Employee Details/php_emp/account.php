<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cid = $_POST['cid'];
    $atype = $_POST['atype'];
    $balance = $_POST['balance'];
    
    $stmt = $conn->prepare("INSERT INTO ACCOUNT (ATYPE, BALANCE, CID) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $atype, $balance, $cid);
    
    if ($stmt->execute()) {
        echo "<p class='success-message'>New account added successfully!</p>";
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
    <title>Manage Accounts</title>
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

        input[type="text"], input[type="number"], input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            margin: 8px 0;
        }

        input[type="number"], input[type="text"] {
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
    <h2>Add a New Account</h2>
    <form action="account.php" method="POST">
        <label for="cid">Customer ID:</label>
        <input type="number" id="cid" name="cid" required><br><br>
        
        <label for="atype">Account Type (S for Savings, C for Current):</label>
        <input type="text" id="atype" name="atype" maxlength="1" required><br><br>

        <label for="balance">Initial Balance:</label>
        <input type="number" step="0.01" id="balance" name="balance" required><br><br>
        
        <input type="submit" value="Add Account">
    </form>

    <h2>Existing Accounts</h2>
    <?php
    $result = $conn->query("SELECT * FROM ACCOUNT");
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Account No (ANO)</th><th>Account Type</th><th>Balance</th><th>Customer ID (CID)</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ANO"] . "</td><td>" . $row["ATYPE"] . "</td><td>" . $row["BALANCE"] . "</td><td>" . $row["CID"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No accounts found.</p>";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
