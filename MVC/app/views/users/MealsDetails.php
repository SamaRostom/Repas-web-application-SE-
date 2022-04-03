<!DOCTYPE html>
<html>
<head>
	<title>Appetizers</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<link rel="icon" type="image/png" href="icon.png">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>
.container {
  padding: 64px;
}

.column-66 {
  float: left;
  width: 66.66666%;
  padding: 250px;
  /*font-family: 'Roboto Mono', monospace;*/
}

.column {
  float: left;
  width: 33.33333%;
  height: 40%;
  padding: 10px;
}

img {
  display: block;
  height: auto;
  max-width: 150%;
}

#addtocartbtn{
	color:white;
}

/*button{
	color:white;
	background-color: blue;
}*/


</style>
</head>

<body>
<!-- <section>

	<div class="column">
		<div class="card">
			<div class="image">
				<img src="kobeba.jpeg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<h4>Kobeba Soiree</h4>
			</div>
			<button>View More</button>
		</div>
	</div>

</section> -->


<div class="container">
  <div class="row">
    <div class="column">
      <img src="kobeba.jpeg">
    </div>
    <div class="column-66">
    <h1 style=" color:#2a718e;">Kobeba Soiree</h1>
    <h4>Description:</h4>
    <p>
    	10 pieces for 65 L.E.
    </p>

    <div class="quantity buttons_added">
  	<input type="number" step="1" min="1" max="" value="1" id="quantity" name="quantity">
    <br><br>
    <input type="submit" name="add" id="addtocartbtn" class="btn btn-warning" value="Add to Cart">
    </div>
  </div>
</div>

</body>
</html>