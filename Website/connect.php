<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>


<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("connMysql.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$sql = "SELECT * FROM `member` where user = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw)
{
     //將帳號寫入session，方便驗證使用者身份
    $_SESSION['username'] = $id;
?>
<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <th align="center">Log In</th>
  </tr>
  <tr>
    <td align="center" valign="baseline"><?php echo $_SESSION["membername"];?>Successful! Please hold...</td>
  </tr>
  <tr>
    <td align="center" height="10"></td>
  </tr>
</table>	
<?php
        echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
}
else
{
?>
<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <th align="center">Log In</td>
  </tr>
  <tr>
    <td align="center" valign="baseline"><?php echo $_SESSION["membername"];?>Failed! Please try again</td>
  </tr>
  <tr>
    <td align="center" height="10"></td>
  </tr>
</table>	
<?php
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>

</body>
</html>