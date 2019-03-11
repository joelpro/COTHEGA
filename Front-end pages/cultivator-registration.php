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
<a href="registral-welcome.php" style="position:absolute; right: 1%; top:16%;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap"  /></a>
<?php include('../Front-end pages/page-banner.php'); ?>
<div id="content">
<form action="../Back-end pages/cultivator-submittion.php" method="post">
<center><table width="80%" border="0" style="margin-top:1%; border:1px solid black; font-size:100%;">
<tr><td colspan="4" align="center" style="font-family:pristina; font-size:24px; font-weight:900;"><u>Adding new cultivator</u></td></tr>
<tr>
<!---------------------------------------------- Part for ownner ------------------------------------->
<td colspan="2">
<table width="98%">
<tr><th colspan="4" style="background-color:#000000; color:white; padding:4px;">Owner information</th></tr>
<tr><td width="30%">First name:</td><td colspan="3"><input type="text" name="first" required /></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td>Last name:</td><td colspan="3"><input type="text" name="last" required /></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td>Gender:</td><td align="center" colspan="2"><input type="radio" name="gender" value="M" required />Male </td><td> <input type="radio" name="gender" value="F" required />Female</td></tr>
<tr><td colspan="4"></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td>National dentity:</td><td colspan="3"><input type="text" name="nation" required maxlength="16" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td><td><label style="color:red; font-size:20px;">*</label></td></tr>
<tr><td>Phone number:</td><td colspan="3"><input type="text" name="phone" required maxlength="10" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td><td><label style="color:red; font-size:20px;">*</label></td></tr>
<tr><td>Account number:</td><td colspan="3"><input type="text" name="account" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td><td><label style="color:red; font-size:20px;">*</label></td></tr>
<tr><td>Block cultivate in:</td><td colspan="3">
<select name="block">
<?php
include('../Back-end pages/connectify.php');
$sel1=mysql_query("select * from block group by block_name order by block_name") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
?>
<option value="<?php echo $data1['block_id']; ?>"><?php echo $data1['block_name']; ?></option> 
<?php
}
?>
</select>
</td></tr>
<tr><td>Living place:</td><td colspan="3">
<select name="place">
<?php
$sel1=mysql_query("select * from district group by name order by name") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
$sel2=mysql_query("select * from sector where dist_id='".$data1['dist_id']."'") or die(mysql_error());
while($data2=mysql_fetch_array($sel2))
{
?>
<option value="<?php echo $data2['sec_id']; ?>"><?php echo $data1['name']." - ".$data2['name']; ?></option> 
<?php
}
}
?>
</select>
</td></tr>
<tr><td>Cell:</td><td colspan="3"><input type="text" name="cell" /></td></tr>
<tr><td>village:</td><td colspan="3"><input type="text" name="village" /></td></tr>
<tr><td colspan="4"></td></tr>
</table>
</td>
<!---------------------------------------------- Part for owner ------------------------------------->

<!---------------------------------------------- Part for guardian ------------------------------------->
<td colspan="2">
<table align="right" width="98%">
<tr><th colspan="4" style="background-color:#000000; color:white; padding:4px;">Guardian information</th></tr>
<tr><td width="30%">First name:</td><td colspan="3"><input type="text" name="G_first" required /></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td>Last name:</td><td colspan="3"><input type="text" name="G_last" required /></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td>Gender:</td><td align="center" colspan="2"><input type="radio" name="G_gender" value="M" required />Male </td><td> <input type="radio" name="G_gender" value="F" required />Female</td></tr>
<tr><td colspan="4"></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td>National dentity:</td><td colspan="3"><input type="text" name="G_nation" required maxlength="16" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td><td><label style="color:red; font-size:20px;">*</label></td></tr>
<tr><td>Phone number:</td><td colspan="3"><input type="text" name="G_phone" required maxlength="10" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td><td><label style="color:red; font-size:20px;">*</label></td></tr>
<tr><td>Living place:</td><td colspan="3">
<select name="G_place">
<?php
$sel1=mysql_query("select * from district group by name order by name") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
$sel2=mysql_query("select * from sector where dist_id='".$data1['dist_id']."'") or die(mysql_error());
while($data2=mysql_fetch_array($sel2))
{
?>
<option value="<?php echo $data2['sec_id']; ?>"><?php echo $data1['name']." - ".$data2['name']; ?></option> 
<?php
}
}
?>
</select>
</td></tr>
<tr><td>Cell:</td><td colspan="3"><input type="text" name="G_cell" /></td></tr>
<tr><td>village:</td><td colspan="3"><input type="text" name="G_village" /></td></tr>
<tr><td>&nbsp;</td><td colspan="3">&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td colspan="3">&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td colspan="3">&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="4"></td></tr>
</table>
</td>
<!---------------------------------------------- Part for guardian ------------------------------------->

</tr>
<tr><td>&nbsp;</td></tr>
<tr style="background-color:black;"><td colspan="4" style="padding:10px;" align="center"><input type="submit" name="cultivator" value="Register" />&nbsp;<input type="reset" name="" value="Reset" /></td></tr>
</table></center>
</form>
</div>
</div>

</body>
</html>
