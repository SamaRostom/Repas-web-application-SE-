<!DOCTYPE html>
<html>
<head>
	<title>Meals</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
  	<link rel="icon" type="image/png" href="icon.png">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="<?php echo URLROOT. 'css/Meals.css'?>">

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
<section>
	<div class="column">
		<div class="card">
			<div class="image">
				<img src="<?php echo IMGROOT . $x->Meal_Image; ?>" width=100% height=100% class="card-img-top">
			</div>

			<div class="info">
				<!-- <form method="POST" action="?ids="> -->
					<?php echo $x->Meal_Name; ?>
					<br>
					<?php
					 echo $x->Meal_Price;
					 echo "LE"; ?>
					<br>
					<button class="btn btn-primary" onclick="window.location.href='<?php echo $mealdetailsaction; ?>?id=<?php echo $x->Meal_ID ?>';">View More</button>
				<!-- </form> -->
				<!-- <h4><?php echo $x->Meal_Name ?></h4> -->
			</div>
		</div>
	</div>
</section>

<?php
}
  }

public function outputa()
  {
    require APPROOT . '/views/inc/header.php';
    $mealaction = URLROOT . 'users/Meals';
    $Ent=$this->model->Meals();
    $AddMeal = URLROOT . 'users/AddMeal';
    $DeleteMeals = URLROOT . 'users/DeleteMeals';
    // $editCategory = URLROOT . 'users/editcategory';
    ?>
    <!-- <form action="<?php echo $DeleteMeals;?>">
    <button type="submit" class="btn btn-dark px-3">Add Meal <i class="fa fa-plus"></i></button>
    </form> -->

    <form action="<?php echo $AddMeal;?>">
    <button type="submit" class="btn btn-dark px-3">Add Meal <i class="fa fa-plus"></i></button>
    </form>

    <?php

foreach($Ent as $x){
    ?>

    <div class="column">
    <div class="card">
            <div class="image6">
                <img src="<?php echo IMGROOT . $x->Meal_Image; ?>" width=100% height=100% class="card-img-top">
                <!-- <?php echo $x->ID_Category ?> -->
            </div>
            <div class="info">
                <!-- <a href="<?php echo $mealaction; ?>"><?php echo $x->Category_Name ?></a> -->
                <form method="POST" action="<?php echo $mealaction; ?>?ids=<?php echo $x->Meal_ID ?>">
                    <!-- <input type="submit" name="catgname" value="<?php echo $x->Category_Name ?>"> -->
                    <!-- <?php echo $x->Category_Name ?> -->
                    <!-- <a href="<?php echo $mealaction; ?>?ids=<?php echo $x->Meal_ID ?>"> -->
                    <?php echo $x->Meal_Name ?>
                  <!-- </a> -->
                </form>
                <div>
                <form method="post" action="<?php echo $DeleteMeals;?>?id=<?php echo $x->Meal_ID ?>">
                    <button name='delete' class="btn btn-light mt-3"><i class="fas fa-trash-alt"></i></button>
                </form>

                <form method="post" action="<?php echo $EditMeal;?>?id=<?php echo $x->Meal_ID ?>">
                    <button name='edit' class="btn btn-light mt-3"> <i class="fas fa-edit"></i></button>
                </form>
                </div>
            </div>
        </div>
    </div>


<?php
}
  }
}
?>

</body>
</html>