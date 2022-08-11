<?php 
    include("includes/config.php"); 
    if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"])){ 
?>
<!doctype html>
<html lang="en-US">
<head>
    <title>Update Password</title>

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
   if ((isset($_GET["status"])) && ($_GET["status"]=="PDM")) {
       $p =  "<p class='error'>ERROR: Passwords did not match!</p>";
   }
?>
   <section>
   <h2>
   Update Profile
   </h2>

   <div class="sign-up-modal">
    <h3>Profile Form</h3>
   <div class="clear"></div>
<br>
<br>
 
    <form action="updateprofile-action.php" method="post">
        <ul>
            <li>
                <input type="email" placeholder="Email" name="em" required/>
            </li>
            <li class="input-container">
                    <input type="text" placeholder="Username" name="na" required/>
            </li>
            <li class="input-container">
                <input type="number" placeholder="Phone" name="ph" required />
            </li>
            <li >
                <input type="text" placeholder="Address" name="add" required/>
            </li>
            <li >
                <input type="number" placeholder="Date Of Birth" name="dob" required/>
            </li>
        </ul>
        <input id="sign-up-button" type="submit" value="Update Profile">

        <p> <?php global $p; echo $p; ?></p>
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