<?php
	if(!isset($_POST['pname']) || !isset($_POST['pprice'])){
		echo "No food! YOU DOUCHE!";
		exit();
	}

	$name = $_POST['pname'];
	$price = $_POST['pprice'];
	$desc = $_POST['pdesc'];

	if($_FILES['pphoto']['error'] == 0){
		move_uploaded_file($_FILES['pphoto']['tmp_name'], "image/".$_FILES['pphoto']['name']);
		$photo = $_FILES['pphoto']['name'];
		require('sql_connect.php');
		$sql = mysqli_query($mysqli, 
			"INSERT INTO products (productID, productName, productPrice, productDescription, productImage)
			VALUES (NULL, '".$name."', '".$price."', '".$desc."', '".$photo."')
			");

		if($sql){
			header("location:index.php");
		}else {
			echo "IT WON'T ADD FOOD!! :(";
			exit();
		}
	}
?>