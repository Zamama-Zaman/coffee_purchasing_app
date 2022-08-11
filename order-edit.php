<?php 
    include("includes/config.php"); 
    if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"]) && ($_SESSION["utype"]=="U") )
    { 

    $cid=0;
    $cname="";
    $cprice="";
    $csize="";
    $ctype="";

// connection to database
$conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
if ($conn->connect_error)
{ 
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
}

// add quere
$sql='SELECT * FROM coffee where Cid=?';
$stmt = $conn->prepare($sql); 
if($stmt === false) 
{ 
    trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
} 
$stmt->bind_param('i',$_GET["cid"]); // should hve been validated first
$stmt->execute(); 
$stmt->store_result(); 

$stmt->bind_result($Cid,$Cname,$Cprice,$Csize,$Ctype,$Cimage); 
while ($stmt->fetch()) 
{ 
    $cid=$Cid;
    $cname=$Cname;
    $cprice=$Cprice;
    $csize=$Csize;
    $ctype=$Ctype;

} 
$stmt->free_result(); 
//closed connection
$conn->close();
?>


<!doctype html>
<html lang="en-US">
<head>
    <title>Order Display</title>

<?php 
include("includes/meta-css.php");
?>
</head>


<body>
<!-- header -->
<?php 
include("includes/header.php");
?>

<section>
<h2>
Order Display
</h2>
 
<div class="sign-up-modal">
    <h3>Cappuccinos</h3>

<div class="md">


<ul class="md-lis">
    <?php
    echo "<li class='remove-dot'>id : $cid</li>";
    echo "<li class='remove-dot'>name : $cname</li>";
    echo "<li class='remove-dot'>price: $cprice</li>";
    echo "<li class='remove-dot'>size : $csize</li>";
    echo "<li class='remove-dot'>type : $ctype</li>";
    ?>
</ul>
</div>

<form <?php echo "action='order-coffee.php?cid=$cid'" ?>  method="post">
    <div>
        <input id="sign-up-button" type="submit" value="Order" >
    </div>
</form>

	
</div>
</section>



<!-- footer -->

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