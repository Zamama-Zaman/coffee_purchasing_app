<?php
     include("includes/config.php");
    ?>
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
        <form action="">
            <fieldset>
                <legend>Please Enter Information:</legend>
                <div>
                    <label for="txt1">First Name</label>
                    <input type="text" id="txt1" name="fn" placeholder="Enter First Name" required />
                </div>
                <div>
                    <label for="txt2">Last Name</label>
                    <input type="text" id="txt1" name="fn" placeholder="Enter Last Name" required />
                </div>
                <div>
                    <label for="txt3">Address</label>
                    <input type="text" id="txt1" address="fn" placeholder="Enter Address" required />
                </div>

                <div>
                    <label for="txt4">Select Product</label>
                    <input type="text" name="jobtitle" list="titles" placeholder="Enter Product" />
                    <datalist id="titles">
                        <option>flat white</option>
                        <option>Long Black</option>
                        <option>Cappuccino</option>
                    
                    </datalist>
                </div>
                <div>
                    <label for="txt5">Phone No</label>
                    <input type="text" id="txt1" address="fn" placeholder="0315*******" required />
                </div>
                <div >
                    <label  for="txt6" >Email</label>
                    <input type="email" id="email" placeholder="Enter Email" required/>
                   
                </div>
                
                <input type="submit" value="Order" name="order">
                <input type="reset" value="Reset Form" />
            </fieldset> 
            
    </form>
    
    </section>

    <?php
include("includes/footer.php");
?>
   
 
</body>
</html> 