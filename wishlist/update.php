<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'nastya');
	$query = mysqli_query($con,"UPDATE wishlist SET text='".$_POST['text']."' WHERE id ='" . $_POST['id'] . "'");
	header('Location: http://aa/wishlist/index.php');
 ?>