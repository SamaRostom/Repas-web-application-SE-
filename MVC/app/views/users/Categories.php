<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>

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
class Categories extends View
{
  public function o()
  {
    $title = $this->model->title;
    // $subtitle = $this->model->subtitle;
	$mealaction = URLROOT . 'users/appetizers';
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
    <section class="cards">
<div>
	<div class="column">
		<div class="card">
			<div class="image1">
				<img src="../../public/images/appetizers.jpeg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<a href="$mealaction"><?php echo $catname ?></a>
			</div>
		</div>
	</div>

	<div class="column">
	<div class="card">
		<div class="image2">
			<img src="../../public/images/panne.jpg" width=100% class="card-img-top">
		</div>
		<div class="info">
			<a href="appetizers.php">Meals Menu</a>
		</div>
	</div>
</div>

<div class="column">
<div class="card">
			<div class="image3">
				<img src="../../public/images/bashamel2.jpg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<a href="appetizers.php">Cooked Menu</a>
			</div>
		</div>
</div>

<div class="column">
<div class="card">
			<div class="image4">
				<img src="../../public/images/miniburger.jpg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<a href="appetizers.php">Finger Bites Menu</a>
			</div>
		</div>
	</div>


<div class="column">
<div class="card">
			<div class="image5">
				<img src="../../public/images/BabaGanoush.jpg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<a href="appetizers.php">Salad & Soup Menu</a>
			</div>
		</div>
	</div>


<div class="column">
<div class="card">
			<div class="image6">
				<img src="../../public/images/catering.jpg" width=100% height=100% class="card-img-top">
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

  public function output()
  {
	  require APPROOT . '/views/inc/header.php';
	  $mealaction = URLROOT . 'users/Meals';
    $Ent=$this->model->MealsCatgories();


foreach($Ent as $x){
	?>
<div class="column">
<div class="card">
			<div class="image6">
				<img src="<?php echo IMGROOT . $x->Category_Image; ?>" width=100% height=100% class="card-img-top">
				<?php echo $x->ID_Category ?>
			</div>
			<div class="info">
				<!-- <a href="<?php echo $mealaction; ?>"><?php echo $x->Category_Name ?></a> -->
				<form method="POST" action="<?php echo $mealaction; ?>?id=<?php echo $x->ID_Category ?>">
					<input type="submit" name="catgname" placeholder="<?php echo $x->Category_Name ?>">
				</form>
			</div>
		</div>
	</div>

<?php
}
// 	$str="<table class='table' width=100%>
// 			<tr>
// 				<th>ID</th>
// 				<th>Name</th>
// 			</tr>";

// 			foreach($Ent as $x)
// 				$str.="<tr><td>".$x->ID_Category."</td><td>".$x->Category_Name."</td></tr>";
// 		//var_dump($Ent[0]->Name);	
// $str.="</table>";
//     echo $str;
    // require APPROOT . '/views/inc/footer.php';
  }
}
?>
</body>
</html>