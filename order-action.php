<?php include("includes/config.php"); ?>
<?php 
$quantity = $_POST["qt"];
$date = $_POST["dt"];
$cid = $_GET["cid"];
$total = 0;
$total = $total + 1;
$totalPrice = $quantity * $total;
$Uid = $_SESSION['uid'];


// connection to database
    $conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
    if ($conn->connect_error)
    { 
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
    }

// add quere
    $sql="INSERT INTO orderCoffee (quantity, totalPrice, Uid, date, Cid) VALUES (?,?,?,?,?)"; 
    $stmt = $conn->prepare($sql); 
    if($stmt === false) { 
        trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
    }
    $stmt->bind_param('iiisi',$quantity,$totalPrice,$Uid,$date,$cid); 
    $stmt->execute();
    $stmt->close();
//closed connection

 
    $conn->close();
    header("Location:userorder.php");