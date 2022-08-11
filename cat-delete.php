<?php 
    include("includes/config.php"); 
    if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"]) && ($_SESSION["utype"]=="A"))
    { 

    $cid=0;
    $cname="";

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
    <title>Manage Categories: Delete</title>

<?php 
include("includes/meta-css.php");
?>
</head>


<body>
<!-- header -->
<?php 
include("includes/header.php");
?>



    

<?php
if ((isset($_GET["status"])) && ($_GET["status"]=="CAS")) {
    echo "<p class='success'>SUCCESS: Category Added Successfuly!</p>";
}
?> 

<section>

<h2>Delete Coffee</h2>

    <div class="sign-up-modal">
        <h3>Coffee Discription</h3>

        <div class="md">
        
        <ul class="md-lis">
                    <li class='remove-dot'>Id: <?php echo $cid; ?></li>
                    <li class='remove-dot'>Name: <?php echo $cname; ?></li>
                    <li class='remove-dot'>Price: <?php echo $cprice; ?></li>
                    <li class='remove-dot'>Size: <?php echo $csize; ?></li>
                    <li class='remove-dot'>Type: <?php echo $ctype; ?></li>
            </ul>

            <div class="error">
                Are You Sure. This is Irreverable Action.
            </div>
        </div>
            <form action="cat-delete-action.php" method="post">
                <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
            <div>
                <input type="submit" name="submit" value="Delete" /> 
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