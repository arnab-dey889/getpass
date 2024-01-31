<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Get Pass</title>
	<link rel="stylesheet" href="getpass_style.css">
	<style>
		.container{
			border-style: double;
			border-color: red;
			border-radius: 10px;
			border-width: 5px;
			padding-left: 50px;
		}
		.flg{
			color: blue;
			font-family: sans-serif;
			font-size: 30px;
			font-weight: bold;
			padding-right: 60px;
		}
		.rlg{
			font-family: sans-serif;
			font-size: 25px;
			font-weight: bold;
		}
		.tb{
			margin-top: -90px;
		}
		.o{
			margin-top: 20px;
			background-color: yellow;
			padding: 10px 20px 10px 20px;
			font-size: 20px;
			font-weight: bold;
			font-family: sans-serif;
			border-style: solid;
			border-width: 1px;
			border-color: red;
			border-radius: 8px;
			cursor: pointer;
		}
		.o:hover{
			background-color: #8B8000;
			border-color: blue;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
	<table border="0" align="center" cellpadding="20">
		<tr>
			<td align="left"><img src="rahul.png" height="300" width="300"></td>
			<td align="center">
	<span class="fg">GET PASS</span>
</td>
</tr>
</table>
<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","getpass");
if(isset($_POST["submit"])){
	$dep = $_POST["dep"];
	$rnum = $_POST["rn"];

if ($conn -> connect_error) {
	die("Connection Error ".$conn -> connect_error);
}
$sql = "SELECT * FROM getpass WHERE `Roll_Number` = '$rnum' AND `Department` = '$dep'";
$result = $conn -> query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo
		"<table border='0' align='center' cellspacing='20' cellpadding='5' class='tb'>",
		"<tr><td><span class='flg'>ID: </td></span><td><span class='rlg'>", $row['ID'], "</span></td></tr>",
		"<tr><td><span class='flg'>Name: </span></td><td><span class='rlg'>", $row['Name'], "</span></td></tr>",
		"<tr><td><span class='flg'>Contact Number: </span></td><td><span class='rlg'>", $row['Contact_Number'], "</span></td></tr>",
		"<tr><td><span class='flg'>Email: </span></td><td><span class='rlg'>", $row['Email'], "</span></td></tr>",
		"<tr><td><span class='flg'>Department: </span></td><td><span class='rlg'>", $row['Department'], "</span></td></tr>",
		"<tr><td><span class='flg'>Roll Number: </span></td><td><span class='rlg'>", $row['Roll_Number'], "</span></td></tr></table>";
	}
}
else{
	echo "No Results are found";
}
}
$conn->close();
?>
</div>
<center><input type="button" name="submit" id="submit" onclick="window.print();" class="o" value="Print Card"></center>
</body>
</html>