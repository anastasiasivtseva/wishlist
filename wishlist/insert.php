<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'nastya');
	$query = mysqli_query($con, "INSERT INTO wishlist (id,date, text, img) VALUES ('".$_POST['id']."','".$_POST['date']."','".$_POST['text']."','img/". $_FILES['img']['name'] ."')");
	move_uploaded_file($_FILES['img']['tmp_name'], 'img/' . $_FILES['img']['name']);
	header('Location: http://aa/wishlist/index.php');
?>