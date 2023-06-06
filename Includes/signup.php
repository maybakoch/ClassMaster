<?php

// Database connection parameters
$servername = "Localhost";
$username = "u984052863_sCLQ7";
$password = "May123123!";
$dbname = "u984052863_l8d3L";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the registration form is submitted
if (isset($_POST["submit"])) {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare the SQL statement to check if the user already exists
    $checkStmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkStmt->store_result();

    // Check if the user already exists
    if ($checkStmt->num_rows > 0) {
        echo '<script>alert("The user already exists.");</script>';
        echo '<script>window.location.href = "../index.html";</script>';
        exit();
    }

    // Prepare the SQL statement to insert the new user
    $insertStmt = $conn->prepare("INSERT INTO users (fullname, username, password) VALUES (?, ?, ?)");

    // Check if the prepare statement is successful
    if ($insertStmt) {
        $insertStmt->bind_param("sss", $fullname, $username, $password);

        // Execute the statement
        if ($insertStmt->execute()) {
            echo '<script>alert("Thank you for signing up to our website. Please enter your username and password in the next screen.");</script>';
            echo '<script>window.location.href = "../index.html";</script>';
            exit();
        } else {
            echo "Error executing SQL statement: " . $insertStmt->error;
        }

        // Close the prepared statement
        $insertStmt->close();
    } else {
        echo "Error preparing SQL statement: " . $conn->error;
    }

    // Close the check statement
    $checkStmt->close();
}

// Close the database connection
$conn->close();

?>
