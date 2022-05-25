<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4" id="nb">
  <div class="container-fluid">
    <!-- <a class="logo" href='../../../public/images/re.jpg'></a> -->
    <!-- <img src='../../../public/images/re.jpg'> -->
    <img src="<?php echo IMGROOT . 're.jpg'; ?>" style="border-radius: 50%;" width="90" height="90">
    
    <a class="navbar-brand" href="<?php echo URLROOT . 'public'; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" style="position:relative; left:30px; font-size:20px">
          <a class="nav-link active"  style="color:blue;" href="<?php echo URLROOT . 'public'; ?>"><i class="fas fa-home" style="color:blue;"></i> Home </a>
        </li>
        <li class="nav-item"  style="font-size:20px; position:relative; left:35px;">
          <a class="nav-link"style="color:blue;" href="<?php echo URLROOT . 'users/allmeals'; ?>"><i class="fa fa-shopping-bag" style="color:blue;"></i> Shop </a>
        </li>
        <li class="nav-item " style="position:relative; left:40px;font-size:20px">
          <a class="nav-link"style="color:blue;" href="<?php echo URLROOT . 'pages/about'; ?>"><i class="fas fa-address-card" style="color:blue;"></i> About </a>
        </li>
		<li class="nav-item" style="position:relative; left:45px;font-size:20px"><a class="nav-link" style="color:blue;" href="<?php echo URLROOT . 'pages/contact'; ?>"><i class="fas fa-phone" style="color:blue;"></i> Contact</a>
         </li>
         <li class="nav-item" style="position:relative; left:760px;font-size:20px">  <a class="nav-link"style="color:blue;" href="<?php echo URLROOT . 'users/login'; ?>">Login</a>
         </li>
         <li class="nav-item" style="position:relative; left:770px;font-size:20px">  <a class="nav-link"style="color:blue;" href="<?php echo URLROOT . 'users/register'; ?>">SignUp</a>
         </li>
         <li class="nav-item" style="position:relative; left:80px;font-size:20px;">   <a class="nav-link"style="color:blue;" href="<?php echo URLROOT . 'users/cart'; ?>"><i class="fas fa-shopping-cart "style="color:blue;"></i></a>
         </li>
         <li class="nav-item" style="position:relative; left:90px; font-size:20px" > <a class="nav-link" style="color:blue;" href="<?php echo URLROOT . 'users/profile'; ?>"><i class="fas fa-user-alt"style="color:blue;"></i></a>
         
         </li>
         <!-- <li class="nav-item" style="font-size:26px" aria-hidden="true">  <a class="fa fa-sign-out" href="<?php echo URLROOT . 'users/logout'; ?>"></a>
         </li> -->
            <?php if (isset($_SESSION['user_id'])) {
              echo $_SESSION['user_name'];
            } 
            ?>
            <?php if (isset($_SESSION['user_id'])) : ?>
              <li><a class="dropdown-item" href="users/logout">Logout</a></li>
              <?php else : ?>
             
             <?php endif; ?>
          
      

      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
         <button class="btn btn-outline-success" type="submit">Search</button> -->
      <!-- </form> --> 
      <div class='col-5 row'>
      <div class='px-4 col-7'>
        <div class="input-group mt-4 mb-3 search-box">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
        <input type="text" class="form-control" placeholder="Search..">
    </div>
    </div>
  </div>
</nav>
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
    
    // Set search input value on click of result item
    // $(document).on("click", ".result p", function(){
    //     $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
    //     $(this).parent(".result").empty();
    // });
});
</script>
