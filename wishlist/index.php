<!DOCTYPE html>
<html>
<head>
	<title>Wish List</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="header container-fluid bg-primary" style="height: 100px;"></div>
	<div class="main">
		<div class="create">
			<form action="insert.php" method="POST" enctype="multipart/form-data">
				<input placeholder="text" name="text">
				<input type="date" placeholder="date" name="date">
				<input type="file" name="img">
				<button class="btn btn-outline-success my-2 my-sm-0">Create</button>
			</form>
		</div>
		<div class="container">
			<?php 
				$con = mysqli_connect('127.0.0.1', 'root', '', 'nastya');
				$query = mysqli_query($con, "SELECT * FROM wishlist ORDER BY id DESC");

			for ($i=0; $i < $query->num_rows; $i++) { 
				$result = $query->fetch_assoc();
		 	?>
		 	<div class="row mb-3">
		 		<div class="col-2 border">
		 			<p><?php echo $result['date']; ?> </p>
		 		</div>

		 		<div class="col-5">
		 			<div class="row">
		 				<div class="col-7 border">
		 					<p style="" class="p1" > <?php echo $result['text'];?> </p>
				 			<form method="POST" action="update.php">
				 				<input class="inp" style=" display: none;"  name="text" value=<?php echo '"'.$result['text']. '"'  ?>>
				 				<?php echo '<input  type="hidden" name="id" value="' . $result['id']. '">' ;?>
				 				<button class="btn btn-outline-success my-2 my-sm-0">change</button>
				 				<button type="submit" class="btn btn-outline-success my-2 my-sm-0">save changes</button>
				 			</form>
		 				</div>
			 			<div class="col-5"> <?php echo '<img style="height:40px;width=40px" src="' . $result['img'] . '">'; ?></div>
		 			</div>
		 		</div>

				<div class="col-2">
					<form method="POST" action="status.php">
						<button class="btn btn-outline-success my-2 my-sm-0">done</button>
					</form>
				</div>

		 		<div class="col-2 border">
		 			<form method="POST" action="delete.php">
		 				<?php echo '<input type="hidden" name="id" value="' . $result['id']. '">' ;?>
		 				<button class="btn btn-outline-success my-2 my-sm-0">delete</button>
		 			</form>
		 		</div>
	 		</div>
		 	<?php } ?>
		</div>
	</div>

	<script>
		var p1 = document.querySelector('.p1') ;
		var but = document.querySelector('.btn');
		var inp = document.querySelector('.inp');
			btn.onclick = function() { 
			   		p1.style.display = 'none';
			   		inp.style.display = 'block';
			   		btn.style.display = 'none';
			}
		  
	</script>
</body>
</html>