<!DOCTYPE html>
<html>
<head>
<title>Contact Us</title>
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
   <h2>$Phone</h2>
   <br><br>
   <h2>$Email</h2>
   <br><br>
   <h1>$Address</h1>
  
   <hr>
  
   <div class='networks fs-2 text-center'>
    <a href='https://www.facebook.com/Repasfrozenmeals' target='blank'><i class="fab fa-facebook"></i></a>
    <a href='https://www.instagram.com/repas_frozenmeals/' target='blank'><i class="fab fa-instagram"></i></a>
    </div>
  </div>
EOT;
        echo $text;
        require APPROOT . '/views/inc/footer.php';	
	}
}
?>
</body>