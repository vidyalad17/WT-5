<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database table</title>
    <style>
    table{
        border-collapse: collapse;
        width: 50%;
        color: black;
        font-family: monospace;
        font-size: 15px;
        text-align: left;
    }
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
    th.{background-color: #588c7e;
        color:white;
}
</style>
</head>
<body>
<h1 align= "center">Database View</h1>
<table>
<tr>
    <th>ID</th>
    <th>First name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Email</th>
    <th>Phone number</th>
</tr>
<?php
$conn=mysqli_connect("localhost","root","","accounts");
if ($conn-> connect_error){
    die("connection failed:". $conn-> connect_error);
    }

$sql="SELECT id, firstName, lastName, gender, email, contact from registration";
$result= $conn->query($sql);
if ($result->num_rows > 0 ){
    while ($row = $result-> fetch_assoc()){
    echo "<tr><td>". $row["id"] ."</td><td>".$row["firstName"] ."</td><td>" .$row["lastName"]."</td><td>" .$row["gender"] ."</td><td>".$row["email"] ."</td><td>" .$row["contact"] ."</td></tr>";    
    }
    echo "</table>";
}
else{
    echo " NO DATA FOUND!";
}
$conn-> close();

?>
</table>
    
</body>
</html>