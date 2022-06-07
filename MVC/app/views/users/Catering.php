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
  	<link rel="stylesheet" href="<?php echo URLROOT; ?>css/StyleMeals.css">
    <script>
        n =  new Date();
        y = n.getFullYear();
        m = n.getMonth();
        d = n.getDate();
        document.getElementById("catering-time").min = (d+7) + "/" + m + "/" + y;
        
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
            
	  <div class="info">
	    <form method="POST" action="">
            <input type="text" name="food" placeholder="Meals">
            <input type="text" name="extras" placeholder="Extras">
            <input type="number" name="adultno" placeholder="Enter number of adults">
            <input type="number" name="childno" placeholder="Enter number of childern">
            <input type="text" name="allergy" placeholder="Enter if there is any food allergy">
            <input type="date" id="catering-time" name="catering-time">
            <input type="submit" name="submit" value="Place Reservation">
		</form>
	  </div>

<?php

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