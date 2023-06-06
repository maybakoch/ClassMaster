<?php
// Database connection parameters
$server_name="Localhost";
$user_name="u984052863_sCLQ7";
$password="May123123!";
$database_name="u984052863_l8d3L";
// Create a new connection
$conn = new mysqli($server_name, $user_name, $password, $database_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo $conn->error;
}

// Check if a file was uploaded
if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
    $photo = $_FILES["photo"];
    
    // Extract file information
    $name = $photo["name"];
    $type = $photo["type"];
    $tmp_name = $photo["tmp_name"];
    
    // Read the contents of the file
    $data = file_get_contents($tmp_name);
    
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO photos (photo, filename) VALUES (?, ?)");
    $stmt->bind_param("ss", $data, $name);
    
    // Execute the statement
    $stmt->execute();
    
    // Close the statement
    $stmt->close();
   
    echo '<script>alert("Your photo has been successfully uploaded! You are taken to the home page for you to see.");</script>';
     
      echo '<script>  window.location.href = "../Includes/homepage.html";</script>';


 exit();
   
    
} else {
    echo '<script>alert("No image selected");</script>';
    echo '<script>window.sessionStorage.setItem("previousPage", window.location.href);</script>';
    echo '<script>window.location.href = "../Includes/ongoing_activity.html";</script>';
}

// Close the database connection
$conn->close();
?>