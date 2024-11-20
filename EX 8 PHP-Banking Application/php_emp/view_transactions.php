<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ano = $_POST['ano'];

    $stmt = $conn->prepare("SELECT * FROM TRANSACTION WHERE ANO = ? ORDER BY TDATE DESC");
    $stmt->bind_param("i", $ano);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Transaction History for Account Number: $ano</h3>";
        echo "<table class='styled-table'><thead><tr><th>TID</th><th>Type</th><th>Date</th><th>Amount</th></tr></thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['TID'] . "</td><td>" . ($row['TTYPE'] == 'D' ? 'Deposit' : 'Withdrawal') . "</td><td>" . $row['TDATE'] . "</td><td>" . $row['TAMOUNT'] . "</td></tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='no-transactions'>No transactions found for account number $ano.</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h2, h3 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            color: #555;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }

        .styled-table thead tr {
            background-color: #007bff;
            color: #ffffff;
        }

        .styled-table th, .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr:nth-child(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .no-transactions {
            background-color: #ffcccc;
            color: #cc0000;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            form {
                padding: 15px;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<h2>View Transaction History</h2>
<form action="view_transactions.php" method="POST">
    <label for="ano">Account Number:</label>
    <input type="number" id="ano" name="ano" required><br><br>
    <input type="submit" value="View Transactions">
</form>

</body>
</html>
