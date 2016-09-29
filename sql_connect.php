<?php
	$mysqli = mysqli_connect("localhost", "root", "", "produkto");
	/* check connection */
	if (!$mysqli) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
?>
