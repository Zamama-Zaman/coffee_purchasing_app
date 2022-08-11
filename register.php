<?php include("includes/config.php"); ?>
<!doctype html>
<html lang="en-US">
<head>
    <title>Register</title>

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
   Register
   </h2>
<?php
   if ((isset($_GET["status"])) && ($_GET["status"]=="RFE")) {
       $p = "<p class='error'>ERROR: Registration Failed - Email already in use!</p>";
   }
?>

     <div class="clear"></div>
<br>
<br>

<form action="register-action.php" class="sign-up-modal" method="post">
    <ul>
        <li>
                <input id="email" type="email" placeholder="Email" name="em" required/>
        </li>
        <li class="input-container">
                <input  id="username" type="text" placeholder="Username" name="na" required/>
        </li>
        <li >
                <input  id="password" type="password" placeholder="Password" name="pw" required/>
        </li>
        <li >
                <input  id="phoneNo" type="number" placeholder="Phone" name="ph" required/>
        </li>
        <li >
                <input  id="Address" type="text" placeholder="Address" name="add" required/>
        </li>
        <li >
                <input  id="DateOfBirth" type="number" placeholder="Date Of Birth" name="dob" required/>
        </li>
    </ul>
    <input id="sign-up-button" type="submit" value="Register">

        <p> <?php global $p; echo $p; ?></p>
</form>
</section>

<!-- footer -->

<?php 
include("includes/footer.php");
?>
</body>
</html>
