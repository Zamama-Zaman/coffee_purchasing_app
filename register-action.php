<?php 
include("includes/config.php"); 
?>
<?php 
$email = $_POST["em"];
$pw = $_POST["pw"];
$na = $_POST["na"];
$phone = $_POST["ph"];
$address = $_POST["add"];
$dob = $_POST["dob"];

$hpwd=password_hash($pw, PASSWORD_DEFAULT);

// connection with database
$conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
if ($conn->connect_error)
{ 
     trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
}
// add quere

$sql='SELECT * FROM user WHERE email = ?';
$stmt = $conn->prepare($sql); 
if($stmt === false) 
{
    trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
}
$stmt->bind_param('s',$email); 
$stmt->execute();
$stmt->store_result();

echo "Found " . $stmt->num_rows. " records.<br/>";
if($stmt->num_rows > 0){
    // Registeration failed - Email in USE
    header("Location:register.php?status=RFE");
}
else{
    $stmt->close(); 
    // Email Ok
    // insert
    $sql="INSERT INTO user (email, password, name, type, phone, address, dateofbirth) VALUES (?,?,?,'A',?,?,?)"; 
    $stmt = $conn->prepare($sql); 
    if($stmt === false) { 
        trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
    }
    $stmt->bind_param('sssisi',$email,$hpwd,$na,$phone,$address,$dob); 
    $stmt->execute();
    $stmt->close();
    setcookie("useremail", $em, time()+ 60*60*24*30);
    $conn->close(); 
    header("Location:login.php?status=RS");
 }
//closed connection