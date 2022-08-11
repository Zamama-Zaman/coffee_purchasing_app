var currentSlide = 1;
var $slider = $(".slides");
var slideCount = $slider.children().length;

setInterval(function(){
    $slider.animate({ 
        marginLeft :  '-=1500'
    } , 800 , function(){
         currentSlide++;
         if(currentSlide === slideCount) {
             currentSlide = 1;
             $(this).css("margin-left" , "0px");
         }
    });

} , 2000);


window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
if (window.pageYOffset > sticky) {
header.classList.add("sticky");
} else {
header.classList.remove("sticky");
}
}


