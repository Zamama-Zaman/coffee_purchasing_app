<?php include("includes/config.php"); ?>
<?php 
$cid = $_POST["cid"];
$name = $_POST["cna"];
$price = $_POST["cp"];
$size = $_POST["cs"];
$type = $_POST["cty"];
$file = $_FILES["userfile"]["name"];
// connection to database
    $conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
    if ($conn->connect_error)
    { 
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
    }

    // insert
    $sql="INSERT INTO coffee (Cname, Cprice, Csize, Ctype, Cimage) VALUES (?,?,?,?,?)"; 
    $stmt = $conn->prepare($sql); 
    if($stmt === false) { 
        trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
    }
    $stmt->bind_param('sssss',$name,$price,$size,$type,$file); 
    $stmt->execute();
    $stmt->close();
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