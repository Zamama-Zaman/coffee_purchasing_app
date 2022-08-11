<?php include("includes/config.php"); ?>
<?php 
$email = $_POST["em"];
$password = $_POST["pw"];


// connection with database
$conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
if ($conn->connect_error)
 { 
     trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
 }
// add quere
$sql='SELECT * FROM user WHERE email= ?';
$stmt = $conn->prepare($sql); 
if($stmt === false) 
{ 
    trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
} 
$stmt->bind_param('s',$email); 
$stmt->execute(); 
$stmt->store_result(); 

echo "Found " . $stmt->num_rows. " records.<br/>";
if($stmt->num_rows===1){
    // success - Email Match
    $stmt->bind_result($id,$em,$hpwd,$na,$ty,$phone,$address,$dob); 
    while ($stmt->fetch()) 
    { 
       $matched = false;
       $matched = password_verify($password, $hpwd);
        if($matched){
            // Complete Success - Password also Matched 
       $_SESSION["uid"]=$id;
       $_SESSION["uemail"]=$em;
       $_SESSION["uname"]=$na;
       $_SESSION["utype"]=$ty;
       $_SESSION["uphone"]=$phone;
       $_SESSION["uaddress"]=$address;
       $_SESSION["udob"]=$dob;
       $_SESSION["loggedin"]=true;
       setcookie("useremail", $em, time()+ 60*60*24*30);
       header("Location: index.php");
       exit;
        }
        else{
            header("Location: Login.php?status=LFP");
            exit;
        }
    } 
    $stmt->free_result();
    
    header("Location: index.php");
}
else{
    // fail
    header("Location: Login.php?status=LFE");
}

 


// end conntection

$conn->close();





