<?php include("includes/config.php"); ?>
<?php 
$email = $_POST["em"];
$name = $_POST["na"];
$phone = $_POST["ph"];
$address = $_POST["add"];
$dob = $_POST["dob"];
setcookie("useremail", $email, time()+ 60*60*24*30);


// connection with database
$conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
if ($conn->connect_error)
{ 
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
}
// add quere
$sql='UPDATE user SET email=?, name=?, phone=?, address=?, dateofbirth=? WHERE id=' .$_SESSION["uid"];

$stmt = $conn->prepare($sql); 
if($stmt === false) 
{ 
    trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
} 
$stmt->bind_param('ssisi',$email,$name,$phone,$address,$dob); 
$stmt->execute();

// end conntection
session_destroy();
$conn->close();
header("Location:login.php?status=ESU");




