<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>CodePen - Pure CSS Flip Card</title>
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->

<!-- horizontal -->

<?php 
	include('/oasis_virtual/public_html/conexion.php');
	$query = "SELECT * FROM juegos";
	$resultado = mysqli_query($mysqli,$query);

	foreach($resultado as $row){
		$id = $row['id_juego'];
?>
<h4>Horizontal Flip</h4>
<div class="flip">
   <div class="front" style="background-image: url(https://images.pexels.com/photos/540518/pexels-photo-540518.jpeg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
      <h1 class="text-shadow">MOUNTAIN</hi>
   </div>
   <div class="back">
      <h2>Angular</h2>
      <p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
   </div>
</div>
<?php }?>
<div class="flip">
   <div class="front" style="background-image: url(https://images.pexels.com/photos/414171/pexels-photo-414171.jpeg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
      <h1 class="text-shadow">LAKE</hi>
   </div>
   <div class="back">
      <h2>Angular</h2>
      <p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
   </div>
</div>
<div class="flip">
   <div class="front" style="background-image: url(https://images.pexels.com/photos/36717/amazing-animal-beautiful-beautifull.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
      <h1 class="text-shadow">OCEAN</hi>
   </div>
   <div class="back">
      <h2>Angular</h2>
      <p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
   </div>
</div>

<br>
<br>

<!-- partial -->
<script  src="./script.js"></script>

</body>
</html>






<!-- vertical -->
  
<!-- <h4>Vertical Flip</h4>
<div class="flip flip-vertical">
    <div class="front" style="background-image: url(https://images.pexels.com/photos/38136/pexels-photo-38136.jpeg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
       <h1 class="text-shadow">FOREST</hi>
    </div>
    <div class="back">
       <h2>Angular</h2>
       <p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
    </div>
</div>
<div class="flip flip-vertical">
    <div class="front" style="background-image: url(https://images.pexels.com/photos/34950/pexels-photo.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
       <h1 class="text-shadow">TRACK</hi>
    </div>
    <div class="back">
       <h2>Angular</h2>
       <p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
    </div>
</div>
<div class="flip flip-vertical">
    <div class="front" style="background-image: url(https://images.pexels.com/photos/34546/sunset-lake-landscape-summer.jpg?w=1260&h=750&dpr=2&auto=compress&cs=tinysrgb)">
       <h1 class="text-shadow">SWAMP</hi>
    </div>
    <div class="back">
       <h2>Angular</h2>
       <p>Good tools make application development quicker and easier to maintain than if you did everything by hand..</p>
    </div>
</div> -->