<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .networks a,
        .links p, .links a{
            text-decoration: none;
            color: rgb(70, 110, 170);
            padding: 0rem .5rem
        }
    </style>
</head>
<body>
  <div class='py-4 bg-light col-12 footer'>
    <div class='networks fs-4 text-center'>
    <a href='https://www.facebook.com/Repasfrozenmeals' target='blank'><i class="fab fa-facebook"></i></a>
    <a href='https://www.instagram.com/repas_frozenmeals/' target='blank'><i class="fab fa-instagram"></i></a>
    </div>
    <div class='links text-center'>
        <p class='my-2'><a href="<?php echo URLROOT . 'pages/about'; ?> " class="menu">About Us</a>  &#9679; <a href="<?php echo URLROOT . 'pages/contact'; ?>" class="menu">Contact Us</a>  &#9679; <a href=<?php echo URLROOT . 'users/Register'?>> Join Us</a></p>
    </div>
    </div>
</body>
</html>
