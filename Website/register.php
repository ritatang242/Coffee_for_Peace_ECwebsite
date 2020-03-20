<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {	
			background: black url("asset/d2.jpg") no-repeat;
			background-size: 100%;
			}
	</style>
</head>
<body>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form name="form" method="post" action="register_finish.php">
  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <th colspan="2" align="center">Register</th>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Username*</td>
      <td width="100" valign="baseline"><input type="text" name="id"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Passward*</td>
      <td valign="baseline"><input type="password" name="pw"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Confirm Passward*</td>
      <td><input type="password" name="pw2"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Name*</td>
      <td valign="baseline"><input type="text" name="name"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Birthday</td>
      <td valign="baseline"><input type="date" name="birthday"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Sex</td>
      <td valign="baseline"><input type="radio" name="sex" value="M" checked>M
							<input type="radio" name="sex" value="F">F</td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Contact Number</td>
      <td><input type="text" name="phone"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Shipping Address</td>
      <td><input type="text" name="address"></td>
    </tr>
    <tr>
      <td width="80" align="center" valign="baseline">Email*</td>
      <td valign="baseline"><input type="text" name="email"></td>
    </tr>
    <tr>
      <th colspan="2" align="center">
	  <input type="submit" name="button" id="button" value="Sign Up">
	  <input type="reset" name="button2" id="button2" value="Reset">
	</tr>
  </table>
</form>


</body>
</html>