<?php include("includes/config.php"); ?>
<?php 
$cid = $_POST["cid"];



    // connection with database
    $conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
    if ($conn->connect_error)
    { 
        trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
    }
    // add quere
    $sql='DELETE from coffee WHERE Cid=?';

    $stmt = $conn->prepare($sql); 
    if($stmt === false) 
    { 
        trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
    } 
    $stmt->bind_param('i',$cid); 
    $stmt->execute();
 
    // end conntection

    $conn->close();
    header("Location:cat.php?status=CDS");




