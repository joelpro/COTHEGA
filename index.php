<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>COTHEGA-Rwanda</title>
<link rel="stylesheet" type="text/css" href="styling.css" />
<style>
#container
{
width:1333px;
height:650px;
background:white;
opacity:0.6;
box-shadow:0px 0px 2px 2px black;
overflow:auto;
}
</style>
</head>

<body>

<div id="container">
<?php include('Front-end pages/banner.php'); ?>
<fieldset><legend>COTHEGA board authontication</legend>
<form action="Back-end pages/sign-in.php" method="post">
<table border="0" width="100%">
<tr><td>&nbsp;</td></tr>
<tr><td>
<table align="center" width="60%"><tr><td>
<input type="text" name="user" placeholder='------------- Enter UserName ----------------' title="your username here please" required /></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td><input type="password" name="key" title="please, keep your silent keystroke!" placeholder='-------------- Enter Password ----------------' required /></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><input type="submit" name="login" value="Login"/>
</td></tr></table>
</td></tr>
<tr><td>&nbsp;</td></tr>
</table>
<a href="Front-end pages/signup-page.php" style="position:absolute; right:0%; bottom:1%;">create an account</a></label>
</fieldset>
</form>
</div>
<?php include('Front-end pages/footer.php'); ?>

</body>
</html>
