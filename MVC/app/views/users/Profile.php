<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    // $subtitle = $this->model->subtitle;
	$edaction = URLROOT . 'users/editProfile';
	$usn = $this->model->ViewProfile();
	$Ent = $this->model->ID_Type();
	//$username = $usn->address;
	$name=$_SESSION["Username"];
	$e=$_SESSION["Address"];
	$pn=$_SESSION["Phone_Number"];
	$bn=$_SESSION["Backup_Number"];
		
    // $username = $this->getModel()->username;

    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];

    require APPROOT . '/views/inc/header.php';
    ?>	
<div class='container my-5 row col-10 col-sm-8 col-lg-7 m-auto rounded py-5 shadow'>
	<div class="imgContainer m-auto col-4">
		
		<div class="editIcon">
			<a href="<?php echo $edaction; ?>">
				<i class="fas fa-pen"></i>
			</a>
		</div>
	</div>


	<div class="userDetails col-10 col-lg-6 m-auto offset-lg-1">

	<i class="fas fa-user"></i> <?php echo $name;?><br><hr>
	<i class="fas fa-map-marker-alt"></i> <?php echo $e;?><br><hr>
	<i class="fas fa-phone-alt"></i> <?php echo $pn;?><br>  <?php echo $bn;?><br><hr>
	    
	</div>	
</div>	
<?php
    require APPROOT . '/views/inc/footer.php';
  }
  public function o()
  {
  	$title = $this->model->title;
    // $subtitle = $this->model->subtitle;
	$edaction = URLROOT . 'users/editProfile';
	$usn = $this->model->ViewProfile();
	//$username = $usn->Username;
		
    // $username = $this->getModel()->username;

    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];


    require APPROOT . '/views/inc/header.php';

    foreach($usn as $x){
		?>
	<div class="column">
	<div class="card">
				<div class="image6">
					
					<?php echo $x->ID_Person ?>
				</div>
				<div class="info">
					<!-- <a href="<?php echo $edaction; ?>"><?php echo $x->Username ?></a> -->
					<form method="POST" action="<?php echo $edaction; ?>?id=<?php echo $x->ID_Person ?>">
						<input type="submit" name="catgname" placeholder="<?php echo $x->username ?>">
					</form>
				</div>
			</div>
		</div>
	
	<?php
	}


    $text = <<<EOT
<div class='container my-5 row col-10 col-sm-8 col-lg-7 m-auto rounded py-5 shadow'>
	<div class="imgContainer m-auto col-4">
		
		<div class="editIcon">
			<a href="$edaction">
				<i class="fas fa-pen"></i>
			</a>
		</div>
	</div>

	<div class="userDetails col-10 col-lg-6 m-auto offset-lg-1">

	<i class="fas fa-user"></i><"ahahah"><br><hr>
	<i class="fas fa-map-marker-alt"></i>"Address"<br><hr>
	<i class="fas fa-phone-alt"></i>"Phone_Number"-<br> "Backup_Number"<br><hr>
	    
	</div>	
</div>	
EOT;
    //echo $t;
    require APPROOT . '/views/inc/footer.php';
  }
}
?>
</body>
</html>