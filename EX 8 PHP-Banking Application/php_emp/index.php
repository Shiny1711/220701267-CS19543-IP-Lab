<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Application</title>
    <style>
        /* Base styling for the entire page */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #e0eafc, #cfdef3); /* Softer gradient background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Styling for the main container */
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* Enhanced shadow */
            text-align: center;
            width: 100%;
            max-width: 450px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        }

        /* Hover effect to enhance the container's look */
        .container:hover {
            transform: scale(1.03); /* Slight zoom on hover */
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.3); /* Darker shadow */
            background-color: #f8f9fa; /* Subtle background color change */
        }

        /* Styling for the header */
        h1 {
            color: #34495e;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 600; /* Bolder font weight */
            letter-spacing: 1px; /* Letter spacing for a modern look */
        }

        /* Remove bullet points from the list */
        ul {
            list-style-type: none;
            padding: 0;
        }

        /* Style each list item */
        li {
            margin: 15px 0;
        }

        /* Button-like styling for links */
        a {
            text-decoration: none;
            color: #ffffff;
            background-color: #3498db; /* Slightly lighter blue */
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            display: inline-block;
            transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Button shadow */
        }

        /* Hover effect for the links */
        a:hover {
            background-color: #2980b9; /* Darker blue */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Stronger shadow */
            transform: translateY(-2px); /* Slight lift effect */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Banking Application</h1>
        <ul>
            <li><a href="customer.php">Add Customers</a></li>
            <li><a href="account.php">Add Accounts</a></li>
            <li><a href="transaction.php">Manage Transactions</a></li>
            <li><a href="view_transactions.php">View Transaction History</a></li>
        </ul>
    </div>
</body>
</html>
