<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ano = $_POST['ano'];
    $ttype = $_POST['ttype'];
    $tamount = $_POST['tamount'];

    $result = $conn->query("SELECT BALANCE FROM ACCOUNT WHERE ANO = $ano");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_balance = $row['BALANCE'];

        if ($ttype == 'D') {
            $new_balance = $current_balance + $tamount;
        } elseif ($ttype == 'W') {
            if ($tamount > $current_balance) {
                echo "<p class='error-message'>Error: Insufficient balance.</p>";
                exit();
            }
            $new_balance = $current_balance - $tamount;
        } else {
            echo "<p class='error-message'>Error: Invalid transaction type.</p>";
            exit();
        }

        $stmt = $conn->prepare("INSERT INTO TRANSACTION (ANO, TTYPE, TDATE, TAMOUNT) VALUES (?, ?, CURDATE(), ?)");
        $stmt->bind_param("isd", $ano, $ttype, $tamount);
        $stmt->execute();

        $stmt_update = $conn->prepare("UPDATE ACCOUNT SET BALANCE = ? WHERE ANO = ?");
        $stmt_update->bind_param("di", $new_balance, $ano);
        $stmt_update->execute();

        echo "<p class='success-message'>Transaction successful! New balance: $" . $new_balance . "</p>";
        $stmt->close();
        $stmt_update->close();
    } else {
        echo "<p class='error-message'>Error: Account not found.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perform a Transaction</title>
    <style>
        /* Base styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            color: #333;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
        }

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
            width: 100%;
        }

        input[type="number"], input[type="text"] {
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
    <h2>Perform a Transaction</h2>
    <form action="transaction.php" method="POST">
        <label for="ano">Account Number:</label>
        <input type="number" id="ano" name="ano" required><br><br>

        <label for="ttype">Transaction Type (D for Deposit, W for Withdrawal):</label>
        <input type="text" id="ttype" name="ttype" maxlength="1" required><br><br>

        <label for="tamount">Amount:</label>
        <input type="number" step="0.01" id="tamount" name="tamount" required><br><br>

        <input type="submit" value="Submit Transaction">
    </form>
</div>

</body>
</html>
