<?php include("includes/config.php");
if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"]) && ($_SESSION["utype"]=="U") )
{ 
?>
<!doctype html>
<html lang="en-US">
<head>
    <title>Order Coffee</title>

<?php 
include("includes/meta-css.php");
?>
</head>


<body>
<!-- header -->
<?php 
include("includes/header.php");
$cid = $_GET["cid"];
?>


<section>
    <h2>Order Coffee</h2>

    <div class="sign-up-modal">

<form <?php echo "action='order-action.php?cid=$cid'" ?> method="post">
    <ul>
        <li>
                <input type="text" placeholder="Quantity" name="qt" required/>
        </li>
        <li class="input-container">
                <input type="number" placeholder="Date" name="dt" required/>
        </li>
    </ul>
    <input id="sign-up-button" type="submit" value="Order">

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