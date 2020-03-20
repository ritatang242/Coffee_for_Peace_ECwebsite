<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {	
			background: black url("d3.jpeg") no-repeat;
			background-size: 1200px 800px;
			}
	</style>
</head>
<body>


<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connMysql.php");
if($_SESSION['username'] != null)
{
		//將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['username'];
		

        //將資料庫裡的訂單資料顯示在畫面上
		$sql = "SELECT cId, pName, unitPrice, amount, unitPrice*amount as totalPrice, cartTime
		FROM member as m,cart as c,product as p 
		WHERE user = '$id' AND c.pNo = p.pNo AND c.mId = m.mId
		AND cId =" .$_GET["cId"];
        $result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
?>
<form name="form" method="post" action="delete_finish.php">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <th colspan="2" align="center">Order Detail</th>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Code</td>
      <td valign="baseline"><?php echo $row[cId]?></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Product</td>
      <td valign="baseline"><?php echo $row[pName]?></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Unit Price</td>
      <td valign="baseline"><?php echo $row[unitPrice]?></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Amount</td>
      <td valign="baseline"><?php echo $row[amount]?></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Total Price</td>
      <td valign="baseline"><?php echo $row[totalPrice]?></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Time</td>
      <td valign="baseline"><?php echo $row[cartTime]?></td>
    </tr>
   <tr>
      <td colspan="2" align="center">
      <input name="cId" type="hidden" value="<?php echo $row[cId];?>">
      <input name="action" type="hidden" value="delete">
      <input type="submit" name="button" id="button" value="Delete">
      <button><a href="cart.php">Cart</button></td>
    </tr>
  </table>
</form>
<?php
     
}
else
{
	?>
	<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
	<tr>
    <th align="center">My cart</th>
	</tr>
	<tr>
    <td align="center" valign="baseline">Sorry, You don't have the access permition.</td>
	</tr>
	<tr>
    <td align="center" height="10"></td>
	</tr>
	</table>	
	<?php
	echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>