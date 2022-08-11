<?php include("includes/config.php"); ?>
<!doctype html>
<html lang="en-US">
<head>
    <title>Login</title>

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
    if ((isset($_GET["status"])) && ($_GET["status"]=="LFE")) {
        $p = "<p class='error'>ERROR: Login Failed - Email did not match, Try Again!</p>";
    }
    if ((isset($_GET["status"])) && ($_GET["status"]=="LFP")) {
        $p = "<p class='error'>ERROR: Login Failed - Password did not match, Try Again!</p>";
    }
    if ((isset($_GET["status"])) && ($_GET["status"]=="UAA")) {
        $p = "<p class='error'>ERROR: Unauthorized Access Attempt!</p>";
    }
    if ((isset($_GET["status"])) && ($_GET["status"]=="PSU")) {
        $p = "<p class='success'>SUCCESS: Password Update, Login Again!</p>";
    }
    if ((isset($_GET["status"])) && ($_GET["status"]=="ESU")) {
        $p = "<p class='success'>SUCCESS: Email Update, Login Again!</p>";
        }
    if ((isset($_GET["status"])) && ($_GET["status"]=="RS")) {
        $p = "<p class='success'>SUCCESS: Registered, Login!</p>";
    }
?>

<section> 
    <h2>Login</h2>

<div class="clear"></div>
<div class="sign-up-modal">
<br>
<br>

    <form action="login-action.php" method="post">
        <ul>
            <li>
                    <input class="" id="email" type="email"
                    <?php
                if(isset($_COOKIE["useremail"])){
                    echo "value='".$_COOKIE["useremail"]."'";
                }
            ?>
                    placeholder="Email" name="em" />
            </li>
            <li >
                    <input  id="password" type="password" placeholder="Password" name="pw" />
            </li>

            
        </ul>
        <input id="sign-up-button" type="submit" value="Login In">

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
