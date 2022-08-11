<?php $maxFileSize= 5 * 1024 * 1024; // 5 MB 
 $cid = $_POST["cid"];

if ((($_FILES["userfile"]["type"] == "image/jpeg") || ($_FILES["userfile"]["type"] == "image/pjpeg")) && ($_FILES["userfile"]["size"] < $maxFileSize)) 
{ 
    if ($_FILES["userfile"]["error"] > 0) 
    { 
        echo "Return Code: " . $_FILES["userfile"]["error"] . "<br/>"; 
    } 
    else 
    { 
            move_uploaded_file($_FILES["userfile"]["tmp_name"],"cat-image/" . $cid.".jpg");
            header("Location:cat.php?status=FUS");   
    } 
} 
else 
{ 
    header("Location:cat.php?status=FFU");
} 
