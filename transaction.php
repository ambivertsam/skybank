<?php
include("header.php");
include("database.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Bank</title>
</head>
<style type="text/css">

		body
		{
			background-image: url(4.jpg);
			background-size: cover;
			background-attachment: fixed;
		}
	</style>
<body>
	<?php
$IIFSC=$_GET['RECIEVER'];
$sql="SELECT * FROM `customers` WHERE `IIFSC`='$IIFSC'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
?>
<form method="POST" action="transaction.php">
	<table align="center" border="1" style="width: 70%"; margin-top:40px;">
	<tr>
	<th>Name</th>
	<td><input type="text" name="name" value=<?php echo $data['Name']; ?> required></td>
	</tr>
    <tr>
	<th>Account No</th>
	<td><input type="text" name="IIFSC" value=<?php echo $data['acc']; ?> required></td>
	</tr> 
    <tr>
	<th>IIFC</th>
	<td><input type="text" name="acc" value=<?php echo $data['IIFC']; ?> required></td>
	</tr> 
    <tr>
	<th>Branch</th>
	<td><input type="text" name="pcon" value=<?php echo $data['Branch']; ?> required></td>
	</tr> 
	<tr>
	<th>Email</th>
	<td><input type="number" name="sem" value=<?php echo $data['Email']; ?> required></td>
	</tr> 
	<tr>
	<th>Balance</th>
	<td><input type="number" name="sem" value=<?php echo $data['Balance']; ?> required></td>
	</tr>
	<tr> <input type="submit" name="submit" value="submit"></tr>
</table>
</form>
</body>
</html>