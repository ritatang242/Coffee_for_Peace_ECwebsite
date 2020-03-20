<html>
<head>
    <title>My Cart</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {	
			background: black url("asset/d3.jpeg") no-repeat;
			background-size: 100%;
			}
	</style>
</head>
<?php
error_reporting(0);
include("connMysql.php");

if($_SESSION['username'] != null && isset($_POST["action"]))
{
	$id = $_SESSION['username'];
	$cId=$_POST['cId'];
	if($cId!=''){

	 $sql="SELECT cId, pName, unitPrice, amount, unitPrice*amount as totalPrice, cartTime
			FROM member as m,cart as c,product as p 
			WHERE user = '$id' AND c.pNo = p.pNo AND c.mId = m.mId
			AND cId = '$cId'";
	 $result = mysql_query($sql);
	}else{
	 $result = mysql_query("SELECT cId, pName, unitPrice, amount, unitPrice*amount as totalPrice, cartTime
			FROM member as m,cart as c,product as p 
			WHERE user = '$id' AND c.pNo = p.pNo AND c.mId = m.mId
			Order by cId");
	}
}
?>

<body>
<h1 align="center">Quick Search</h1>

<form id="form" name="form" method="post" action="">

<h4 align="center">Order Code：
  <input name="cId" type="text">
  <input type="submit" name="button" id="button" value="Search">
  <button><a href="cart.php">Cart</a></button>
</h4>
	
</form>

	<table width='auto',border='0' align='center' cellpadding="5" cellspacing="0">
		<tr bgcolor='#CCCCCC'>
			<th width="80" align="center">Code</th>
			<th width="80" align="center">Product</th>
			<th width="80" align="center">Unit Price</th>
			<th width="80" align="center">Amount</th>
			<th width="80" align="center">Total Price</th>
			<th align="center">Time</th>
		</tr>

<?php		
		 while($row = mysql_fetch_row($result))
        {
            echo "<tr>";
			echo "<td align='center'>".$row[cId]."</td>";
			echo "<td align='center'>".$row[pName]."</td>";
            echo "<td align='center'>".$row[unitPrice]."</td>";
			echo "<td align='center'>".$row[amount]."</td>";
			echo "<td align='center'>".$row[totalPrice]."</td>";
			echo "<td align='center'>".$row[cartTime]."</td>";
			echo "</tr>";
        }
?>

	</table>


</body>
</html>