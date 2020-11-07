<?php
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Bank</title>
	<link rel="stylesheet" type="text/css" href="customer.css">
	<style type="text/css">
		a: link
		{
			color: green;
		}

		body
		{
			background-image: url(3W4Z7S.jpg);
			background-size: cover;
			background-attachment: fixed;
		}
	</style>
</head>
<body>
	<form action="search.php" method="POST">

<table align="center" width="80%" border="1" style="margin-top: 150px">
	
	<tr style="background-color:#000;color:#fff">
		<th>Name</th>
		<th>Account No</th>
		<th>IIFSC</th>
		<th>Branch</th>
		<th>Email</th>
		<th>Balance</th>
	</tr>
<?php
	include('database.php');
	$sql=mysqli_query($con,"Select * from customers");
    while($result=mysqli_fetch_assoc($sql))
	{
	$id=$result['IIFSC'];
	?>
         <tr align="center">
         	     <td><?php echo $result['Name'];?></td>
         	     <td><?php echo $result['Account No'];?></td>
         	     <td><?php echo $result['IIFSC'];?></td>
         	     <td><?php echo $result['Branch'];?></td>
         	     <td><?php echo $result['Email'];?></td>
         	     <td><?php echo $result['Balance'];?></td>
         	     <td><a href="search.php?IIFSC=<?php echo $id ?>">Transact</a></td>
         </tr> 
         <?php
	}
?>
</table>
</form>
</body>
</html>

