<?php include("includes/config.php"); 
 if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"]) && ($_SESSION["utype"]=="U") ){
?>

<!DOCTYPE html>
<html lang= "en-US">
<head>
    <title>User Order</title>
    <?php
     include("includes/meta-css.php");
    ?>
</head>
<body> 
<?php include("includes/header.php"); ?>


<?php
$id = 1;
// connection to database
$conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
if ($conn->connect_error)
{ 
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
}

// add quere
$sql = "SELECT * FROM ordercoffee where Uid=?";
$stmt = $conn->prepare($sql); 
    if($stmt === false) { 
        trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
    }
    $stmt->bind_param('i',$_SESSION['uid']);
    $stmt->execute(); 
    $stmt->store_result();
    $stmt->bind_result($id,$quantity,$totalPrice,$Uid,$date,$Cid); 
?>  


<section>
    <br><br>
 <div class="sign-up-modal">
    <h3>Order Discription List</h3>
   <div class="clear"></div>
<br>
<br>
 

<?php
    while ($stmt->fetch()) 
    {
        echo "<ul> <li class='remove-dot'>  ID :".$id." </li> ";
        echo "<li class='remove-dot'>  quantity :".$quantity." </li> ";
        echo " <li class='remove-dot'>  Total Price :".$totalPrice." </li> ";
        echo " <li class='remove-dot'>  User ID :".$Uid." </li> ";
        echo " <li class='remove-dot'>  Date :".$date." </li> ";
        echo " <li class='remove-dot'> Coffee ID :".$Cid." </li>";
        echo " <li class='remove-dot'> Order ID :".$id." </li> </ul>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
?>

<?php 
 }
 $stmt->free_result();
?>
 </div>
 </section>
<?php
$conn->close();
?>
<div class="clear"></div>
<?php
include("includes/footer.php");
?>
</body>
</html> 
<?php
    }
    else{
         header("Location:login.php?status=UAA");  // unauthorise acccess
     }
?>