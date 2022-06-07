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

<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="<?php echo URLROOT.'css/index.css'?>">


<style media="screen">
header {
   max-width: 1024px;
   width: 100%;
   margin-left: auto;
   margin-right: auto;
   overflow: hidden;
  }

.row {
   display: flex;
   overflow: hidden;
  }

.imagegroup {
   display: flex;
   width: 500px;
  }

.imagegroup img{
  flex-shrink: 0;
  object-fit: cover;
  border: 3px solid white;
}

.imagegroup {
   animation: travel 20s ease-in-out infinite;
  }

@keyframes travel {
   0%, 100% {
      transform: translate3d(0,0,0);
    }
   50% {
      transform: translate3d(-100%,0,0);
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
	

  
    <header>
  
    <div class="row small">
      <div class="imagegroup" style="animation-delay: 1s;">
         <img src="images/g.jpeg" alt="">
         <img src="images/d.jpeg" alt="">
         <img src="images/e.jpeg" alt="">
         <img src="images/appetizers.jpeg" alt="">
         <img src="images/K.jpg" alt="">
         <img src="images/C.jpg" alt="">
         
      </div>
    </div>
    
    
  
  </header>

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

