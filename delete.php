<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";
  


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$delete =$_GET['delete'];
$sql = "delete from student where id = '$delete'";
if(mysqli_query($conn,$sql)){
    header("location:crud.php");
}
?>