<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>       
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/editProfile.css">

</head>
<script>
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
function validate(form,e){
        var fail="";
      var alertBox = document.querySelector('.alert')
      if(form.Username.value ==""){
            fail+="Please fill the Username field\n";
        }
        if(form.Email.value ==""){
            fail+="Please fill the Email field\n";
        }
        if(form.Password.value ==""){
    		fail+="Please fill the password field\n";
    	}
        if(form.City.value ==""){
        fail+="Please fill the City field\n";
          }
        if(form.Gender.value ==""){
        fail+="Please fill the Gender field\n";
          }
        if(form.Phone_Number.value ==""){
        fail+="Please fill the Phone_Number field\n";
          }
          if(form.Emergency_Number.value ==""){
        fail+="Please fill the Emergency_Number field\n";
          }
        if(fail==""){
            return true;
        }
        else{
        alertBox.querySelector('span').innerText = fail
            alertBox.style.display = 'block';
            setTimeout(function(){alertBox.style.display = 'none';},5000)
            e.preventDefault()
        }
    }
</script>
<body>

<?php
class editProfile extends View
{
  public function output()
  {
  	$title = $this->model->title;
    $subtitle = $this->model->subtitle;
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
	<div class="alert alert-warning" role="alert">
    <i class="fas fa-exclamation-triangle"></i>
</div>
EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>
</body>

</html>