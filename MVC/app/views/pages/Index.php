<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Delicious Homemade Food">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Home</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.8.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
 

    <script type="application/ld+json">{
		"@type": "Organization",
		"name": "",
		"logo": "images/re.jpg"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
</head>
<body data-home-page="https://website1694322.nicepage.io/Home.html?version=c6c298e9-6a4e-4307-a122-98768eed9c0d" data-home-page-title="Home" class="u-body u-xl-mode"><header class="u-clearfix u-header u-header" id="sec-2464"><div class="u-clearfix u-sheet u-sheet-1">
<?php
class Index extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
	<a href="https://nicepage.com" class="u-image u-logo u-image-1" data-image-width="339" data-image-height="339">
          <img src="images/re.jpg" class="u-logo-image u-logo-image-1">
        </a>
        <p class="u-text u-text-palette-1-base u-text-1">Delicious Homemade F​ood</p>
</header>
        <section class="cards">
<div>
	<div class="column">
		<div class="card">
			<div class="image">
				<img src="appetizers.jpeg" width=100% height=100% class="card-img-top">
			</div>
			
		</div>
	</div>

	<div class="column">
	<div class="card">
		<div class="image">
			<img src="1.jpg" width=100% class="card-img-top">
		</div>
	
	</div>
</div>

<div class="column">
<div class="card">
			<div class="image">
				<img src="2.jpg" width=100% height=100% class="card-img-top">
			</div>
		
		</div>
</div>

<div class="column">
<div class="card">
			<div class="image">
				<img src="15.jpg" width=100% height=100% class="card-img-top">
			</div>
	
		</div>
	</div>


<div class="column">
<div class="card">
			<div class="image">
				<img src="3.jpg" width=100% height=100% class="card-img-top">
			</div>
			
		</div>
	</div>


<div class="column">
<div class="card">
			<div class="image">
				<img src="catering.jpg" width=100% height=100% class="card-img-top">
			</div>
		
		</div>
	</div>


</div>
</section>
  
EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>


</body>
</html>
