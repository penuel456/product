<?php
	require("sql_connect.php");

	$name = $_POST['pname'];
	$price = $_POST['pprice'];
	$desc = $_POST['pdesc'];
	$photo = $_FILES['pphoto']['name'];

	

	if($_FILES['pphoto']['tmp_name'] == ""){
		$stmt = "UPDATE products SET 
		productName = '".$name."', 
		productPrice = ".$price.", 
		productDescription = '".$desc."',  
		WHERE productID = ".$_POST['id'];

		$res = mysqli_query($mysqli, $stmt);
	}else {
		$stmt = "UPDATE products SET 
		productName = '".$name."', 
		productPrice = ".$price.", 
		productDescription = '".$desc."', 
		productImage = '".$photo."' 
		WHERE productID = ".$_POST['id'];

		move_uploaded_file($_FILES['pphoto']['tmp_name'], "image/".$_FILES['pphoto']['name']);
		$res = mysqli_query($mysqli, $stmt);
	}

	if($res){
		header("location:index.php");
	}else {
		echo "Error: CAN'T UPDATE FOOD!";
	}

	
?>