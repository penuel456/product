<?php
	require("sql_connect.php");
	if(isset($_GET['pid'])){
		mysqli_query($mysqli, "DELETE FROM products WHERE productID = ".$_GET['pid']);
		header("location:index.php");
	}else {
		header("location:index.php");
	}
?>