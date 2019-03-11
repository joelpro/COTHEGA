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
#invisible
{
 visibility:hidden;
}
</style>
</head>

<body>

<div id="container">
<a href="registral-welcome.php" style="position:absolute; right: 1%; top:16%;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap"  /></a>
<?php include('../Front-end pages/page-banner.php'); ?>
<div id="content">
<form action="../Back-end pages/block&site-submittion.php" method="post">
<center><table width="31%" border="0" style="margin-top:9%; font-size:100%;">
<tr><td colspan="2" align="center" style="font-family:pristina; font-size:24px; font-weight:900;">Register new block or site</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td width="36%"><strong style="font-size:16px;">Block/site name:</strong></td><td><input type="text" name="name" required /></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td></td><td align="left">
    <table border="0" width="100%">
	<tr><td align="left">
	 <strong style="font-size:18px;"><input type="radio" name="choose" value="Block" required onclick="javascript:document.getElementById('invisible').style.visibility='visible';" />Block </strong>
	</td>
	<td align="left">
	 <strong style="font-size:18px;"><input type="radio" name="choose" value="Site" required onclick="javascript:document.getElementById('invisible').style.visibility='hidden';"/>Site</strong>
	</td></tr>
	</table>
</td></tr>
<tr id="invisible"><td><strong style="font-size:16px;">This block belong in:</strong></td>
<td colspan="2">
<select name="belong">
<?php 
include('../Back-end pages/connectify.php');
$sel1=mysql_query("select * from site") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
?>
<option value="<?php echo $data1['site_id']; ?>"><?php echo $data1['name']; ?> site</option>
<?php
}
?>
</select></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td></td><td>
    <table>
	<tr><td align="left">
	 <input type="submit" name="registered" value="Register" />
	</td>
	<td>
	 <input type="reset" name="reset" value="Reset" />
	</td></tr>
	</table>
</td></tr>
</table></center>
</form>
</div>
</div>

</body>
</html>
