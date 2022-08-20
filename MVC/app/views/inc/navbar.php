<!DOCTYPE html>
<html>
	<head>
  <style>
			.navbar a i,.seperator , .navbar a{
				color: rgb(70, 110, 170) !important;
			}
      .logo{
        border-radius: 100%;
        width: 53px;
      }
      .d-flex{
        /* align:right; */
        /* position: right; */
      }
		</style>
	</head>
<body>
<?php
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
  ?>  
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4" id="nb">
  <div class="container-fluid">

    <img src="<?php echo IMGROOT . 're.jpg'; ?>" style="border-radius: 50%;" width="90" height="90">
    
    <a class="navbar-brand" href="<?php echo URLROOT . 'public'; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link active home"  href="<?php echo URLROOT . 'public'; ?>"><i class="fas fa-home"></i> Home </a>
        </li>
        <li class="nav-item" >
          <a class="nav-link categories" href="<?php echo URLROOT . 'users/Categories'; ?>"><i class="fa fa-shopping-bag" ></i> Shop </a>
        </li>
        <a class="nav-link catering" href="<?php echo URLROOT . 'users/Catering'; ?>"><i class="fa fa-shopping-bag" ></i> Catering </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link about" href="<?php echo URLROOT . 'pages/about'; ?>"><i class="fas fa-address-card" ></i> About </a>
        </li>
		    <li class="nav-item contact" ><a class="nav-link"  href="<?php echo URLROOT . 'pages/contact'; ?>"><i class="fas fa-phone" ></i> Contact</a>
         </li>
         <li class="nav-item dashboard">  <a class="nav-link" href="<?php echo URLROOT . 'users/dashboard'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
         </li>

         <div class="d-flex" ">
            <a class="cart text-decoration-none me-3" href='<?php echo URLROOT . 'users/cart'; ?>'><i class="fas fa-shopping-cart"><span class="badge rounded-pill bg-danger"><?php echo $num_items_in_cart; ?></span></i></a>
            <a class="profile text-decoration-none me-3" href='<?php echo URLROOT . 'users/profile'; ?>'><i class="fas fa-user-alt"></i></a>
            <a class="text-decoration-none signup me-3" href='<?php echo URLROOT . 'users/register'; ?>'>Sign up</a>
            <span class='seperator me-3'>|</span>
            <a class="text-decoration-none me-3 signin" href='<?php echo URLROOT . 'users/login'; ?>'>Sign in</a>
            <a class="signout text-decoration-none me-3" href='<?php echo URLROOT . 'users/logout'; ?>'>Sign out</a>
         </div>

          
      </ul>

      <?php if (isset($_SESSION['ID_Person'])) { ?>
      <div class='col-5 row'>
      <div class='px-4 col-7'>
        <div class="input-group mt-4 mb-3 search-box">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
        <input type="text" class="form-control" placeholder="Search..">
    </div>
    </div>
  </div>
  <?php } ?>

</nav>
<?php
if(isset($_SESSION['Username'])){ //if logged in
echo "<script>
console.log('Username: ".$_SESSION['Username']."')
document.querySelector('.signin').style.display = 'none'
document.querySelector('.signup').style.display = 'none'
</script>";
  if($_SESSION['ID_Type'] == "1"){ //Administrator
	//home, profile, about, categories, contact us, dashboard, sign out
	echo "<script>
	document.querySelector('.cart').style.display = 'none'
	</script>";
  }
  if($_SESSION['ID_Type'] == "2"){ //user
	//home, profile, about, categories, contact us, cart, sign out
	echo "<script>
  document.querySelector('.dashboard').style.display = 'none'
	</script>";
  }
}
//not logged in
else{
	//home, about, login, sign up, contact us, categories
	echo "<script>
document.querySelector('.signout').style.display = 'none'
document.querySelector('.profile').style.display = 'none'
document.querySelector('.catering').style.display = 'none'
document.querySelector('.cart').style.display = 'none'
document.querySelector('.dashboard').style.display = 'none'
</script>";
}
?>

<!-- <h6>Searching on:</h6> -->
    <!-- <div id="searchresult"></div> -->
    <div id="searchresult"></div>
    </div>

    <script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        if(inputVal!=""){
            $.ajax({
              // url:" echo URLROOT . 'views/inc/livesearch'; ?>",
              url:"http://localhost/software/repas-web-application--se-/mvc/app/views/inc/livesearch.php",
					   method:"POST",
					   data:{term:inputVal}, 
					   success:function(data){
						   $("#searchresult").html(data);
					   }

            });
        } else{
            $("#searchresult").empty();
        }
    });

});
</script>
</body>
</html> 