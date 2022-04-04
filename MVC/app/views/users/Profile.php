<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>    
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="style/Profile.css">

	<script>
		function setImage(){
		var img = document.querySelector('.imgContainer img')

		if(img.src.endsWith('/')){
			img.src = 'images/avatar.png'
		}
	}
	</script>
		
</head>
<body onload="setImage()">
	<?php
class Profile extends View
{
  public function output()
  {
  	$title = $this->model->title;
    $subtitle = $this->model->subtitle;
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
<div class='container my-5 row col-10 col-sm-8 col-lg-7 m-auto rounded py-5 shadow'>
	<div class="imgContainer m-auto col-4">
		
		<div class="editIcon">
			<a href="editProfile.php">
				<i class="fas fa-pen"></i>
			</a>
		</div>
	</div>

	<div class="userDetails col-10 col-lg-6 m-auto offset-lg-1">
	<i class="fas fa-user"></i>"Username"<br><hr>
	<i class="fas fa-map-marker-alt"></i>"Address"<br><hr>
	<i class="fas fa-phone-alt"></i>"Phone_Number"-<br> "Backup_Number"<br><hr>
	    
	</div>	
</div>	
EOT;
    echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>
</body>
</html>