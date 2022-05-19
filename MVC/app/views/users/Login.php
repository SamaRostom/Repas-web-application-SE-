<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script>
    function ShowPassword() {
      var pass = document.querySelector('input[name="password"]');
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
</head>
<body>
<?php
class Login extends view
{
  public $v;
  public function output()
  {
    $title = $this->model->title;

    // $this->v= $v;
    require APPROOT . '/views/inc/header.php';
    flash('register_success');
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'users/login';
    $registerUrl = URLROOT . 'users/register';
    $home=URLROOT;

    $text = <<<EOT
    <div class="col-md-6 py-5 mx-auto">
    <div class="form-container">
    <div class="card card-body bg-transparent mt-5" style="--bs-bg-opacity: .5;">
    <h2>Log in</h2>
    <form action="$action" method="post">
EOT;
// <input type="submit" class='btn btn-primary px-5 mb-3 submit' value="Log in" name="Submit">
// <a class='btn btn-primary px-5 mb-3 submit' href= "$home"></a> 
    echo $text;
    $this->printUsername();
    $this->printPassword();
    $this->errordisplay();
    $text = <<<EOT
    <div class="container">
      <div class="row mt-4">
        <div class="col">  
        <div class='mt-3 text-center'>
        <input type="submit" class='btn btn-primary px-5 mb-3 submit' value="Log in" name="Submit">
   <input type="reset" class='btn btn-outline-dark px-5 ms-2 mb-3'>
   <p class='mb-4 mt-2'>Don't have an account? <a class='linkClick' href="$registerUrl">Sign up for free</a></p>
  </div>
      </div>
      </div>
    </form>
    </div>
    </div>
    </div>
    </div>
EOT;
    echo $text;
  }
  
  private function printUsername()
  {
    $text = <<<EOT
    <br>
    <div class="input-group mb-4">
        <span class="input-group-text"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Insert your username" name="Username">
    </div>
EOT;
    echo $text;

  }

  private function printPassword()
  {
    $text = <<<EOT
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control" placeholder="Insert your password" name="password">
        <div class='showBtn' onclick="ShowPassword()"><i class='far fa-eye'></i></div>
    </div>
EOT;
    echo $text;    
  }

  public function errordisplay()
  {
//     $passwordErr= $this->UserModel->passwordErr;
//     $usernameErr= $this->UserModel->usernameErr;
//     if($passwordErr=="" && $usernameErr=""){
//       $d="none";
//     }
//     else{
//       $d="block";
//     }
//     $text = <<<EOT
//     <br>
//     <div class="alert alert-warning" role="alert" style="display: $d;">
//         <i class="fas fa-exclamation-triangle"></i>
//         <span>
//             $passwordErr
//             <br>
//             $usernameErr
//         </span>
//     </div>
// EOT;
//     echo $text;


      $text = <<<EOT
     

      <div class="alert alert-warning">
        This alert will automatically 
        close in 2 seconds.
    </div>
  
    <script type="text/javascript">
        setTimeout(function () {
  
            // Closing the alert
            $('.alert').alert('close');
        }, 5000);
    </script>
EOT;
      echo $text;
  }

}
?>
</body>
</html>
