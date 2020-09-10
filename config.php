<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered</title>
    <style>
button{
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.container { 
  height: 200px;
  position: relative;
  border: 3px white; 
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}</style>
</head>
<body>
<h1 align="center">Registration done sucessfully!</h1>
<div class="container">
  <div class="center">
<button align= "center" onclick="document.location='test.php'">view database</button>
</div>
</div>
</body>
</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];

	// Database connection
	$conn = new mysqli('localhost','root','','accounts');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, contact) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param ("sssssi", $firstName, $lastName, $gender, $email, $password, $contact);
		$stmt->execute();
        echo '<script>alert("Registered sucessfully!")</script>';;
		$stmt->close();
        $conn->close(); 
        
	}
?>