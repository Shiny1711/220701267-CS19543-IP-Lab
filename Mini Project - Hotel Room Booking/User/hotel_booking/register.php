<?php
// register.php
$servername = "localhost:3307"; // usually localhost
$username = "root"; // your MySQL username
$password = ""; // your MySQL password (default is empty for XAMPP)
$dbname = "hotel_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if ($name && $email && $phone && $password) {
        // Check if the email already exists
        $check_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $check_email->store_result();

        if ($check_email->num_rows > 0) {
            // Email already exists
            echo "Error: Email is already registered. Please use another email.";
        } else {
            // Email does not exist, proceed with registration
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

            // Prepare and bind the statement
            $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);

            // Execute the query
            if ($stmt->execute()) {
                // Redirect to success page after successful registration
                header("Location: success.php");
                exit(); 
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }

        // Close the email check statement
        $check_email->close();
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request.";
}

// Close the connection
$conn->close();
?>
