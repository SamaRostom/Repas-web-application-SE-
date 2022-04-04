<!DOCTYPE html>
<html>
<head>
<title>Review</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>    
   <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Review.css">   
</head>
<body>
<?php
class Review extends view
{
  public function output()
  {
    $title = $this->model->title;
    require APPROOT .'/views/inc/header.php';
    
    $this->printForm();
    // require APPROOT . '/views/inc/footer.php';
  }

  private function printForm()
  {
    // $action = URLROOT . 'users/register';
    // $loginUrl = URLROOT . 'users/login';
    $text = <<<EOT
    <div class='col-12 p-5 header text-light'>
  <h1 class='fw-bold display-3'>Tell Us What You Think</h1>
  <p class='fs-4'>Take our survey now and let us know how you're enjoying your experience with us</p>
  
 <form class="my-5 col-9 col-md-8 col-lg-6" method="post" action="">
  <p class='fs-5 mb-0'>Rate your experience with Repas</p>
  <div class="rating mb-5">
  <input id="demo-1" type="radio" name="demo" value="1"> 
  <input id="demo-2" type="radio" name="demo" value="2">
  <input id="demo-3" type="radio" name="demo" value="3">
  <input id="demo-4" type="radio" name="demo" value="4">
  <input id="demo-5" type="radio" name="demo" value="5">
        
 <div class="stars">
  <label for="demo-1" name="1 star" title="1 star"></label>
  <label for="demo-2" name="2 stars" title="2 stars"></label>
  <label for="demo-3" name="3 stars" title="3 stars"></label>
  <label for="demo-4" name="4 stars" title="4 stars"></label>
  <label for="demo-5" name="5 stars" title="5 stars"></label>   
 </div>
  </div>

  <div class="form-floating">
  <textarea class="form-control" name='Feedback' id="textareaLabel"></textarea>
  <label for="textareaLabel" class='text-dark'>Leave your Comments Here</label>
</div>

<input type="submit" class='btn btn-primary px-5 mt-4' value="Submit" name="Submit">
  <!-- <input type="submit" name ="Submit" value ="Send Survey"> -->
</form>
</div>
EOT;
    echo $text;
  }
}
?>
</body>
</html>