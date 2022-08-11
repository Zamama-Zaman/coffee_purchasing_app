<?php 
    include("includes/config.php"); 
    if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"]) && ($_SESSION["utype"]=="A")){ 
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

  
<?php
    if ((isset($_GET["status"])) && ($_GET["status"]=="CAS")) {
        echo "<p class='success'>SUCCESS: Category Added Successfuly!</p>";
    }
    if ((isset($_GET["status"])) && ($_GET["status"]=="CUS")) {
        echo "<p class='success'>SUCCESS: Category Updated Successfuly!</p>";
    }
    if ((isset($_GET["status"])) && ($_GET["status"]=="CDS")) {
        echo "<p class='success'>SUCCESS: Category Delete Successfuly!</p>";
    }
    if ((isset($_GET["status"])) && ($_GET["status"]=="FUS")) {
        echo "<p class='success'>SUCCESS: Category Function Update Successfuly!</p>";
    }
    if ((isset($_GET["status"])) && ($_GET["status"]=="FFU")) {
        echo "<p class='error'>Fail: Category Function Fail to Update!</p>";
    }
?>


<section>   
    <h2>
   Manage Product
   </h2>

   <div class="sign-up-modal">
    <h3>Coffee Form</h3>
    <div class="clear"></div>
    <br>
    <br>
        <form action="cat-add-action.php" method="post" enctype="multipart/form-data">
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
                <input type="hidden" name="cid" value="<?php echo $row['Cid']; ?>"/>
                <input type="file" name="userfile" required/>
                <input type="submit" name="submit" value="Upload" />
        </form>
    </div>
<br>
<br>
<br>
<br>
<div class="sign-up-modal">
    <h3>Search By Id</h3>
    <div class="clear"></div>
        <br>
        <br>
        
        <form action="search-cat.php" method="post">
            <ul>
                <li>
                    <input type="number" placeholder="Enter Id" name="se" required/>
                </li>
                    
            </ul>
            <input id="sign-up-button" type="submit" value="Search">
        </form>

</div>
     </section>


<?php
// connection to database
$conn= new mysqli($DBServer, $DBUser, $DBPass, $DBName); 
if ($conn->connect_error)
{ 
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR); 
}

// add quere
$sql='SELECT * FROM coffee';
$rs=$conn->query($sql); 
if($rs=== false) 
{ 
    trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $conn->error, E_USER_ERROR); 
} 
else 
{ 
    if($rs->num_rows>0){
?>
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
 $rs->data_seek(0);
 while($row = $rs->fetch_assoc())
 { 
        echo "<tr>";
        echo "<td>".$row['Cid'] . "</td>";  
        echo "<td>".$row['Cname'] . "</td>";
        echo "<td>".$row['Cprice'] . "</td>";
        echo "<td>".$row['Csize'] . "</td>";
        echo "<td>".$row['Ctype'] . "</td>"; 
        echo "<td><a href='cat-edit.php?cid=".$row['Cid']."'>Edit</a></td>";
        echo "<td><a href='cat-delete.php?cid=".$row['Cid']."'>Delete</a></td>";
        echo "<td>"
?>

<?php 
        echo "</td>";
        $a=$row['Cimage']; 
        echo "<td class='imagecall'><img src='cat-image/$a' alt='$a'/></td></tr>";
       
 }
?>
</table>
<div id='imageview'></div>
    <!-- <div class="clear-fix"></div> -->
<?php
    }
    else{
        echo "<p>No category Exists!</p>";
    }
   
}
//closed connection


$conn->close();
?>


<!-- footer -->

<?php 
include("includes/footer.php");
?>

<script>
    $(document).ready(function(){
        $(".imagecall img").click(function(){
            var cid=$(this).attr("alt");
            $("#imageview").html("<img src='graphics/ZKZg.gif' alt='gif'>")
            $("#imageview").load("cat-load-image.php", {id:cid});
        })
    });
</script>

</body>
</html>
<?php
    }
    else{
        header("Location:login.php?status=UAA");  // unauthorise acccess
    }
?>