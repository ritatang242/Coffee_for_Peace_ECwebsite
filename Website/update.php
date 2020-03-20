<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include("connMysql.php");

if($_SESSION['username'] != null)
{
        //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $id = $_SESSION['username'];
        //若以下$id直接用$_SESSION['username']將無法使用
        $sql = "SELECT pw, name, birthday, sex, phone, address, email FROM member ";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
?>

<form name="form" method="post" action="update_finish.php">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <th colspan="2" align="center">Personal Information</th>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Username*</td>
      <td width="100" valign="baseline"><?php echo $id?></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Passward*</td>
      <td valign="baseline"><input type="password" name="pw" value="<?php echo $row[0]?>"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Confirm Passward*</td>
      <td><input type="password" name="pw2" value="<?php echo $row[0]?>"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Name*</td>
      <td valign="baseline"><input type="text" name="name" value="<?php echo $row[1]?>"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Birthday</td>
      <td valign="baseline"><input type="date" name="birthday" value="<?php echo $row[2]?>"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Sex</td>
      <td valign="baseline">
		<?php
		if($row[3]=="M"){
      		echo "<input type='radio' name='sex' value='M' checked>M
				  <input type='radio' name='sex' value='F'>F";
      	}else{
      		echo "<input type='radio' name='sex' value='M'>M
				  <input type='radio' name='sex' value='F' checked>F";
      	}
		?>
	  </td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Contact Number</td>
      <td><input type="text" name="phone" value="<?php echo $row[4]?>"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Shipping Address</td>
      <td><input type="text" name="address" value="<?php echo $row[5]?>"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Email*</td>
      <td valign="baseline"><input type="text" name="email" value="<?php echo $row[6]?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
	  <input type="submit" name="button" id="button" value="Update">
      <button><a href="member.php">Home</button></td>
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
    <th align="center">Personal Information</th>
  </tr>
  <tr>
    <td align="center" valign="baseline"><?php echo $_SESSION["membername"];?>Sorry, You don't have the access permition</td>
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