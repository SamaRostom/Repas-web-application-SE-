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

body{
	box-sizing: border-box;
	scroll-behavior: smooth;
}
section{
	padding: 100px 200px;
}
.cards a{
	width: 100%;
	display: flex;
	/*font-family: 'Parisienne', cursive;*/
	font-size: 35px;
	justify-content: center;
}
.cards{
	display: flex;
	width: 100%;
	/*display: table;*/
	justify-content: center;
	flex-direction: row;
}
.card{
	background-color: white;
	/*from em to px (value*16)*/
	/*width: 21.25em;*/
	height: 100%;
	flex-direction: column;
    flex-wrap: wrap;
	border-radius: 8px;
  	padding: 16px;
	margin: 15px;
	transition: 0.6s;
}
.column {
  float: left;
  width: 33.3333%;
 /* padding: 0 10px;*/
  display: table-cell;
  padding: 16px;
}
button{
	color: white;
}
</style>
</head>

<body>
<section>

	<div class="column">
		<div class="card">
			<div class="image">
				<img src="kobeba.jpeg" width=100% height=100% class="card-img-top">
			</div>
			<div class="info">
				<h4>Kobeba Soiree</h4>
			</div>
			<button class="btn btn-primary" onclick="window.location.href='MealsDetails.php';">View More</button>
		</div>
	</div>

</section>

</body>
</html>