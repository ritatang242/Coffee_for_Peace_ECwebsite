<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connMysql.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];

if($_SESSION['username'] != null && $pw != null && $pw2 != null && $pw == $pw2)
{
$id = $_SESSION['username'];
    
//更新資料庫資料語法
$sql = "update member 
		set pw = '$pw', name = '$name', birthday = '$birthday', sex = '$sex', phone = '$phone', address = '$address', email = '$email'
		where user='$id'";
	if(mysql_query($sql))
	{
?>
	<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
	<tr>
    <th align="center">Settings</th>
	</tr>
	<tr>
    <td align="center" valign="baseline">Successful! Please hold...</td>
	</tr>
	<tr>
    <td align="center" height="10"></td>
	</tr>
	</table>	
<?php
		echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
	}
	else
	{
	?>
	<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
	<tr>
    <td align="center">Settings</td>
	</tr>
	<tr>
    <td align="center" valign="baseline">Failed! Please try again.</td>
	</tr>
	<tr>
    <td align="center" height="10"></td>
	</tr>
	</table>	
	<?php
		echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
			}
	}
else
{
	?>
	<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
	<tr>
    <th align="center">Settings</th>
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