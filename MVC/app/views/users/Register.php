<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>       
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?php
class Register extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT .'/views/inc/header.php';
    $text = <<<EOT
    <div class='col-10 col-md-7 col-lg-6 col-xl-5 m-auto form-container px-5 py-4 my-5'>
        <h1 class='display-6 text-center'>Create An Account</h1>
   <form action="SignUp.php" method="post" onsubmit="validate(this,event)">
    <div class="input-group mt-4 mb-3">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Insert your username" name="Username">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control" placeholder="Insert your password" name="Password">
        <div class='showBtn' onclick="ShowPassword()"><i class='far fa-eye'></i></div>
    </div>

    <div class="input-group mt-4 mb-3">
        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
        <input type="text" class="form-control" placeholder="Address" name="Address">
    </div>

    
    <p class='mt-3 mb-7'>Insert your contact info:</p> 

    <input type="number" class="form-control d-sm-inline mb-3" placeholder="Personal number" name="Phone Number"> 
    <input type="number" class="form-control d-sm-inline mb-3" placeholder="Backup number" name="Backup Number"> 
</div>

    <div class='mt-4 text-center'>
    <input type="submit" class='btn btn-primary px-5' value="Sign Up" name="Submit">
   <input type="reset" class='btn btn-outline-dark px-5 ms-2'>
  </div>
</form> 
EOT;
    echo $text;
    // $this->printForm();
    // require APPROOT . '/views/inc/footer.php';
  }

  // private function printForm()
  // {
  //   $action = URLROOT . 'users/register';
  //   $loginUrl = URLROOT . 'users/login';
  //   $this->printName();
  //   $this->printPassword();
  //   $this->printPersonal_Number();
  //   $this->printBackup_Number();
  // }

  // private function printName()
  // {
  //   $val = $this->model->getName();
  //   $err = $this->model->getNameErr();
  //   $valid = (!empty($err) ? 'is-invalid' : '');

  //   $this->printInput('text', 'name', $val, $err, $valid);
  // }

  // private function printPassword()
  // {
  //   $val = $this->model->getPassword();
  //   $err = $this->model->getPasswordErr();
  //   $valid = (!empty($err) ? 'is-invalid' : '');

  //   $this->printInput('password', 'password', $val, $err, $valid);
  // }
  
  // private function printInput($type, $fieldName, $val, $err, $valid)
  // {
  //   $label = str_replace("_", " ", $fieldName);
  //   $label = ucwords($label);
  // }
}
