<?php
// Start session to store user information
session_start();

// Database connection
$servername = "localhost:3307"; // typically localhost, adjust if necessary
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "hotel_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if ($email && $password) {
        // Prepare statement to check email
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        // Check if the user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $name, $hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, store user info in session
                $_SESSION['user_id'] = $user_id;
                $_SESSION['name'] = $name;

                // Redirect to the homepage or another page after successful login
                header("Location: index.php");
                exit();
            } else {
                echo "Error: Incorrect password.";
            }
        } else {
            echo "Error: No account found with that email.";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request.";
}

// Close connection
$conn->close();
?>
