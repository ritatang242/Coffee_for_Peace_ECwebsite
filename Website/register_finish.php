<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {	
			background: black url("asset/d2.jpg") no-repeat;
			background-size: 100%;
			}
	</style>
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

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        //新增資料進資料庫語法
        $sql = "insert into member (user, pw, name, birthday, sex, phone, address, email) 
				values ('$id', '$pw', '$name', '$birthday', '$sex', '$phone', '$address', '$email')";
        if(mysql_query($sql))
        {
		?>
		<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
		<tr>
		<th align="center">Sign Up</th>
		</tr>
		<tr>
		<td align="center" valign="baseline">Successful! Please log in.</td>
		</tr>
		<tr>
		<td align="center" height="10"></td>
		</tr>
		</table>	
		<?php
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
		?>
		<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
		<tr>
		<th align="center">Sign Up</th>
		</tr>
		<tr>
		<td align="center" valign="baseline">Failed! Please try again.</td>
		</tr>
		<tr>
		<td align="center" height="10"></td>
		</tr>
		</table>	
		<?php
            echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
}
else
{
?>
	<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
	<tr>
    <th align="center">Sign Up</th>
	</tr>
	<tr>
    <td align="center" valign="baseline">Failed! Please input the data.</td>
	</tr>
	<tr>
    <td align="center" height="10"></td>
	</tr>
	</table>	
<?php
        echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
}
?>

</body>
</html>