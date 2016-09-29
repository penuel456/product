<?php
	if(!isset($_GET['pid'])){
		header("location:index.php");
	}

	require("sql_connect.php");
	$res = mysqli_query($mysqli, "SELECT * FROM products WHERE productID = ".$_GET['pid']);

	$data = mysqli_fetch_row($res);

?>
<html>
<head>
	<title>Insert Food</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
<body>
<?php include("navbar.php"); ?>
<h2 class='text-center'>CHANGE MY FOOD</h2>
<div class='row'>
	<div class='col-md-4 col-sm-offset-4'>
		<div class='panel panel-primary'>
			<div class='panel-heading'>
				<h3 class='panel-title'>WHY CHANGE <?php echo $data[1];?>?</h3>
			</div>
			<div class='panel-body'>
				<form method='POST' action="updateProduct.php"; enctype='multipart/form-data'>
					<input name='id' type='text' value='<?php echo $data[0];?>' class='hide'>
					<input name='pname' type='text' value='<?php echo $data[1];?>'class='form-control' placeholder='Name'>
					<input name='pprice' type='text' value='<?php echo $data[2];?>'class='form-control' placeholder='Price'>
					<input name='pdesc' type='text' value='<?php echo $data[3];?>'class='form-control' placeholder='Description'><br>
					<p class='text-center'>
						<img src='image/<?php echo $data[4];?>' class='img-thumbnail' style='width: 150px;'>
					</p>
					<input name='pphoto' type='file' value='<?php echo $data[4];?>'class='form-control'><br>

					<button class='btn btn-success pull-right'>Submit</button>
				</form>
			</div>
	</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>