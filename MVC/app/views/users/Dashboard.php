<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

  <style>
    thead{
      color: white;
      background-color:  rgb(70, 110, 170);
    }
    .nav-link, .count{
      color: rgb(70, 110, 170)
    }
    .toptrip{
      overflow:hidden;
    }
    .text-danger{
      outline: 0px solid transparent;
      border: none;
    }
  </style>
</head>
<body>
<?php
class Dashboard extends view
{
  public function output()
  {
    $title = $this->model->title;
    require APPROOT . '/views/inc/header.php';
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'users/dashboard';
    $home=URLROOT;

    $text = <<<EOT
    <div class='m-5'>
    <ul class="nav nav-tabs" id="myTab">
  <li class="nav-item dashboard">
    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#dashboard" type="button">Dashboard</button>
  </li>
  <li class="nav-item hikers">
    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#users" type="button">Users</button>
  </li>
  <li class="nav-item admins">
    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#admins" type="button">Admins</button>
  </li>
  <li class="nav-item orders">
    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#orders" type="button">Orders</button>
  </li>
</ul>
EOT;
    echo $text;
    $this->dashboardcontainer();
    $this->userscontainer();
    $this->adminscontainer();
    $this->orderscontainer();
  }
  private function dashboardcontainer()
  {
    $t=$this->model->TotalNumberofUsers();
    $t1=$this->model->TotalNumberofMeals();
    $t2=$this->model->TotalRevenue();
    $t3=$this->model->TotalNumberofOrders();
    $t4=$this->model->TopMeal();
    $Ent=$_SESSION['tnu'];  
    ?>
    <div class="tab-content" id="myTabContent">
  <!-- -------------DASHBOARD CONTAINER-------------- -->
  <div class="tab-pane fade show active py-5" id="dashboard">
  <div class='row col-12 mx-auto'>
  <div class='p-3 col-4 mx-3 rounded shadow text-center'>

      <h1 class='fs-3'>Total Number of Users</h1>
      <h1 class='count'><i class='fas fa-users'></i> <?php echo $t; ?> </h1>
    </div>

    <div class='p-3 col-4 mx-3 rounded shadow text-center'>
      <h1 class='fs-3'>Total Number of Orders</h1>
      <h1 class='count'><i class='fas fa-users'></i> <?php echo $t3; ?> </h1>
    </div>

    <div class='p-3 col-3 mx-3 rounded shadow text-center'>
    
    <h1 class='fs-3'>Total Number of Meals</h1>
      <h1 class='count'><i class='fas fa-hamburger'></i><?php echo $t1; ?> </h1>
    </div>

    <div class='p-3 col-4 mx-3 rounded shadow text-center'>
    <h1 class='fs-3'>Total Revenue</h1>
    <h1 class='count'><i class="fas fa-coins"></i> <?php echo $t2; ?> </h1>
  </div>
</div>
<div class='toptrip row col-10 rounded shadow mx-auto mt-4'>
    <?php   
    foreach($t4 as $x){
    ?>
    <img src='<?php echo IMGROOT. $x->Meal_Image; ?>' class='p-0 col-5'>
    <div class='col-5 m-5'>
    
    <h1 class='fs-3'><?php echo $x->Meal_Name; ?></h1>
    <p class='count'><i class="fas fa-star"></i> Our top reserved Meal!</p>
    <br>
    <p><?php echo $x->Description; ?></p>
    <?php } ?>
    </div>
  </div>

  </div>
  <?php
  }
  private function userscontainer()
  {
    $t=$this->model->TotalNumberofUsers();
    $u=$this->model->usersc();
    $Ent=$_SESSION['tnu'];  
    $profile=URLROOT."/users/profile";
    ?>
    <div class="tab-pane fade  py-5" id="users">
    <table class="table table-hover table-striped table-bordered">	
          <thead>
              <tr>
                  <th>ID_Person</th>
                  <th>Username</th>
                  <th>Profile</th>
              </tr>
          </thead>
          <tbody>
              <?php
              foreach($u as $x){
                echo"<tr><td> ".$x->ID_Person."</td>
                <td>".$x->Username."</td>";
                ?>
                <td> <a href='<?php echo $profile;?>?id=<?php echo $x->ID_Person ?>'><i class="fas fa-user-alt"></i></a> </td></tr>
                <?php
                }
              ?>
          </tbody>
        </table>
    </div>
    <?php
  }
  private function adminscontainer()
  {
    $u=$this->model->adminsc(); 
    $profile=URLROOT."/users/profile";
    $addadmin=URLROOT."/users/AddAdmin";
    $deleteadmin=URLROOT."/users/DeleteAdmin";
    ?>
    <div class="tab-pane fade py-5" id="admins">
  <form action="<?php echo $addadmin;?>">
        <button type="submit" class="btn btn-dark px-3">Add <i class="fas fa-user-plus"></i></button>
      </form>
      <br>
      <table class="table table-hover table-striped table-bordered">	
        <thead>
            <tr>
                <th>ID_Person</th>
                <th>Username</th>
                <th>Profile</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
              <?php
              foreach($u as $x){
                ?>
                <tr>
                   	<td> <?php echo $x->ID_Person ?></td>
                    <td> <?php echo $x->Username ?></td>
                    <td> <a href='<?php echo $profile;?>?id=<?php echo $x->ID_Person ?>'><i class="fas fa-user-alt"></i></a> </td>
                    <td> 
                      <form method="post" action="<?php echo $deleteadmin;?>?id=<?php echo $x->ID_Person ?>">
                        <button name='delete'class="btn btn-light"><i class="fas fa-trash-alt"></i></button>
                      </form>
                      <!-- <a href=""><i class="fa fa-trash text-danger"></i></a></td> -->
                </tr>
                <?php
                }
              ?>
          </tbody>
        </table>
    </div>
    <?php
  }
  private function orderscontainer()
  {
    $u=$this->model->ordersc(); 
    $profile=URLROOT."/users/profile";
    ?>
    <div class="tab-pane fade py-5" id="orders">
  <table class="table table-hover table-striped table-bordered">	
        <thead>
            <tr>
                <th>Order_ID</th>
                <th>ID_Person</th>
                <th>Order_Time</th>
                <th>Total_Price</th>
            </tr>
        </thead>
        <tbody>
              <?php
              foreach($u as $x){
                ?>
                <tr>
                   	<td> <?php echo $x->Order_ID ?></td>
                    <td> <?php echo $x->ID_Person ?></td>
                    <td> <?php echo $x->Order_Time ?></td>
                    <td> <?php echo $x->Total_Price ?></td>
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