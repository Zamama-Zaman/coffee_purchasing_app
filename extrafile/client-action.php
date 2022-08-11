<?php
     include("includes/config.php");
?>
<?php 
    
                    $email=$_POST["em"];
                    $password=$_POST["pw"];
                    $services=$_POST["sr"];


                    $selectedFile="b.jpg";
                    $selectedFile="f.jpg";
                    $selectedFile="image.jpg";

                    $authorized=false;

                        if($services==="white-coffe")$selectedFile="b.jpg";
                        if($services==="long-black")$selectedFile="f.jpg";
                        if($services==="cappuccino")$selectedFile="image.jpg";


        //                 if(($email===$clientEmail) && ($password=== $clientPass) ){
        //                     $authorized=true;
        //                     $fileSize= 5 * 1024 * 1024;
        //                 if ((   ($_FILES["userfile"]["type"] == "image/jpeg") ||
        //                         ($_FILES["userfile"]["type"] == "image/jpg")) &&
        //                         ($_FILES["userfile"]["size"] < $fileSize))
        //                 {
        //                 if ($_FILES["userfile"]["error"] > 0) {
        //                     echo "Return Code:" . $_FILES["userfile"]["error"] . "<br/>";
        //                 }
        //                 else 
        //                 {
        //                     if(file_exists("upload/" . $_FILES["userfile"]["name"])){
        //                         echo $_FILES["userfile"]["name"] . " already exists. ";
        //                     }
        //                     else 
        //                     {
        //                         // move_uploaded_file($_FILES["userfile"]["tmp_name"], "services/" . $selectedFile);
        //                         move_uploaded_file($_FILES["userfile"]["tmp_name"], "services/" . $selectedFile);
        //                     }
        //                 }
                        
        //         }
        //                 else {
        //                         echo "Invalid file";
        //         }
        //  }
        // else{
        //     $authorized = false;
        // }

        // if ($authorized){
        //     echo"file updated";
        // }
        // else{
        //     echo"unauthorized access | <br> =check your email&pass";
        // }
        if(($email===$clientEmail) && ($password===$clientPass))
        {
            $authorize = true;
            $maxFileSize= 5 * 1024 * 1024; // 5MB
            if ((($_FILES["userfile"]["type"] == "image/jpeg") || ($_FILES["userfile"]["type"] == "image/pjpeg")) && 
            ($_FILES["userfile"]["size"] < $maxFileSize)) 
            { 
                if ($_FILES["userfile"]["error"] > 0) 
                { 
                    echo "Return Code: " . $_FILES["userfile"]["error"] . "<br/>"; 
                } 
                else 
                { 
                    if (file_exists("upload/" . $_FILES["userfile"]["name"])) 
                    { 
                        echo $_FILES["userfile"]["name"] . " already exists. ";
                    } 
                    else 
                    { 
                        move_uploaded_file($_FILES["userfile"]["tmp_name"] , "servicess/" . 
                        $selectedFile);
                    }    
                }
            } 
            else 
            { 
                echo "Invalid file"; 
            } 
        }
        else
        {
            $authorize = false;
        }

         if ($authorize){
            echo"file updated";
        }
        else{
            echo"unauthorized access | <br> =check your email&pass";
        }


?>


<!-- <!doctype html>
<html>

<head>
    <title>Welcome to coffe shop.</title>
    <?php
     include("includes/meta-css.php");
    ?>
</head>

<body> 
<?php include("includes/header.php"); ?>
    
    <section id="image-section" >
        <h1>Our Product</h1>
        
      
    </section>
    
    
    
<?php
include("includes/footer.php");
?>
    -->
 
</body>


</html>

