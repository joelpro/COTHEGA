<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>COTHEGA-Rwanda</title>
<link rel="stylesheet" type="text/css" href="../styling.css" />
<style>
input[type=text]
{
width:98%;
}
</style>
</head>

<body>

<div id="container">
<?php include('../Front-end pages/page-banner.php'); ?>
<a href="registral-welcome.php" style="position:fixed; right: 1%; top:18%;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap"  /></a>
<div id="content">
<form action="../Back-end pages/charge_submittion.php" method="post">
<center><table width="35%" border="0" style="margin-top:1%; font-size:100%;">
<tr><td colspan="4" align="center" style="font-family:pristina; font-size:24px; font-weight:900;"><u>Registration of charges per KG</u></td></tr>
<tr><td width="30%">Fertilizer:</td><td colspan="3"><input type="text" name="fert" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Union Federation:</td><td colspan="3"><input type="text" name="fed" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Transport:</td><td colspan="3"><input type="text" name="trans" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Management fees:</td><td colspan="3"><input type="text" name="fees" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>REA:</td><td colspan="3"><input type="text" name="rea" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Nursery:</td><td colspan="3"><input type="text" name="nurse" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>MUSA:</td><td colspan="3"><input type="text" name="musa" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Tax:</td><td colspan="3"><input type="text" name="tax" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Public support:</td><td colspan="3"><input type="text" name="sup" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Pluckers:</td><td colspan="3"><input type="text" name="pluck" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>General activity:</td><td colspan="3"><input type="text" name="general" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>BRD credit:</td><td colspan="3"><input type="text" name="brd" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Agaciro DF:</td><td colspan="3"><input type="text" name="df" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Part Social:</td><td colspan="3"><input type="text" name="part" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Unit Price:</td><td colspan="3"><input type="text" name="price" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td>Term:</td><td colspan="3"><select name="term" required><option value="A">A</option><option value="B">B</option><option>C</option><option>D</option></select></td></tr>
<tr><td>Year:</td><td colspan="3"><input type="text" name="year" required onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="register" value="Register" />&nbsp;&nbsp;<input type="reset" name="reset" value="Reset" /></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
</table></center>
</form>
</div>
</div>

</body>
</html>
