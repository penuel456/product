<html>
<head>
	<title>Insert Food</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
<body>
<?php include("navbar.php"); ?>
<h2 class='text-center'>ADD MOAR FOOD</h2>
<div class='row'>
	<div class='col-md-4 col-sm-offset-4'>
		<div class='panel panel-primary'>
			<div class='panel-heading'>
				<h3 class='panel-title'>ADD FOOD PLOX</h3>
			</div>
			<div class='panel-body'>
				<form method='POST' action='insertProduct.php' enctype='multipart/form-data'>
					<input name='pname' type='text' class='form-control' placeholder='Name'>
					<input name='pprice' type='text' class='form-control' placeholder='Price'>
					<input name='pdesc' type='text' class='form-control' placeholder='Description'><br>
					<input name='pphoto' type='file' class='form-control'><br>
					<button class='btn btn-success pull-right'>Submit</button>
				</form>
			</div>
	</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
$(document).ready(function(){
	$(".check").on("click", function(){
		return confirm("Are you sure?");
	});
});
</script>