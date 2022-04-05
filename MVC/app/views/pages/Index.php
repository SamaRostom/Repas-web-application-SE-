<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
	<link rel="stylesheet" href="<?php echo URLROOT; ?>css/index.css">

	<script>
 function currentDiv(n) {
  showDivs(slideIndex = n);
 }

 function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>
  
</head>
<body>
<?php
class Index extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
	

	<div class="w3-content" style="max-width:1200px">
	<img class="mySlides" src="images/g.jpeg" style="width:100%;display:none">
	<img class="mySlides" src="images/d.jpeg" style="width:100%">
	<img class="mySlides" src="images/f.jpeg" style="width:100%;display:none">
	
  
	<div class="w3-row-padding w3-section">
	  <div class="w3-col s4">
		<img class="demo w3-opacity w3-hover-opacity-off" src="images/g.jpeg" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
	  </div>
	  <div class="w3-col s4">
		<img class="demo w3-opacity w3-hover-opacity-off" src="images/d.jpeg" style="width:100%;cursor:pointer" onclick="currentDiv(2)">
	  </div>
	  <div class="w3-col s4">
		<img class="demo w3-opacity w3-hover-opacity-off" src="images/f.jpeg" style="width:100%;cursor:pointer" onclick="currentDiv(3)">
	  </div>
	</div>
  </div>

  <h3> Categories</h3>
  <section class="cards">
<div>
	<div class="column">
		<div class="card" id="equipcard">
			<div class="image1">
				<img src="images/h.jpeg" width=100% height=50% class="card-img-top">
				<h3>Cooked</h3>
			</div>
		</div>
	</div>

	<div class="column">
	<div class="card" id="equipcard">
		<div class="image2">
			<img src="images/m.jpeg" width=100%  height=20% class="card-img-top">
			<h3>Frozen</h3>
		</div>

	</div>
</div>
<div class="column">
	<div class="card" id="equipcard">
		<div class="image2">
			<img src="images/e.jpeg" width=100%  height=50% class="card-img-top">
			<h3>Meals and mini sandwiches</h3>
		</div>

	</div>
</div>
</section>

<h2>   To all the housewives you deserve all the best......</h2>
  
EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>


</body>
</html>
