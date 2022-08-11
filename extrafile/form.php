<?php include("includes/config.php"); ?>
<!doctype html>
<html lang="en-US">
<head>
    <title>HTML / CSS Revision > Form</title>
<?php 
include("includes/meta-css.php");
?>
</head>
<body>
<?php 
include("includes/header.php");
?>
    <section>
        <h2>My Stylish Form</h2>
        <form action="">
            <fieldset>
                <legend>Basic Information:</legend>
                <div>
                    <label for="txt1">Full Name</label>
                    <input type="text" id="txt1" name="fn" placeholder="First Name Last Name" required />
                </div>
                <div>
                    <label for="txt3">Applying For</label>
                    <input type="text" name="jobtitle" list="titles" placeholder="Enter Job Title" />
                    <datalist id="titles">
                        <option>Java Developer</option>
                        <option>Game Programmer</option>
                        <option>MySQL Expert</option>
                        <option>HTML Programmer</option>
                        <option>Graphic Designer</option>
                    </datalist>
                </div>
                <div>
                    <label>Gender</label>
                    <input type="radio" name="gender" value="M" checked /> Male
                    <input type="radio" name="gender" value="F" /> Female
                </div>
                <div>
                    <label for="lst1">City</label>
                    <select name="city" id="lst1">
                        <option value="ISL">Islamabad</option>
                        <option value="LHR" selected>Lahore</option>
                        <option value="KHI">Karachi</option>
                    </select>
                </div>
                <div>
                    <label>Hobbies</label>
                    <input type="checkbox" name="hobby" value="H1" id="h1" /> <label for="h1" class="label-chkbox">Singing</label>
                    <input type="checkbox" name="hobby" value="H2" id="h2" checked /> <label for="h2" class="label-chkbox">Dancing</label>
                    <input type="checkbox" name="hobby" value="H3" id="h3" /> <label for="h3" class="label-chkbox">Cricket</label>
                    <input type="checkbox" name="hobby" value="H4" id="h4" checked /> <label for="h4" class="label-chkbox">Traveling</label>
                </div>
                <div>
                    <label for="txt2">Age</label>
                    <input type="number" name="age" value="30" id="txt2" 
                       min="18" max="60" />
                </div>
            </fieldset> 
            <fieldset>
                <legend>Private Information:</legend>
                <div>
                    <label for="txt4">DOB</label>
                    <input type="date" id="txt4" name="dob" value="2000-09-25" 
                    min="2000-01-01"  max="2019-09-25"
                    placeholder="yyyy-mm-dd" required />
                </div>
                <div>
                    <label for="txt5">Color</label>
                    <input type="color" id="txt5" name="color" value="#ffff00" />
                </div>
                <div>
                    <textarea name="comment">
                            In pellentesque massa placerat duis ultricies lacus sed turpis. Tellus integer feugiat scelerisque varius. Massa sed elementum tempus egestas sed sed risus pretium quam. Pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Sed risus ultricies tristique nulla aliquet enim. At auctor urna nunc id cursus. Dictum at tempor commodo ullamcorper a lacus. Dui ut ornare lectus sit amet est placerat in. Sed turpis tincidunt id aliquet risus feugiat. Cursus sit amet dictum sit amet justo donec. Tortor at auctor urna nunc id. Morbi tincidunt ornare massa eget egestas purus viverra accumsan in. Purus in massa tempor nec feugiat nisl.
                            Adipiscing elit ut aliquam purus sit amet luctus venenatis lectus. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Ut eu sem integer vitae justo. Purus non enim praesent elementum facilisis leo. Nibh cras pulvinar mattis nunc sed blandit libero. Aenean et tortor at risus. Mattis nunc sed blandit libero volutpat sed. Aliquam sem et tortor consequat. Massa vitae tortor condimentum lacinia quis. Elit at imperdiet dui accumsan sit. Tortor condimentum lacinia quis vel eros donec. Amet mattis vulputate enim nulla aliquet. Urna nunc id cursus metus aliquam eleifend mi. Viverra nibh cras pulvinar mattis nunc sed blandit libero. Eu facilisis sed odio morbi quis. Consectetur libero id faucibus nisl tincidunt eget nullam non nisi. Enim nunc faucibus a pellentesque sit amet porttitor eget. Tristique senectus et netus et malesuada fames ac turpis egestas.
                    </textarea>
                </div>
            </fieldset> 
            <input type="submit" value="Submit Form" />
            <input type="reset" value="Reset Form" />
    </form>
    
    </section>
<?php 
include("includes/footer.php");
?>
</body>
</html>







