<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {	
			background: black url("d3.jpeg") no-repeat;
			background-size: 100%;
			}
	</style>
</head>
<body>

<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connMysql.php");

if($_SESSION['username'] != null && isset($_POST["action"]) && ($_POST["action"]=="delete"))
{
	
        $id = $_SESSION['username'];
		$cId = $_POST['cId'];
		//刪除資料庫資料語法
        $sql = "DELETE cart 
				FROM cart,member,product 
				WHERE cart.mId=member.mId AND cart.pNo=product.pNo
				AND user='$id' AND cId='$cId'";
		
        if(mysql_query($sql))
        {
		?>
			<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
			<tr>
			<th align="center">My Cart</th>
			</tr>
			<tr>
			<td align="center" valign="baseline">Successful! Please hold...</td>
			</tr>
			<tr>
			<td align="center" height="10"></td>
			</tr>
			</table>	
		<?php
                echo '<meta http-equiv=REFRESH CONTENT=2;url=cart.php>';
        }
        else
        {
        ?>
	<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
	<tr>
    <th align="center">My Cart</th>
	</tr>
	<tr>
    <td align="center" valign="baseline">Failed! Please try again.</td>
	</tr>
	<tr>
    <td align="center" height="10"></td>
	</tr>
	</table>	
	<?php
                echo '<meta http-equiv=REFRESH CONTENT=2;url=cart.php>';
        }
}
else
{
 	?>
	<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
	<tr>
    <th align="center">My Cart</th>
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