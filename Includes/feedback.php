
 <?php
    

        	$server_name="Localhost";
        	$user_name="u984052863_sCLQ7";
            $password="May123123!";
            $database_name="u984052863_l8d3L";
        	$conn=new mysqli($server_name,$user_name,$password,$database_name);
        		if ($conn->connect_error)  {
        		die ("connection failed:".$conn->connect_error);
        												}
        												$name=$_POST['name'];
        												$className=$_POST['className'];
        												$rate=$_POST['rate'];
        												$again=$_POST['again'];
        												$feedback=$_POST['feedback'];
        												if(empty($name)||empty($className)||empty($rate)||empty($again)||empty($feedback)) {
        													echo "Please enter all the required fields";
        												}
        												else {
        													$sql = "INSERT INTO Feedback (name, className, rate, again, feedback )
        														VALUES ('$name', '$className', '$rate', '$again','$feedback')";
        														if (!$conn->query($sql)) {echo "Error: " . $sql . "<br>" . $conn->error;}
        														header("Location: ../Includes/homepage.html"); exit();
        												}
        												
        												$conn->close();
        												
        											
                                        
         ?>