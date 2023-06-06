<?php
// Database connection parameters
$servername="Localhost";
$username="u984052863_sCLQ7";
$password="May123123!";
$dbname="u984052863_l8d3L";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login form is submitted
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare the SQL statement to check if the username and password exist in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    // Check if a row is returned from the query
    if ($stmt->fetch()) {
        // Valid credentials
        echo "success";
    } else {
        // Invalid credentials
        echo "error";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();

?>
