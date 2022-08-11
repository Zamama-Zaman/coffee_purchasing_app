<?php include("includes/config.php"); ?>
<?php 
$cid = $_GET["cid"];
$cname = $_POST["cna"];
$cprice = $_POST["cp"];
$csize = $_POST["cs"];
$ctype = $_POST["cty"];
$file = $_FILES["userfile"]["name"];

// connection with database
$conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
if ($conn->connect_error)
{ 
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
}
// add quere
$sql='UPDATE coffee SET Cname=?, Cprice=?, Csize=?, Ctype=?, Cimage=? WHERE Cid=?';

$stmt = $conn->prepare($sql); 
if($stmt === false) 
{ 
    trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
} 
$stmt->bind_param('sssssi',$cname,$cprice,$csize,$ctype,$file,$cid); 
$stmt->execute();

$stmt->close();

// end conntection
$conn->close();




$maxFileSize= 5 * 1024 * 1024;
if ((($_FILES["userfile"]["type"] == "image/jpeg") || ($_FILES["userfile"]["type"] == "image/pjpeg")) && ($_FILES["userfile"]["size"] < $maxFileSize)) 
    { 
    if ($_FILES["userfile"]["error"] > 0) 
        { 
            echo "Return Code: " . $_FILES["userfile"]["error"] . "<br/>"; 
        } 
    else 
        { 
            move_uploaded_file($_FILES["userfile"]["tmp_name"],"cat-image/".$_FILES["userfile"]["name"]);
            header("Location:cat.php?status=FUS");   
        } 
    } 
else 
    { 
    header("Location:cat.php?status=FFU");
    } 

header("Location:cat.php?status=CAS");



