<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>
<body>
<?php
class EditMeal extends view
{
  public function output()
  {
    $title = $this->model->title;
    require APPROOT .'/views/inc/header.php';
    
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
  }
  private function printForm()
  {
    $action = URLROOT . 'users/EditMeal';
    $Url = URLROOT . 'users/Meals';
    $t=$this->model->setallMeals();
    foreach($t as $x){
    ?>
    
    <div class='col-10 col-md-7 col-lg-6 col-xl-5 m-auto form-container px-5 py-4 my-5'>
    <h1 class='display-6 text-center'>Edit Meals</h1>
    <form action=" " method="post" enctype='multipart/form-data'>
    <div class="input-group mt-4 mb-3">
        <span class="input-group-text"><i class="fa fa-list"></i></span>
        <input type="text" class="form-control" placeholder="Insert meal name" name="Meal_Name" value="<?php echo $x->Meal_Name; ?>">
    </div>

    <div class="input-group mt-4 mb-3">
        <span class="input-group-text"><i class="fa fa-list"></i></span>
        <input type="text" class="form-control" placeholder="Insert Description" name="Description" value="<?php echo $x->Description; ?>">
    </div>

    <div class="input-group mt-4 mb-3">
        <span class="input-group-text"><i class="fa fa-list"></i></span>
        <input type="text" class="form-control" placeholder="Insert meal price" name="Meal_Price" value="<?php echo $x->Meal_Price; ?>">
    </div>

    <div class="input-group mt-4 mb-3">
        <span class="input-group-text"><i class="fa fa-list"></i></span>
        <input type="text" class="form-control" placeholder="Insert Amount" name="Amount" value="<?php echo $x->Amount; ?>">
    </div>

    <div class="input-group mb-3">
        <input type= 'file'  class='form-control' name='Meal_Image' id ='Meal_Image' value="<?php echo $x->Meal_Image; ?>">
    </div>


    <div class='mt-4 text-center'>
    <input type="submit" class='btn btn-primary px-5 mb-3' value="Edit" name="Edit">
    <input type="reset" class='btn btn-outline-dark px-5 ms-2 mb-3'>

    </div>
    </form> 
    </div>
<?php
    }
  }
}
?>
</body>
</html>