<?php
session_start();
?>
<?php
include('header.php');
include('database.php');
$sid=$_GET['IIFSC'];
$sql="SELECT * FROM `customers` WHERE `IIFSC`='$sid'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html>
<head>
	<title>SKY Bank</title>
	<style type="text/css">
		body
		{
			background-image: url(3.jpg);
			background-size: cover;
			background-attachment: fixed;
		}
	</style>
</head>
<body>
<form method="POST" action="search.php">
	<table align="center" border="1" style="width: 70%; margin-top:40px">
	<tr>
	<th>Name</th>
	<td><input type="text" name="Name" value=<?php echo $data['Name']; ?> required></td>
	</tr>
    <tr>
	<th>Account No</th>
	<td><input type="text" name="Account No" value=<?php echo $data['Account No']; ?> required></td>
	</tr> 
    <tr>
	<th>IIFSC</th>
	<td><input type="text" name="IIFSC" value=<?php echo $data['IIFSC']; ?> required></td>
	</tr> 
    <tr>
	<th>Branch</th>
	<td><input type="text" name="Branch" value=<?php echo $data['Branch']; ?> required></td>
	</tr> 
	<tr>
	<th>Balance</th>
	<td><input type="text" name="Balance" value=<?php echo $data['Balance']; ?> required></td>
	</tr>
</table>

	 <table align="center" border="1" style="width: 70%; margin-top:150px">
	<form action="search.php" method="POST">
		<tr>
			<td align="center">Choose Reciever</td>
			<td><Select name="sem">
				<option value="0"></option>
				<option value="10001">Jeet</option>
				<option value="10002">Divyanshu Triphati</option>
				<option value="10003">Manik Agarwal</option>
				<option value="10004">Sourav Prakash</option>
				<option value="10005">Shaubhik</option>
				<option value="10006">Piyush</option>
				<option value="10007">Utkarsh</option>
				<option value="10008">Rishu</option>
				<option value="10009">Nikunj</option>
				<option value="1010">Bunny</option>
			</Select>
		</td>
		</tr>
		<tr>
			<td align="center">Enter Amount</td>
			<td><input type="text" name="amount" required="required"></td>
		</tr>
			<tr>
			<td colspan="1" align="center"></td>
			<td>
				<input type="submit" name="submit" value="Send Money"></td>
		</tr>
		<?php

	if(isset($_POST['submit']))
       {
  $sender=$_POST['IIFSC'];
  $reciever=$_POST['sem'];
  $balance=$_POST['Balance'];
  $amount=$_POST['amount'];
  $ans1=$balance-$amount;
  $ans2=$balance+$amount;
  $qry="INSERT INTO `transaction`(`senderIIFSC`, `receiverIIFSC`, `amount`) VALUES ('$sender','$reciever','$amount')";
  $qry1="UPDATE `customers` SET `Balance`='$ans1' WHERE `IIFSC`='$sender'";
  $qry2="UPDATE `customers` SET `Balance`='$ans2' WHERE `IIFSC`='$reciever'";

$run1=mysqli_query($con,$qry1);
$run2=mysqli_query($con,$qry2);
$run=mysqli_query($con,$qry);

  if($balance<$amount)
  {
   ?>
   <script>
   	alert("Not Sufficient Balance!!");
   	window.open("customer.php", "_self");
   </script>
   <?php
  }
  else
  {
  	?>
  	<script>
  	alert("Transfer Successful");
  	window.open("customer.php","_self");
  </script>
  <?php
  }
}
?>
</table>
</form>
</body>
</html>