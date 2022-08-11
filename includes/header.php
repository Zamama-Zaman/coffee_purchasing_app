<header>

<div class="header" id="myHeader">
    
    <a href="<?php echo $path; ?>index.php"  class="logo"><img src="<?php echo $path; ?>graphics/logo10.png" alt="logo"></a>

        <nav>
            <input type="checkbox" id="r-button" />
            <ul>
                <li><a href="<?php echo $path; ?>index.php">Home</a></li>
    <?php
        if(isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"])){
    ?>
                
                <li><a href="<?php echo $path; ?>updatepassword.php">Update Password</a></li>
                <li><a href="<?php echo $path; ?>updateprofile.php">Update Profile</a></li>
                <li><a href="<?php echo $path; ?>logoff.php">Logoff</a></li>
    <?php
    if($_SESSION["utype"]=="A"){
    ?>
                <li><a href="<?php echo $path; ?>cat.php">Manage Product</a></li>
    <?php
    }
    if($_SESSION["utype"]=="U"){
    ?>
                <li><a href="<?php echo $path; ?>userorder.php">User Order</a></li>

    <?php
    } 
    }
        else {
    ?>
                <li><a href="<?php echo $path; ?>login.php">Login</a></li>
                <li><a href="<?php echo $path; ?>register.php">Register</a></li>
    <?php
        }
    ?>
            </ul>
        </nav>
    <label for="r-button" class="nav-icon" >
        <i>.</i>
    </label> 
</div>   

</header>
   