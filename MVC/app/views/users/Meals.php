<!DOCTYPE html>
<html>
<head>
	<title>Meals</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<link rel="icon" type="image/png" href="icon.png">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="style/Meals.css">
</head>

<body>

<?php
class Meals extends View
{
  public function o()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
	$mdaction = URLROOT . 'users/MealsDetails';
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
<section>
	<div class="column">
		<div class="card">
			<div class="image">
				<img src="../../public/images/kobeba.jpeg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<h4>Kobeba Soiree</h4>
			</div>
			<button class="btn btn-primary" onclick="window.location.href='$mdaction';">View More</button>
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
	  $mealdetailsaction = URLROOT . 'users/MealsDetails';
    $Ent=$this->model->Meals();


foreach($Ent as $x){
	?>
<div class="column">
<div class="card">
			<div class="image6">
				<img src="<?php echo IMGROOT . $x->Meal_Image; ?>" width=100% height=100% class="card-img-top">
				<?php echo $x->Meal_ID ?>
			</div>
			<div class="info">
				<!-- <a href="<?php echo $mealaction; ?>"><?php echo $x->Category_Name ?></a> -->
				<form method="POST" action="<?php echo $mealdetailsaction; ?>?id=<?php echo $x->Meal_ID ?>">
					<input type="submit" name="mealname" placeholder="<?php echo $x->Meal_Name ?>">
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