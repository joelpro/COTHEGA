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
<div id="content">
<a href="manager-welcome.php" style="position:absolute; right: 1%; top:16%;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap"  /></a>
<form action="../Back-end pages/sign-up.php" method="post">
<center><table width="31%" border="0" style="margin-top:4%;">
<tr><td colspan="4">&nbsp;</td></tr>
<tr><td colspan="4">&nbsp;</td></tr>
<tr><td colspan="4" align="center" style="font-family:pristina; font-size:24px; font-weight:900;">Register new system user</td></tr>
<tr><td width="25%">First name:</td><td colspan="3"><input type="text" name="fname" required /></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td>Last name:</td><td colspan="3"><input type="text" name="lname" required /></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td>Gender:</td><td colspan="3"><input type="radio" name="gender" value="M" required />Male &nbsp; <input type="radio" name="gender" value="F" required />Female</td></tr>
<tr><td colspan="4"></td></tr>
<tr><td>Birth date:</td>
<td>
   <select name="year" id="dob" title="Select year of birth !" required>
   <?php 
   $year=date('Y')-17;
   echo $year;
   $init=$year; 
   while($year>($init-80))
   { 
   ?>
   <option><?php echo $year; ?></option>
   <?php
   $year--;
   }
   ?>
   </select>
   </td>
   
   <td colspan="1">
   <select name="month" id="dob" title="Select month !" required>
   <?php 
   $m=1;
   while($m<=12)
   { 
   ?>
   <option><?php echo $m; ?></option>
   <?php
   $m++;
   }
   ?>
   </select>
   </td>
   
   <td colspan="1">
   <select name="day" title="Select day of birth !" id="dob" required>
   <?php 
   $m=1;
   while($m<=31)
   { 
   ?>
   <option><?php echo $m; ?></option>
   <?php
   $m++;
   }
   ?>
   </select>
   </td>
   </tr>
   <tr><td colspan="4"></td></tr>
   <tr><td>Phone number:</td><td colspan="3"><input type="text" name="phone" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" required /></td></tr>
   <tr><td colspan="4"></td></tr>
   <tr><td>Position:</td><td colspan="3"><select name="position" required><option>Manager</option><option>Data collection</option><option value="Encadeur">Peuser</option><option>Accountant</option></select></td></tr>
   <tr><td colspan="4">&nbsp;</td></tr>
   <tr><td colspan="2" align="right"><input type="submit" name="register" value="Register" /></td><td colspan="2"><input type="reset" name="" value="Reset" /></td></tr>
</table></center>
</form>

</div>
</div>

</body>
</html>
