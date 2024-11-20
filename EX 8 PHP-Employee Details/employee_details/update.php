<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Salary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"] {
            width: 80%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    if (isset($_POST['update_salary'])) {
        $empid = $_POST['empid'];
        $new_salary = $_POST['salary'];

        $sql = "UPDATE EMPDETAILS SET SALARY = '$new_salary' WHERE EMPID = '$empid'";
        if ($conn->query($sql) === TRUE) {
            echo "<h2>Success!</h2>";
            echo "<p>Salary updated successfully.</p>";
        } else {
            echo "<h2>Error!</h2>";
            echo "<p>Error updating salary: " . $conn->error . "</p>";
        }
        $conn->close();
    } else {
        $empid = $_GET['empid'];
        echo '<h2>Update Salary</h2>';
        echo '<form method="POST" action="">
                <label for="empid">Employee ID: </label>
                <input type="text" id="empid" name="empid" value="' . $empid . '" readonly><br>
                <label for="salary">New Salary: </label>
                <input type="text" id="salary" name="salary" required><br>
                <button type="submit" name="update_salary">Update</button>
              </form>';
    }
    ?>
</div>

</body>
</html>
