<!-- <?php
     include("includes/config.php");
?>

<?php
// connection to database
$conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
if ($conn->connect_error)
{ 
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
}

// add quere
$sql='SELECT * FROM coffee order by Cid desc';
$rs=$conn->query($sql); 
if($rs=== false) 
{ 
    trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
} 
else 
{ 
    if($rs->num_rows>0){
?>  


<html lang= "en-US">
<head>
    <title>Welcome to coffe shop.</title>
    <?php
     include("includes/meta-css.php");
    ?>
</head>
<body> 
<?php include("includes/header.php"); ?>


    
    <?php
 $rs->data_seek(0);
 while($row = $rs->fetch_assoc())
 { 
    
    $row['Cid'];
    $row['Cname'];
    $row['Cprice'] ;
    $row['Csize'];
    $row['Ctype']; 

    echo "<section>";
    echo "<div class='container'>";
    echo "<div class='hole'>"; 
    echo "<div class='top'>".$row['Cname']."</div>";
    echo "<div class='img1'> </div>";
    echo "<p>".$row['Cprice']." <br> ".$row['Csize']." <br> ".$row['Ctype']." <br> <a href='order-edit.php?cid=".$row['Cid']."'>Order</a></p></div>";
    
    echo "</section>";
        

?>

<?php 

 }
?>

<?php
    }
    else{
        echo "<p>No category Exists!</p>";
    }
   
}
$conn->close();
?>
    
    
<?php
include("includes/footer.php");
?>
   
 
</body>
</html>  -->