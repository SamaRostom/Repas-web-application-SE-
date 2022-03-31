<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script type="text/javascript">
    function ShowPassword() {
      var pass = document.querySelector('input[name="Password"]');
      var icon = document.querySelector('.showBtn i');
      if (pass.type === "password") {
        pass.type = "text";
        icon.setAttribute('class','far fa-eye-slash');
      } else {
        pass.type = "password";
        icon.setAttribute('class','far fa-eye');
      }
    }
  </script>
  <style type="text/css">
    .showBtn{
    /*to show over the textbox*/
    position: absolute;
    right:15px;
    top:8px;
    color: rgb(128, 128, 128);
    /*to show it when hover*/
    z-index: 99999;
}
  </style>
</head>
<body>
<?php
class Login extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    flash('register_success');
    $text = <<<EOT
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"> $title</h1>
    </div>
  </div>

  </div>
  </div>
  </div>
EOT;
    echo $text;
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'users/login';
    $registerUrl = URLROOT . 'users/register';

    $text = <<<EOT
    <div class="row">
    <div class="col-md-5 mx-auto">
    <div class="card card-body bg-light mt-5">
    <h2>Log in</h2>
    <form action="$action" method="post">
EOT;

    echo $text;
    $this->printUsername();
    $this->printPassword();

    $text = <<<EOT
    <div class="container">
      <div class="row mt-4">
        <div class="col">  
        <div class='mt-4 text-center'>
    <input type="submit" class='btn btn-primary px-5 mb-3' value="Log in" name="Submit">
   <input type="reset" class='btn btn-outline-dark px-5 ms-2 mb-3'>
   <p>Don't have an account? <a class='linkClick' href="$registerUrl">Sign up for free</a></p>
  </div>
      </div>
      </div>
    </form>
    </div>
    </div>
    </div>
EOT;
    echo $text;
  }
  
  private function printEmail()
  {
    // $val = $this->model->getEmail();
    // $err = $this->model->getEmailErr();
    // $valid = (!empty($err) ? 'is-invalid' : '');

    // $this->printInput('email', 'email', $val, $err, $valid);

    $text = <<<EOT
    <br>
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Insert your username" name="Username">
    </div>
EOT;
    echo $text;
  }

  private function printPassword()
  {
    // $val = $this->model->getPassword();
    // $err = $this->model->getPasswordErr();
    // $valid = (!empty($err) ? 'is-invalid' : '');

    // $this->printInput('password', 'password', $val, $err, $valid);
    $text = <<<EOT
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control" placeholder="Insert your password" name="password">
        <div class= 'showBtn'  onclick="ShowPassword()"><i class='far fa-eye'></i></div>
    </div>
EOT;
    echo $text;        
  }

  private function printInput($type, $fieldName, $val, $err, $valid)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
      <label for="$fieldName"> $label: <sup>*</sup></label>
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val" required="">
      <span class="invalid-feedback">$err</span>
    </div>
EOT;
    echo $text;
  }


}
?>
</body>
</html>
