<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>       
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT . "/css/editProfile.css"?>">
 
  <style>
      body{
        background-image: url("<?php echo IMGROOT."rr.jpg";?>");
        background-size: contain;
	      background-repeat: no-repeat;	
        background-size: 100%;
 	      background-position-y: bottom;
	      height:110vh;
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

    require APPROOT . '/views/inc/header.php';
	?>
	<div class='col-10 col-md-8 col-lg-6 container p-4 my-5 mx-auto'>

		<h1 class='display-6 mb-3 text-center'>Edit your Profile</h1>

    <form method="POST" action="">

		Username: <input type= 'text' class='form-control' name= 'Username'  value='<?php echo $_SESSION['Username']; ?>'>

    Password: <input type= 'password' class= 'form-control' name='Password' value="<?php echo $_SESSION['Password']; ?>">

    Address: <input type= 'text'  class='form-control' name= 'Address' value="<?php echo $_SESSION['Address']; ?>">

		Phone Number: <input type= 'text'  class='form-control' name= 'Phone_Number' value="<?php echo $_SESSION['Phone_Number']; ?>">

		Backup Number: <input type= 'text'  class='form-control' name= 'Backup_Number' value="<?php echo $_SESSION['Backup_Number']; ?>">
		<div style='text-align:center'><input type='submit' class='btn btn-primary px-5 mt-4' name='Edit' value='Edit'>
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