<!DOCTYPE html>
<html>
<head>
    <title>Log Out</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//將session清空
unset($_SESSION['username']);
?>
<table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="center">Log Out</td>
  </tr>
  <tr>
    <td align="center" valign="baseline"><?php echo $_SESSION["membername"];?>Sucessful! Please hold...</td>
  </tr>
  <tr>
    <td align="center" height="10"></td>
  </tr>
</table>	
<?php
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
?>

</body>
</html>