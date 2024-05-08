<?php

session_start();
if($_SESSION['logged']== true){
	require "connect.php";
	?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bar</title>
</head>
<body>
	<a href="home.html"><Button>Home</Button></a>

	<form>
			<select>
				<?php
				$query=mysqli_query($conn,"SELECT * FROM panini");
				while ($row=mysqli_fetch_array($query)){
					?><option value="<?php echo $row['id'];?>"><?php echo $row['nome'];?></option>
					<?php
				} ?>
			</select>
		</form>

</body>
</html>

<?php }else{ ?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
		<p href="login.php">sei stronzo non loggato</p>

		
	</body>
	</html>

<?php 
	}
?>