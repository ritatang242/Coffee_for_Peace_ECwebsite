<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {	
			background: black url("asset/d3.jpeg") no-repeat;
			background-size: 100%;
			}
	</style>
</head>
<body>
<?php session_start(); 
include("connMysql.php");

//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['username'] != null)
{
	    //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['username'];

        //將資料庫裡的訂單資料顯示在畫面上
		$sql = "SELECT cId, pName, unitPrice, amount, unitPrice*amount as totalPrice, cartTime
		FROM member as m,cart as c,product as p WHERE user = '$id' AND c.pNo = p.pNo AND c.mId = m.mId
		Order by cId";
        $result = mysql_query($sql);
		$sql2 = "SELECT SUM(unitPrice*amount) as sumPrice
		FROM member as m,cart as c,product as p WHERE user = '$id' AND c.pNo = p.pNo AND c.mId = m.mId
		Order by cId";
		$result2 = mysql_query($sql2);
		$result3 = mysql_query("SELECT SUM(amount) as Total
		FROM member as m,cart as c,product as p WHERE user = '$id' AND c.pNo = p.pNo AND c.mId = m.mId
		Order by cId");
?>      
 
		<h1 align="center">Hi, This is <?php echo $id ?>'s Cart</h1>
		<p align="center"><a href="query.php" class="w3-bar-item w3-button w3-white">Search</a></button>
		<a href="member.php" class="w3-bar-item w3-button w3-white">Home</a></button></p>
        <table width='auto' border='0' align='center' cellpadding="5" cellspacing="0" >
		<tr bgcolor='#CCCCCC'>
			<th width="80" align="center">Code</th>
			<th width="80" align="center">Product</th>
			<th width="80" align="center">Unit Price</th>
			<th width="80" align="center">Amount</th>
			<th width="80" align="center">Total Price</th>
			<th width="auto" align="center">Time</th>
			<th>Edit</th>
		</tr>

		
<?php		
		 while($row = mysql_fetch_assoc($result))
        {
            echo "<tr>";
			echo "<td align='center'>".$row[cId]."</td>";
			echo "<td align='center'>".$row[pName]."</td>";
            echo "<td align='center'>".$row[unitPrice]."</td>";
			echo "<td align='center'>".$row[amount]."</td>";
			echo "<td align='center'>".$row[totalPrice]."</td>";
			echo "<td align='center'>".$row[cartTime]."</td>";
			echo "<td align='center'><a href='delete.php?cId=".$row[cId]."' class='hover2'>Delete</a></td>";
			echo "</tr>";
        }
 
		$sum1 = mysql_fetch_assoc($result2);
		$sum2 = mysql_fetch_assoc($result3);
?>
		<tr>
			<th align="center">Total</th>
			<th align="center"><?php echo mysql_num_rows($result)."orders" ?></th>
			<th></td>
			<th align="center"><?php echo $sum2[Total] ?></th>
			<th align="center"><?php echo $sum1[sumPrice] ?></th>
			<th></th>
			<th></th>
		</tr>
		</table>
<?php
}else
{
	?>
	<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
	<tr>
    <th align="center">My Cart</th>
	</tr>
	<tr>
    <td align="center" valign="baseline">Sorry, You don't have the access permition</td>
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