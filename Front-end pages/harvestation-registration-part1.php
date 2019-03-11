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
<a href="director-welcome.php" style="position:absolute; right: 1%; top:16%;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap"  /></a>
<?php include('../Front-end pages/page-banner.php'); ?>
<div id="content">
<form action="harvestation-registration-part2.php" method="post">
<center><table width="37%" border="0" style="margin-top:10%; font-size:100%;">
<tr><td colspan="4" align="center" style="font-family:pristina; font-size:24px; font-weight:900;">cultivator harvest registration</td></tr>
<tr><td width="30%"><strong style="font-size:16px;">Choose block/site:</strong></td>
<td colspan="3"><select name="block">
<?php
include('../Back-end pages/connectify.php');
$sel1=mysql_query("select * from site group by name order by name") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
$sel2=mysql_query("select * from block where site_id='".$data1['site_id']."' group by block_name order by block_name") or die(mysql_error());
while($data2=mysql_fetch_array($sel2))
{
?>
<option value="<?php echo $data2['block_id']; ?>"><?php echo $data1['name']." - ".$data2['block_name']; ?></option> 
<?php
}
}
?>
</select></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td><strong style="font-size:16px;">Unit charges of:</strong></td>
<td colspan="2"><select name="term" title="Hitamo igihembe cy' ihinga">
<?php
$sel3=mysql_query("select Distinct term from charges") or die(mysql_error());
while($data3=mysql_fetch_array($sel3))
{
?>
<option><?php echo $data3['term']; ?></option>
<?php
}
?>
</select></td>
<td colspan="1"><select name='year' title="umwaka">
<?php
$sel3=mysql_query("select Distinct year from charges order by year desc") or die(mysql_error());
while($data3=mysql_fetch_array($sel3))
{
?>
<option><?php echo $data3['year']; ?></option>
<?php
}
?>
</select></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td><strong style="font-size:16px;">Days/ Month:</strong></td><td colspan="2">
<select required='Please select date' style="text-align:center;" name="day">
<option value=""> Day </option>
<?php
$day = 1;
while($day <= 31)
{
 echo "<option value='".$day."'>".$day."</option>";
 $day++;
}
?>
</select></td>
<td><select required='Please select month' style="text-align:center;" name="month">
<option value=""> Month </option>
<?php
$month = 1;
while($month <= 12)
{
 echo "<option value='".$month."'>".$month."</option>";
 $month++;
}
?>
</select>
</td><td><label style="color:red; font-size:20px;">*</label></td></tr>
<tr><td colspan="4">&nbsp;</td></tr>
<tr><td colspan="2" align="right">&nbsp;</td><td><input type="submit" name="part1" value="Register" /></td><td align="left"><input type="reset" name="reset" value="Reset" /></td></tr>
</table></center>
</form>
</div>
</div>

</body>
</html>
