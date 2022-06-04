<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>       
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT . "/css/editProfile.css"?>">
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
  </script>
  <style>
      body{
        background-image: url("<?php echo IMGROOT."loginbackground.jpg";?>");
      }
  </style>


</head>
<body>

<?php
class editProfile extends View
{
  public function output()
  {
  	$title = $this->model->title;
    $subtitle = $this->model->subtitle;

    require APPROOT . '/views/inc/header.php';
	?>
	<div class='col-10 col-md-8 col-lg-6 container p-4 my-5 mx-auto'>
		<h1 class='display-6 mb-3 text-center'>Edit your Profile</h1>

		Username: <input type= 'text' class='form-control' name= 'Username'  value='<?php echo $name; ?>'>

		<div class="input-group mb-3">
        Password: <input type= 'password' class= 'form-control' name='Password' value="<?php echo $p; ?>">
        <div class='showBtn' onclick="ShowPassword()"><i class='far fa-eye'></i></div>
        </div>
        Address: <input type= 'text'  class='form-control' name= 'Address' value="<?php echo $e; ?>">

		Phone Number: <input type= 'text'  class='form-control' name= 'Phone_Number' value="<?php echo $pn; ?>">

		Backup Number: <input type= 'text'  class='form-control' name= 'Backup Number' value="<?php echo $bn; ?>">
		<div style='text-align:center'><input type='submit' class='btn btn-primary px-5 mt-4' name='submit' value='Save'>
		<input type='button' class='btn btn-outline-dark px-5 ms-3 mt-4' onclick='history.back();' value='Cancel'></div>
		</form>
		</div>
<?php
    require APPROOT . '/views/inc/footer.php';
  }
}
?>
</body>
</html>