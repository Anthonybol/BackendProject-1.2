<!DOCTYPE html>
<html>
<head>
  <title></title>
  
<style> 
body {
	margin-top: 0;
	margin-left: 0;
	background: rgb(255, 248, 238);
}  /*Body margin 0, also set background here.*/

* {
    box-sizing: border-box;
  }

  
  /* Position the image container (needed to position the left and right arrows) */
  .container {
    position: relative;
  }
  
  /* Hide the images by default */
  .mySlides {
    display: none;
  }
  
  /* Add a pointer when hovering over the thumbnail images */
  .cursor {
    cursor: pointer;
  }
  
  /* Next & previous buttons */
  .prev,
  .next {
    cursor: pointer;
    position: absolute;
    top: 100%;
    width: auto;
    padding: 16px;
    margin-top: auto;
    color: black;
    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
  }
  
  /* Position the "next button" to the right */
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }
  
  /* On hover, add a black background color with a little bit see-through */
  .prev:hover,
  .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }
  
  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 50px;
  }
  
  /* Container for image text */
  .caption-container {
    text-align: center;
    background-color: #222;
    padding: 2px 16px;
    color: white;
  }
  
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  /* Six columns side by side */
  .column {
    float: left;
    width: 16.66%;
  }
  
  /* Add a transparency effect for thumnbail images */
  .demo {
    opacity: 0.6;
  }
  
  .active,
  .demo:hover {
    opacity: 1;
  }

</style>

</head>

<body>
<?php session_start()?>
<?php include("../shared/banner.inc");?>
<?php include("../shared/nav.inc");?>

<br><br>
    Hey<strong style="color: red"> 
<?php

 //Grabbing username of user
if( isset($_SESSION['user_name']) )
{
echo $_SESSION['user_name']; //echo username of user 
}?> 
<!-- Hey 'username' welcome to our site -->
</strong>
    check out our production



</div>

 <div class="container"><!-- Contain the slideshow gallery  -->
    <div class="mySlides"><!-- Below are the img sources in which the slideshow will dsiplay-->
        <div class="numbertext">1 / 5</div>
        <img src="../images/production_images/finishing.jpg" style="width:50%; display:block; margin-left:auto;
        margin-right:auto">
    </div>

    </div>

    <div class="mySlides">
        <div class="numbertext">2 / 5</div>
        <img src="../images/production_images/finishing2.jpg" style="width:50%; display:block; margin-left:auto;
        margin-right:auto">
    </div>

    <div class="mySlides">
        <div class="numbertext">3 / 5</div>
        <img src="../images/production_images/finishingsmall.jpg" style="width:50%; display:block; margin-left:auto;
        margin-right:auto">
    </div>
    </div>

    <div class="mySlides">
        <div class="numbertext">4 / 5</div>
        <img src="../images/production_images/liftingclay.jpg" style="width:50%; display:block; margin-left:auto;
        margin-right:auto">
    </div>
    </div>

    <div class="mySlides">
        <div class="numbertext">5 / 5</div>
        <img src="../images/production_images/openingclay.jpg" style="width:50%; display:block; margin-left:auto;
        margin-right:auto">
    </div>
    </div>

<!-- Next/previous buttons, &#10094/5 is unicode for < and >. Onclick is connected to 'pluslides'. Function (1) and (-1) meaning 
forward and back. -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

  <!-- Image text -->
  <div class="caption-container">
    <p id="caption"></p>
  </div>

    <!-- Thumbnail images -->
    <div class="row">
        <div class="column">
          <img class="demo cursor" src="../images/production_images/finishing.jpg" style="width:100%; height:100%" onclick="currentSlide(1)" alt="Finishing technique">
        </div>
        <div class="column">
          <img class="demo cursor" src="../images/production_images/finishing2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Finishing technique 2">
        </div>
        <div class="column">
          <img class="demo cursor" src="../images/production_images/finishingsmall.jpg" style="width:100%" onclick="currentSlide(3)" alt="Shaping">
        </div>
        <div class="column">
          <img class="demo cursor" src="../images/production_images/liftingclay.jpg" style="width:100%" onclick="currentSlide(4)" alt="Lifting the clay">
        </div>
        <div class="column">
          <img class="demo cursor" src="../images/production_images/openingclay.jpg" style="width:100%" onclick="currentSlide(5)" alt="Opening the clay">
        </div>
      </div>
    </div>

    <p> Bazaar Ceramics are constantly experimenting with new designs and techniques. 
      The process of developing a particular range of ceramics, starts with the design process.  
      The ceramic designers and gallery director meet regularly to discuss new ideas for product ranges.  
      It may be that the designers are following through on an inspiration from a field trip or perhaps the gallery director has some suggestions to make based on feedback from customers. 
      Promising designs are developed into working drawings which the production potters use to create the ceramic forms.  
      Depending on the type of decoration, the designers may apply the decoration at this stage, or after they have been “bisqued” (fired to 1000 degrees celsius).  
      These prototype designs go through a lengthy development stage of testing and review until the designer is happy with the finished product.  
      At this stage a limited number of pots are produced and displayed in the gallery.  
      If they do well in the gallery, they become a “standard line”. </p>

<script>
var slideIndex = 1; //Calling showslides(1) because slideindex = 1. Slideindex is showing first pic. 
showSlides(slideIndex);

// Next/previous controls connected to onlick in production.html. 'showslides' is an inner function.
//1+1=2 which means (slideIndex += n) is showing the second slide and so on as onclick is used. 
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls. This is connected to the 'thumbnail images section' in production.html. 
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) { //n is the 
  var i; //Undefined variable, but var is declared as 'i'. 
  var slides = document.getElementsByClassName("mySlides"); //'slides' is declared as a variable. 
  //document.getElementsByClassName("mySlides") is picking up the div info from production.html and 'slides' now carries all that info.
  var dots = document.getElementsByClassName("demo"); //Same thing as above. 
  var captionText = document.getElementById("caption"); //Same thing as above. Declaring variables. 
  if (n > slides.length) {slideIndex = 1} //if n is greater than 5, then come back to slide 1. slideindex makes it come back to 1.
  if (n < 1) {slideIndex = slides.length} //if 1 is less than 1, than 'slideIndex'= 5 which is going back to 5th slide. 
  for (i = 0; i < slides.length; i++) { //i=0, if I is less than 5, plus it by ++ (1) until it hits 5. 
    slides[i].style.display = "none"; //If this wasn't here, all images would display at the same time. None makes the other images
    //besides the primary image being viewed become null.  
  }
  for (i = 0; i < dots.length; i++) { //i=0. If 0 is less than length of 'dots' plus by ++. 
    dots[i].className = dots[i].className.replace(" active", ""); //Highlighting each thumbnail that the slide is active on. 
  }
  slides[slideIndex-1].style.display = "block"; //This line is needed so that only the current primary image is displayed. 
  dots[slideIndex-1].className += " active"; //Telling thumbnail 0 (1) to be active. 
  captionText.innerHTML = dots[slideIndex-1].alt; //Using the alt text as caption texts for images. 
}
      
</script>
</body>
</html>