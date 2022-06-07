<!DOCTYPE html>
<html>
<head>
	<title>Appetizers</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <link rel="icon" type="image/png" href="icon.png">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo URLROOT.'css/MealsDetails.css'?>">
</head>

<body>

<?php
class MealsDetails extends View
{
  public function output()
  {
    require APPROOT . '/views/inc/header.php';
    $title = $this->model->title;
    $mdurl = URLROOT . 'users/MealsDetails';
    $Ent=$this->model->MealsDetails();

    foreach($Ent as $x){
      ?>
    
    <div class="container">
    <div class="column">
    <img src="<?php echo IMGROOT . $x->Meal_Image; ?>" width=100% class="card-img-top">
    </div>
    <div class="column-66">
    <h1 style=" color:#2a718e;"><?php echo $x->Meal_Name ?></h1>
    <h4>Description:</h4>
    <p>
      <?php echo $x->Description ?>
    </p>
    <div class="quantity buttons_added">
    <form method="post" action="<?php echo $mdurl; ?>?action=add&id=<?php echo $x->Meal_ID; ?>">
    <input type="number" step="1" min="1" max="" value="1" id="quantity" name="quantity">
    <br><br>
    <input type="submit" name="add" id="addtocartbtn" class="btn btn-warning" value="Add to Cart">
    </form>
    </div>
</div>
    
    
    <?php
    }
    require APPROOT . '/views/inc/footer.php';	
  }
}
?>

</body>
</html>