<?php
error_reporting(0);
	$conn = mysqli_connect("localhost", "root", "", "getpass");
	if ($conn === false){
		die("Error. Couldn't Connect".mysqli_connect_error());
	}
	error_reporting(0);
	if(isset($_POST["submit"])){
		$name = $_POST["nme"];
		$cnumber = $_POST["cnumb"];
		$email = $_POST["email"];
		$dept = $_POST["dept"];
		$rnumber = $_POST["rnumber"];

		$var = rand(20000,90000);
	}
	$query = "INSERT INTO `getpass` (`ID`, `Name`,`Contact_Number`, `Email`, `Department`, `Roll_Number`) VALUES ('$var', '$name', '$cnumber', '$email', '$dept', '$rnumber')";

	$rs = mysqli_query($conn, $query);
	if($rs){
		echo "
			<script>window.open('thank_you_pop.html','_self');</script>";
	}
	mysqli_close($conn);
?>