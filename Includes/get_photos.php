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
    $response = array("success" => false, "error" => "Connection failed: " . $conn->connect_error);
    echo json_encode($response);
    exit();
}

// Fetch all photos from the database
$sql = "SELECT photo, filename FROM photos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $photos = array();

    // Loop through the result set
    while ($row = $result->fetch_assoc()) {
        // Add each photo to the array
        $photo = array(
            "photo" => base64_encode($row["photo"]),
            "filename" => $row["filename"]
        );
        $photos[] = $photo;
    }

    $response = array("success" => true, "photos" => $photos);
    echo json_encode($response);
} else {
    $response = array("success" => false, "error" => "No photos found.");
    echo json_encode($response);
}

// Close the database connection
$conn->close();
?>
