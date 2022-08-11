<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Welcome to coffe shop.</title>
    <?php
     include("includes/meta-css.php");
    ?>
</head>
<body>

<div class="banner"></div>
<div class="slider">
<ul class="slides">
        <li class="slide1"></li>
        <li class="slide2"></li>
        <li class="slide3" ></li> 
        <li class="slide4"></li>
    </ul>
</div>

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

<?php 
include("includes/header.php");
?>

<section class="section-main">
    <h2>Our Product:</h2>
    <?php
 $rs->data_seek(0);
 while($row = $rs->fetch_assoc())
 { 
    echo "<div class='grid'>"; 
    echo "<a href='order-edit.php?cid=".$row['Cid']."'>";
    echo "<figure class='effect-goliath'>";
    echo "<img src = 'cat-image/".$row['Cimage']."' alt='img' >";
    echo "<figcaption>";

    echo "<h3 class='h3-font'>".$row['Cname']."</h3>";
    echo "<p>Coffee Id: ".$row['Cid']." <br> Coffee Price: ".$row['Cprice']." <br> Coffee Size: ".$row['Csize']."</p>";
    
    echo "</figcaption>";			
    echo "</figure>";
    echo "</a>";
    echo "</div>";
?>
<?php 
 }
?>

</section>

<?php
    }
    else{
        echo "<div class='banner'></div>";
        include("includes/header.php");
        echo "<p>No category Exists!</p>";
    }  
}
$conn->close();
?>

<div class="clear"></div>

<?php
include("includes/footer.php");
?>
<script src="<?php echo $path; ?>js/js.js"></script>
</body>
</html>
