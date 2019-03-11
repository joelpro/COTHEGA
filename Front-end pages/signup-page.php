<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>COTHEGA-Rwanda</title>
<link rel="stylesheet" type="text/css" href="../styling.css" />
</head>

<body>

<div id="container">
<?php include('../Front-end pages/page-banner.php'); ?>
<div id="content">
<form action="../Back-end pages/sign-up.php" method="post">
<center><table width="30%" border="0" style="margin-top:7%; font-size:100%;">
<tr><td colspan="2" align="center" style="font-family:pristina; font-size:24px; font-weight:900;"><u> COTHEGA User Sign-up page </u></td></tr>
<tr><td colspan="2" align="center" style="font-family:pristina; font-size:24px; font-weight:900;"> </td></tr>
<tr><td width="35%">Enter Username:</td><td><input type="text" name="user" required/></td></tr>
<tr><td>Enter Password:</td><td><input type="password" name="pass" required/></td></tr>
<tr><td>Re-enter Password:</td><td><input type="password" name="repass" required/></td></tr>
<tr><td>Enter PIN:</td><td><input type="password" name="pin" maxlength="4" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" required/></td></tr>
<tr><td colspan="2" align="center" style="font-family:pristina; font-size:24px; font-weight:900;">&nbsp;</td></tr>
<tr><td colspan="2" align="center" style="font-family:pristina; font-size:24px; font-weight:900;"><input type="submit" value="Signup" name='signup' /> </td></tr>
</table></center>
</form>
</div>
</div>

</body>
</html>
