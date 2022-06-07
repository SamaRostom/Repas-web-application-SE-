<!DOCTYPE html>
<html>
<head>
	<title>Catering</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

  	<link rel="icon" type="image/png" href="icon.png">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="<?php echo URLROOT; ?>css/StyleCatering.css">
    <script>
        n =  new Date();
        y = n.getFullYear();
        m = n.getMonth();
        d = n.getDate();
        // document.getElementById("catering-time").min = (d+7) + "/" + m + "/" + y;
    </script>
</head>
<body>

<?php
class Catering extends View
{

  public function output()
  {
	  require APPROOT . '/views/inc/header.php';
	  $mealaction = URLROOT . 'users/Meals';
    // $Ent=$this->model->MealsCatgories();
    // $currentDateTime = date('Y-m-d H:i:s');
    // $afterweek= $currentDateTime

?>
<?php
$text = <<<EOT
    <div class='col-10 col-md-7 col-lg-6 col-xl-5 m-auto form-container px-5 py-4 my-5'>
    <h1 class='display-6 text-center'>For Special Events</h1>
<form action="" method="POST">
<div class="input-group mt-4 mb-3">
    <textarea class="form-control" placeholder="Enter Required Meals" name="food"></textarea>
</div>

<div class="input-group mt-4 mb-3">
<input type="text" class="form-control" placeholder="Extras" name="extras">
</div>

<div class="input-group mb-3">
    <input type="number" class="form-control" step="1" min="1" max="" placeholder="Number of Adults" name="adultno">
    <input type="number" class="form-control" step="1" min="1" max="" placeholder="Number of Children" name="childno">
</div>

<div class="input-group mt-4 mb-3">
    <input type="text" class="form-control d-sm-inline mb-3" placeholder="Food Allergy (Yes/No)" name="allergy">
</div>

<div><h6>Catering Date</h6></div>
<div class="input-group mt-4 mb-3">
    <input type="date" class="form-control d-sm-inline mb-3" placeholder="Catering Date" name="catering-time">
</div> 

<div class='mt-4 text-center'>
<input type="submit" class='btn btn-primary px-5 mb-3' value="Complete" name="submit">
<input type="reset" class='btn btn-outline-dark px-5 ms-2 mb-3'>

</div>
</form> 
</div>
EOT;
    echo $text;

// <?php

  }


 public function outputa()
  {
  require APPROOT . '/views/inc/header.php';
  // $u=$this->model->ordersc();
    $printcaterings = $this->model->PrintAllCaterings();
    $catering = URLROOT."/users/Catering";
    ?>
    <div id="catering">
  <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Catering Number</th>
                <!-- <th>Username</th> -->
                <th>Person's ID</th>
                <th>Number Of Adults</th>
                <th>Number Of Childern</th>
                <th>Meals</th>
                <th>Extras</th>
                <!-- <th>Catering_Time</th>
                <th>Order_Time_Catering</th> -->
                <th>Food_Allergy</th>
            </tr>
        </thead>
        <tbody>
              <?php
              foreach($printcaterings as $x){
                ?>
                <td> <?php echo $x->Catering_ID ?></td>

                <td> <?php echo $x->ID_Person ?></td>

                <td> <?php echo $x->NumberOfPeople ?></td>

                <td> <?php echo $x->NumberOfChildern?></td>

                <td> <?php echo $x->Meals ?></td>

                <td> <?php echo $x->Extras ?></td>

                <td> <?php echo $x->Food_Allergy?></td>
                
                </tr>
                <?php
                }
              ?>
          </tbody>
        </table>
    </div>
    <?php
  }
}
?>
</body>
</html>