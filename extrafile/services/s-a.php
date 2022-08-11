<?php include("../includes/config.php"); ?>
<!doctype html>
<html lang="en-US">
<head>
    <title>s-a</title>

<?php 
include("../includes/meta-css.php");
?>
</head>


<body>
<!-- header -->
<?php 
include("../includes/header.php");
?>


   <section>
     <h2>Section</h2>
  <ul class="accordian">
    <li>
    <h3>Step 1</h3>
      <div>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptate earum dolorem adipisci illo quibusdam reprehenderit debitis odit iure doloremque facilis, est odio libero, beatae ducimus deserunt, ab architecto tempore.
      </div>
    </li>
    <li>
    <h3>Step 2</h3>
      <div>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptate earum dolorem adipisci illo quibusdam reprehenderit debitis odit iure doloremque facilis, est odio libero, beatae ducimus deserunt, ab architecto tempore.
      </div>
    </li>
    <li>
    <h3>Step 3</h3>
      <div>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptate earum dolorem adipisci illo quibusdam reprehenderit debitis odit iure doloremque facilis, est odio libero, beatae ducimus deserunt, ab architecto tempore.
      </div>
    </li>
    <li>
    <h3>Step 4</h3>
      <div>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque voluptate earum dolorem adipisci illo quibusdam reprehenderit debitis odit iure doloremque facilis, est odio libero, beatae ducimus deserunt, ab architecto tempore.
      </div>
    </li>
  </ul>
   </section>




<!-- footer -->

<?php 
include("../includes/footer.php");
?>

 <script>
    $(document).ready(function(){
      $(".accordian li h3").click(function(){
      $(this).parent().siblings().children("div").hide(250);
      $(this).siblings().toggle(250);
      });
    });
</script>
</body>
</html>
