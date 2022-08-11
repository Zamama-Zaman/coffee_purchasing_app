<?php include("includes/config.php"); ?>
<?php 
$pw1 = $_POST["pw1"];
$pw2 = $_POST["pw2"];



if ($pw1==$pw2){
    $hpwd=password_hash($pw1, PASSWORD_DEFAULT);

    // connection with database
    $conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
    if ($conn->connect_error)
    { 
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
    }
    // add quere
    $sql='UPDATE user SET password=? WHERE id=' .$_SESSION["uid"];

    $stmt = $conn->prepare($sql); 
    if($stmt === false) 
    { 
        trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
    } 
    $stmt->bind_param('s',$hpwd); 
    $stmt->execute();
 
    // end conntection
    session_destroy();
    $conn->close();
    header("Location:login.php?status=PSU");

}

else{
    header("Location:updatepassword.php?status=PDM");
}



