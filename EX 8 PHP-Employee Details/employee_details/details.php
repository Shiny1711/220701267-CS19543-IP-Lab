<?php
include "db.php";
$empid = $_GET['empid'];
$sql = "SELECT * FROM EMPDETAILS WHERE EMPID = '$empid'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .details-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .employee-info {
            margin: 20px 0;
            line-height: 1.6;
            font-size: 16px;
            color: #555;
        }
        .employee-info span {
            font-weight: bold;
            color: #333;
        }
        .not-found {
            color: red;
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="details-container">
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Employee Details</h2>";
        echo "<div class='employee-info'>";
        echo "<span>EMPID:</span> " . $row["EMPID"] . "<br>";
        echo "<span>Name:</span> " . $row["ENAME"] . "<br>";
        echo "<span>Designation:</span> " . $row["DESIG"] . "<br>";
        echo "<span>Department:</span> " . $row["DEPT"] . "<br>";
        echo "<span>Date of Joining:</span> " . $row["DOJ"] . "<br>";
        echo "<span>Salary:</span> $" . $row["SALARY"] . "<br>";
        echo "</div>";
    } else {
        echo "<div class='not-found'>Employee ID not found.</div>";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
