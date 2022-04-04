<!DOCTYPE html>
<html>
<head>
<title>Contact Us</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/ContactUs.css">
</head>
<body>
<?php
class Contact extends View
{
	public function output(){
		$title = $this->model->title;
		$Address = $this->model->Address;
		$Email=$this->model->Email;
		$Phone=$this->model->Phone;
		require APPROOT . '/views/inc/header.php';
		$text = <<<EOT
		<div class="card" id="equipcard">
      <br><br>
      <h3> <b>CONTACT US:</b></h3><br>
   <h4>$Phone</h4>
   <br><br>
   <h4>$Email</h4>
   <br><br>
   <h4>$Address</h4>
  
   <hr>
  
   <div class='networks fs-2 text-center'>
    <a href='https://www.facebook.com/Repasfrozenmeals' target='blank'><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
    <a href='https://www.instagram.com/repas_frozenmeals/' target='blank'><i class="fa fa-instagram" aria-hidden="true"></i></a>
    </div>
  </div>
EOT;
        echo $text;
        require APPROOT . '/views/inc/footer.php';	
	}
}
?>
</body>