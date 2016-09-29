<?php
	include("sql_connect.php");
	if(isset($_GET['pid'])){
		$res = mysqli_query($mysqli, "SELECT * FROM products WHERE productID = ".$_GET['pid']);
		$product = mysqli_fetch_row($res);
	}else {
		header("location:index.php");
	}
?>
<html>
<head>
	<title>View Product</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<style>
		.product {
			width: 20%;
		}
	</style>
</head>
<body>
<?php include("navbar.php"); ?>
<h1 class='text-center'>View Product</h1>
<div class='col-sm-4 col-sm-offset-4'>
	<h3 class='text-center'><?php echo $product[1];?></h3>
	<p class='text-center'>Price:<?php echo $product[2];?></p>
	<p class='text-center'>Description:<?php echo $product[3];?></p>
	<p class='text-center'><img src='image/<?php echo $product[4];?>' class='img-thumbnail product'>
</div>	
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>