<!DOCTYPE html>
<html>
<head>
    <title>Membership System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connMysql.php");

//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['username'] != null)
{
	    //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['username'];
?>
		<h1 align="center" style="color:black">Welcome! <?php echo $id;?></h1>
		<p align="center">
        <a href="update.php" class="w3-bar-item w3-button w3-white">Settings</a>
        <a href="cart.php" class="w3-bar-item w3-button w3-white">Cart</a>
		<a href="logout.php" class="w3-bar-item w3-button w3-white">Log Out</a>
		</p>
		
<?php    
        //將資料庫裡的訂單資料顯示在畫面上
		$sql = "SELECT pName, unitPrice, amount, unitPrice*amount as totalPrice, cartTime
		FROM member as m,cart as c,product as p WHERE user = '$id' AND c.pNo = p.pNo AND c.mId = m.mId
		Order by cartTime";
        $result = mysql_query($sql);
?>       
        <table width='auto' border='0' align='center' cellpadding="5" cellspacing="0">
		<tr>
			<th width="80" align="center">Product</th>
			<th width="80" align="center">Unit Price</th>
			<th width="80" align="center">Amount</th>
			<th width="80" align="center">Total Price</th>
			<th align="center">Order Time</th>
		</tr>
		
<?php		
		 while($row = mysql_fetch_row($result))
        {
            echo "<tr><td align='center'>$row[0]</td>";
			echo "<td align='center'>$row[1]</td>";
            echo "<td align='center'>$row[2]</td>";
			echo "<td align='center'>$row[3]</td>";
			echo "<td align='center'>$row[4]</td>";
        }

?>
	</table>

<?php
}else
{
	?>
	<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
	<tr>
    <th align="center">Membership System</th>
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

	

</body>
</html>