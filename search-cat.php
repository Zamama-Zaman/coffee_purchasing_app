<?php 
    include("includes/config.php"); 
    if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"]) && ($_SESSION["utype"]=="A") )
    { 
    $id=$_POST['se'];
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
$stmt->bind_param('i',$id);
$stmt->execute(); 
$stmt->store_result(); 

$stmt->bind_result($Cid,$Cname,$Cprice,$Csize,$Ctype,$Cimage); 
?>
<!doctype html>
<html lang="en-US">
<head>
    <title>Manage Categories</title>
    <style>

</style>


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
   Search Result
   </h2>
   <div class="sign-up-modal">

        <form action="cat.php" method="post">
            <input id="sign-up-button" type="submit" value="Go Back">

        </form>
</div>

<table class="cat">
    <tr>
        <th>Coffee Id</th>
        <th>Coffee Name</th>
        <th>Coffee Price</th>
        <th>Coffee Size</th>
        <th>Coffee Type</th>
        <th colspan="4">Actions</th>
    </tr>
<?php    
while ($stmt->fetch()) 
{ 
    $cid=$Cid;
    $cname=$Cname;
    $cprice=$Cprice;
    $csize=$Csize;
    $ctype=$Ctype;
    $cimage=$Cimage;
    echo "<tr>";
        echo "<td>$cid</td>"; 
        echo "<td>$cname</td>";
        echo "<td>$cprice</td>";
        echo "<td>$csize</td>";
        echo "<td>$ctype</td>"; 
        echo "<td><a href='cat-edit.php?cid=$cid'>Edit</a></td>";
        echo "<td><a href='cat-delete.php?cid=$cid'>Delete</a></td>";
        echo "<td>"
?>

<?php 
        echo "</td>";
        echo "<td class='imagecall'><img src='cat-image/$cimage' alt='$cimage'/></td>
        <td></td>
        </tr>";
 }
$stmt->free_result(); 
//closed connection
$conn->close();
?>
</table>


</section>

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


