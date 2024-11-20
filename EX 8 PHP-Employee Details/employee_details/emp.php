<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h2 {
            text-align: center;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            width: 350px;  /* Increased width */
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;  /* Reduced button size */
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;  /* Slightly smaller font size */
	    width: 50%;
        }
        button:hover {
            background-color: #45a049;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>EMPLOYEE DETAILS</h2>
        <form method="POST" action="">
            <label for="empid">Enter Employee ID</label>
            <input type="text" id="empid" name="empid" required>

            <button type="submit" name="e_details">Show Employee Detail</button>
            <button type="submit" name="update_page">Update Detail</button>
            <button type="submit" name="list_e">Employee List</button>
        </form>
    </div>

    <?php
    if (isset($_POST['e_details'])) {
        $empid = $_POST['empid'];
        header("Location: details.php?empid=" . $empid);
    }
    if (isset($_POST['update_page'])) {
        $empid = $_POST['empid'];
        header("Location: update.php?empid=" . $empid);
    }
    if (isset($_POST['list_e'])) {
        header("Location: list.php");
    }
    ?>
</body>
</html>
