<?php
session_start();
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "register";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 $username = $_POST['username'];
 $password_2 = $_POST['password_2'];
 $query = "select * from registerform where username='$username' and password_2='$password_2'";
 $result = mysqli_query($conn,$query);
 $count= mysqli_num_rows($result);
 if($count>0){
   //  echo "login Sucessful!";
   header("Location: student.php");
 }
 else{
    echo "login failed";
 }
?>
