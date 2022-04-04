<!DOCTYPE html>
<html>
<head>
	<title>Appetizers</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="icon.png">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style/MealsDetails.css">
</head>

<body>

<?php
class MealsDetails extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
<div class="container">
  <div class="row">
    <div class="column">
      <img src="kobeba.jpeg">
    </div>
    <div class="column-66">
    <h1 style=" color:#2a718e;">Kobeba Soiree</h1>
    <h4>Description:</h4>
    <p>
      10 pieces for 65 L.E.
    </p>

    <div class="quantity buttons_added">
    <input type="number" step="1" min="1" max="" value="1" id="quantity" name="quantity">
    <br><br>
    <input type="submit" name="add" id="addtocartbtn" class="btn btn-warning" value="Add to Cart">
    </div>
  </div>
</div>
EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>

</body>
</html>