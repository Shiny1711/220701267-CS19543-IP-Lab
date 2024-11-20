<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ano = $_POST['ano'];

    $stmt = $conn->prepare("SELECT * FROM TRANSACTION WHERE ANO = ? ORDER BY TDATE DESC");
    $stmt->bind_param("i", $ano);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        echo "<h3>Transaction History for Account Number: $ano</h3>";
        echo "<table>";
        echo "<tr><th>Transaction ID (TID)</th><th>Type</th><th>Date</th><th>Amount</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['TID'] . "</td><td>" . ($row['TTYPE'] == 'D' ? 'Deposit' : 'Withdrawal') . "</td><td>" . $row['TDATE'] . "</td><td>$" . $row['TAMOUNT'] . "</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<p class='error-message'>No transactions found for account number $ano.</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Transaction History</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f7f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            display: inline-block;
        }

        input[type="number"], input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 15px;
        }

        input[type="number"] {
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #2980b9;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .error-message {
            color: #e74c3c;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>View Transaction History</h2>
    <form action="view_transactions.php" method="POST">
        <label for="ano">Account Number:</label>
        <input type="number" id="ano" name="ano" required><br><br>

        <input type="submit" value="View Transactions">
    </form>
</div>

</body>
</html>
