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
} 
$stmt->free_result(); 
//closed connection
$conn->close();
?>


<!doctype html>
<html lang="en-US">
<head>
    <title>Coffee Update</title>

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
    $p =  "<p class='success'>SUCCESS: Category Added Successfuly!</p>";
}
if ((isset($_GET["status"])) && ($_GET["status"]=="FFU")) {
    echo "<p class='error'>Fail: Category Function Fail to Update!</p>";
}
if ((isset($_GET["status"])) && ($_GET["status"]=="FUS")) {
    echo "<p class='success'>SUCCESS: Category Function Update Successfuly!</p>";
}
if ((isset($_GET["status"])) && ($_GET["status"]=="CUS")) {
    echo "<p class='success'>SUCCESS: Category Updated Successfuly!</p>";
}
?>  

<section>

<h2>Coffee Update</h2>

   <div class="sign-up-modal">
    <h3>Coffee Edit</h3>
    <div class="clear"></div>
    <br>
    <br>
        <form <?php echo "action='cat-edit-action.php?cid=$cid'";?> method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <input type="text" placeholder="Name" name="cna" required/>
                </li>
                <li class="input-container">
                    <input type="number" placeholder="Price" name="cp" required/>
                </li>
                <li class="input-container">
                    <input type="number" placeholder="Size" name="cs" required/>
                </li>
                <li class="input-container">
                    <input type="text" placeholder="Type" name="cty" required/>
                </li>
            </ul>
                <input type="file" name="userfile" required/>
                <input type="submit" name="submit" value="Edit"/>
        </form>
        <p> <?php global $p; echo $p; ?></p>
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