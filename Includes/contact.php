        <?php
        
        $server_name="Localhost";
$user_name="u984052863_sCLQ7";
$password="May123123!";
$database_name="u984052863_l8d3L";
// Create a new connection
$conn = new mysqli($server_name, $user_name, $password, $database_name);
        		if ($conn->connect_error)  {
        		die ("connection failed:".$conn->connect_error);
        												}
        												$name=$_POST['name'];
        												$email=$_POST['email'];
        											$subject=$_POST['subject'];
        												$message=$_POST['message'];
        											
        												if(empty($name)||empty($email)||empty($subject)||empty($message)) {
        													echo "Please enter all the required fields";
        												}
        												else {
        													$sql = "INSERT INTO Contact (Name, Email, Subject, Comments)
        														VALUES ('$name', '$email','$subject','$message')";
        														if (!$conn->query($sql)) {echo "Error: " . $sql . "<br>" . $conn->error;}
        												
        												echo '<script>window.location.href = "../Includes/homepage.html";</script>';
        													exit();
        														
        														
        												}
        												
        												$conn->close();
         ?>