<!DOCTYPE html>
<html>
<head>
	<title>All Meals</title>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<link rel="icon" type="image/png" href="icon.png">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="<?php echo URLROOT; ?>css/StyleMeals.css">

</head>
<body>

<?php
class allmeals extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
    <section class="cards">
<div>
	<div class="column">
		<div class="card">
			<div class="image1">
				<img src="images/appetizers.jpeg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<a href="appetizers.php">Appetizers</a>
			</div>
		</div>
	</div>

	<div class="column">
	<div class="card">
		<div class="image2">
			<img src="images/panne.jpg" width=100% class="card-img-top">
		</div>
		<div class="info">
			<a href="appetizers.php">Meals Menu</a>
		</div>
	</div>
</div>

<div class="column">
<div class="card">
			<div class="image3">
				<img src="images/bashamel2.jpg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<a href="appetizers.php">Cooked Menu</a>
			</div>
		</div>
</div>

<div class="column">
<div class="card">
			<div class="image4">
				<img src="images/miniburger.jpg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<a href="appetizers.php">Finger Bites Menu</a>
			</div>
		</div>
	</div>


<div class="column">
<div class="card">
			<div class="image5">
				<img src="images/BabaGanoush.jpg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<a href="appetizers.php">Salad & Soup Menu</a>
			</div>
		</div>
	</div>


<div class="column">
<div class="card">
			<div class="image6">
				<img src="images/catering.jpg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<a href="appetizers.php">Customize Meals For Caterings</a>
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