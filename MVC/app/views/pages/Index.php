<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="<?php echo URLROOT.'css/index.css'?>">


 <style>
* {
  margin: 0;
  padding: 0;
}

 body {
  max-width: 100%;
  overflow-x: hidden;
  overflow-y: hidden;
  
  background-color: #6adecd;
}

#slideshow {
  margin: 0 auto;
  padding-top: 50px;
  height: 600px;
  width: 100%;
  
  box-sizing: border-box;
}

.slideshow-title {
  font-family: 'Allerta Stencil';
  font-size: 62px;
  color: #fff;
  margin: 0 auto;
  text-align: center;
  margin-top: 25%;
  letter-spacing: 3px;
  font-weight: 300;
}

.sub-heading {
  padding-top: 50px;
  font-size: 18px;
} .sub-heading-two {
  font-size: 15px;
} .sub-heading-three {
  font-size: 13px;
} .sub-heading-four {
  font-size: 11px;
} .sub-heading-five {
  font-size: 9px;
} .sub-heading-six {
  font-size: 7px;
} .sub-heading-seven {
  font-size: 5px;
} .sub-heading-eight {
  font-size: 3px;
} .sub-heading-nine {
  font-size: 1px;
}

.entire-content {
  margin: auto;
  width: 200px;
  perspective: 1800px;
  position: relative;
  padding-top: 80px;
}

.content-carrousel {
  width: 100%;
  position: absolute;
  float: right;
  animation: rotar 15s infinite linear;
  transform-style: preserve-3d;
}

.content-carrousel:hover {
  animation-play-state: paused;
  cursor: pointer;
}

.content-carrousel figure {
  width:250px;
  height: 190px;
  border: 1px solid #3b444b;
  overflow: hidden;
  position: absolute;
}

.content-carrousel figure:nth-child(1) {
  transform: rotateY(0deg) translateZ(500px); 
} .content-carrousel figure:nth-child(2) {
  transform: rotateY(40deg) translateZ(500px); 
} .content-carrousel figure:nth-child(3) {
  transform: rotateY(80deg) translateZ(500px); 
} .content-carrousel figure:nth-child(4) {
  transform: rotateY(120deg) translateZ(500px); 
} .content-carrousel figure:nth-child(5) {
  transform: rotateY(160deg) translateZ(500px); 
} .content-carrousel figure:nth-child(6) {
  transform: rotateY(200deg) translateZ(500px); 
} .content-carrousel figure:nth-child(7) {
  transform: rotateY(240deg) translateZ(500px); 
} .content-carrousel figure:nth-child(8) {
  transform: rotateY(280deg) translateZ(500px); 
} .content-carrousel figure:nth-child(9) {
  transform: rotateY(320deg) translateZ(500px); 
} .content-carrousel figure:nth-child(10) {
  transform: rotateY(360deg) translateZ(500px); 
} 

.shadow {
    position: absolute;
    box-shadow: 0px 0px 20px 0px #000;
    border-radius: 1px;
}

.content-carrousel img {
  image-rendering: auto;
  transition: all 300ms;
  width: 100%;
  height: 100%;
}

.content-carrousel img:hover {
  transform: scale(1.2);
  transition: all 300ms;
}

@keyframes rotar {
  from {
    transform: rotateY(0deg);
  } to {
    transform: rotateY(360deg);
  }
}

  </style>


</head>
<body>
<?php
// require IMGROOT;
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
	

  



    <section id="slideshow">
      <div class="entire-content">
        <div class="content-carrousel">
          <figure class="shadow"><img src="images/bashamel2.jpg"/></figure>
          <figure class="shadow"><img src="images/miniburgers.jpg"/></figure>
          <figure class="shadow"><img src="images/S.jpg"/></figure>
          <figure class="shadow"><img src="images/h.jpeg"/></figure>
          <figure class="shadow"><img src="images/f.jpeg"/></figure>
          <figure class="shadow"><img src="images/kobeba.jpeg"/></figure>
          <figure class="shadow"><img src="images/g.jpeg"/></figure>
          <figure class="shadow"><img src="images/d.jpeg"/></figure>
          <figure class="shadow"><img src="images/e.jpeg"/></figure>
    </div>
  </div>
</section>




<div class="w3-content w3-padding" style="max-width:1564px">

  
  <div class="w3-container w3-padding-32" id="categories">
    <h3 class="w3-border-bottom w3-border-light-blue w3-padding-16">Categories</h3>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-yellow w3-padding">Frozen food</div>
        <img src="images/FF.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-yellow w3-padding">Cooked food</div>
        <img src="images/bashamel2.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-yellow w3-padding">Salad and Soup</div>
        <img src="images/panne.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-yellow w3-padding">Appitizers</div>
        <img src="images/S.jpg" alt="House" style="width:100%">
      </div>
    </div>
  </div>

 


<h2>   To all the housewives you deserve all the best...........</h2>


  
EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>


</body>
</html>

