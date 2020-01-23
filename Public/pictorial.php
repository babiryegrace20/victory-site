<?php 
	include '../Private/initialise.php';
	include SHARED_PATH.'/header.php';  
	?>

	<h3>VICTORY IN PICTURES</h3><br>
	<br>
	<?php 

	$images = scandir('image/');
	foreach ($images as $image) {
		if($image !== "." && $image !== ".." && $image !== "Capture.png" && $image !== "flier.jpg"){
			echo "	<img src= 'image/$image' style = 'width:80vw;'><br>";
		}
	}

	?>
	
	</div>
<?php include SHARED_PATH.'/footer.php'; ?>