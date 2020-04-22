<?php 

	require_once "../libs/function.php";
	$obj = new Members();

	if( isset( $_GET['id'] ) ) {
		echo $ID = $_GET['id'];

		$data = $obj -> dataDelete($ID);

	}

	if ($data == true) {
		# code...
		header("location: ../index.php ");
	} 
	

 ?>