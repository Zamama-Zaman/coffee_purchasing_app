<?php
     include("includes/config.php");
    ?>
<!doctype html>
<html lang= "en-US">
<head>
    <title>Welcome to coffe shop.</title>
    <?php
     include("includes/meta-css.php");
    ?>
</head>
<body> 
<?php
include("includes/header.php");
?>
    
    <section>
      <h2>Client Area</h2>
      <form method ="POST" action="client-action.php" enctype="multipart/form-data">
      <div >
            <label>Email</label>
            <input type="email" name="em" placeholder="Enter Email" required/>       
      </div>
      <div >
            <label>Password: </label>
            <input type="Password" name="pw"  placeholder="Password" required/>      
      </div>
      <div >
            <label for="txt3" >Servicess: </label>
            <input type="radio" name="sr" value="white-coffe"/>white-coffe
            <input type="radio" name="sr" value="long-black"/> long-black
            <input type="radio" name="sr" value="cappuccino"/> cappuccino      
      </div>

      <label >FileName:</label>
      <input type="file"  name="userfile"/> 
      <input type="submit" name="submit" value="Upload"/>
       
      </form>
    </section>
    
    
    
<?php
include("includes/footer.php");
?>
   
 
</body>
</html> 