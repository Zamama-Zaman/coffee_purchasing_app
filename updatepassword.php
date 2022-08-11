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
   Update Password
   </h2>
   <div class="sign-up-modal">
    <h3>Update Form</h3>

<div class="clear"></div>
<br>
<br>
 
    <form action="updatepassword-action.php" method="post">
        <ul>
            <li>
                    <input type="password" placeholder="New Password " name="pw1" required/>
            </li>
            <li class="input-container">
                    <input type="password" placeholder="Confirm Password" name="pw2" required/>
            </li>
        </ul>
        <input id="sign-up-button" type="submit" value="Update Password">
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