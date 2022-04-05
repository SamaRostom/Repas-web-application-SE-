<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4" id="nb">
  <div class="container-fluid">
    <!-- <a class="logo" href='../../../public/images/re.jpg'></a> -->
    <!-- <img src='../../../public/images/re.jpg'> -->
    <img src='../images/re.jpg' style="border-radius: 50%;" width="90" height="90">
    <img src='images/re.jpg' style="border-radius: 50%;" width="90" height="90">
    <a class="navbar-brand" href="<?php echo URLROOT . 'public'; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT . 'public'; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'users/allmeals'; ?>">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'pages/about'; ?>">About Us</a>
        </li>
		<li class="nav-item">  <a class="nav-link" href="<?php echo URLROOT . 'pages/contact'; ?>">Contact Us</a>
         </li>
         <li class="nav-item">  <a class="nav-link" href="<?php echo URLROOT . 'users/login'; ?>">Login</a>
         </li>
         <li class="nav-item">  <a class="nav-link" href="<?php echo URLROOT . 'users/register'; ?>">SignUp</a>
         </li>
         <li class="nav-item">  <a class="nav-link" href="<?php echo URLROOT . 'users/cart'; ?>">Cart</a>
         </li>
            <?php if (isset($_SESSION['user_id'])) {
              echo $_SESSION['user_name'];
            } 
            ?>
            <?php if (isset($_SESSION['user_id'])) : ?>
              <li><a class="dropdown-item" href="users/logout">Logout</a></li>
              <?php else : ?>
             
             <?php endif; ?>
          
        

      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
