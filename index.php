<?php
include("sql_connect.php");
?>
<html>
<head>
	<title>Food List</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
<body>
<?php include("navbar.php"); ?>
<div class='row'>
	<div class='col-md-10 col-sm-offset-1'>
		<table class='table table-bordered'>
			<tr>	
				<th>ID</th>
				<th>Name</th>
				<th>Price</th>
				<th>Description</th>
				<th>Option</th>
			</tr>
			<?php 
			$result = mysqli_query($mysqli, "SELECT * FROM products");

			$names = array();
			$price = array();
			$desc = array();
			$images = array();

			if($result){
				$index = 0;
				while($row = mysqli_fetch_array($result)){
					$names[] = $row[1];
					$price[] = $row[2];
					$desc[] = $row[3];
					$images[] = $row[4];

					echo "<tr>";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>
						<button class='btn btn-primary' alt='".$index++."'>
							<span class='glyphicon glyphicon-eye-open'></span>
						</button>";
					echo " <a href='edit.php?pid=".$row[0]."'>
								<button class='btn btn-warning'>
									<span class='glyphicon glyphicon-pencil'></span>
								</button>
							</a>";
					echo " <a href='delete.php?pid=".$row[0]."' class='check'>
								<button class='btn btn-danger'>
									<span class='glyphicon glyphicon-remove'></span>
								</button>
							</a>
						</td>";
					echo "</tr>";
				}
			}

			?>
		<table>
	</div>
</div>

<div class='modal fade myModal' tab-index='-1' role='dialog' aria-labelledby='myModal'>
	<div class='modal-dialog modal-sm' role='document'>
		<div class='modal-content'>
			
				<h3 class='text-center mod_name'></h3>
				<p class='text-center'><strong>Price: </strong><span class='mod_price'></span></p>
				<p class='text-center'><strong>Description: </strong><span class='mod_desc'></span></p>
				<p class='text-center'><img src='#' class='img-thumbnail'></p>
			
		</div>
	</div>
</div>

</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>

var names = [<?php echo "'".join("','", $names)."'";?>];
var prices = [<?php echo "".join(",", $price)."";?>];
var descs = [<?php echo "'".join("','", $desc)."'";?>];
var images = [<?php echo "'".join("','", $images)."'";?>];

$(document).ready(function(){
	$(".check").on("click", function(){
		return confirm("Are you sure?");
	});

	$(".btn-primary").on("click", function(){
		var i = $(this).attr("alt");
		var productName = names[i];
		var productPrice = prices[i];
		var productDesc = descs[i];
		var img = images[i];

		$(".mod_name").text(productName);
		$(".mod_price").text(productPrice);
		$(".mod_desc").text(productDesc);
		$('.img-thumbnail').attr('src', "image/"+img);
		$(".modal").modal("show");
	});
});
</script>