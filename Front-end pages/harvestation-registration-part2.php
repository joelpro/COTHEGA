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
<?php
session_start();
if(isset($_POST['part1']))
{
if(isset($_POST['block']))
{
 $block=$_POST['block'];
 $_SESSION['block']=$block;
}
if(isset($_POST['term']))
{
 $term=$_POST['term'];
 $_SESSION['term']=$term;
}
if(isset($_POST['year']))
{
 $year=$_POST['year'];
 $_SESSION['year']=$year;
}
if(isset($_POST['day']) and isset($_POST['month']))
{
 $_SESSION['day']=$_POST['day'];
 $_SESSION['month']=$_POST['month'];
}
}
?>
<form action="../Back-end pages/harvest-submittion.php" method="post">
<center><table width="35%" border="0" style="margin-top:10%; font-size:100%;">
<tr><td colspan="4" align="center" style="font-family:pristina; font-size:24px; font-weight:900;">cultivators' harvest registration, <label style="color: blue;"><?php echo $_SESSION['day']." /".$_SESSION['month']." /".$_SESSION['year']; ?></label></td></tr>
<tr><td width="33%"><strong style="font-size:16px;">Cultivator:</strong></td><td colspan="3">
<select name="cult" required>
<?php
include('../Back-end pages/connectify.php');
$sel1=mysql_query("select firstname, lastname, number from cultivator where block_id='".$_SESSION['block']."' and status='Available' group by firstname order by number asc") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
?>
<option value="<?php echo $data1['number']; ?>"><?php echo $data1['number']." - ".$data1['firstname']."   ".$data1['lastname']; ?></option> 
<?php
}
$sel2=mysql_query("select charge_id, fertilizer, union_federation, transport, management_fees, REA, nursery, musa, tax, public_support, pluckers, general_activity, BRD_credit, agaciro_DF, part_social, Unit_price from charges where term='".$_SESSION['term']."' and year='".$_SESSION['year']."'") or die(mysql_error());
$data2=mysql_fetch_array($sel2);
$_SESSION['price']=$data2['Unit_price'];
?>
</select>
</td></tr>
<tr><td colspan="4"></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td><strong style="font-size:16px;">Unit price (Kg):</strong></td><td colspan="3"><input type="text" name="" readonly="" value="<?php echo $_SESSION['price']; ?> Rwf" maxlength="6" /></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td colspan="4"></td></tr>
<tr><td><strong style="font-size:16px;">Unit charge/tax (Kg):</strong></td><td colspan="3">
<?php
$net=$data2['fertilizer']+$data2['union_federation']+$data2['transport']+$data2['management_fees']+$data2['REA']+$data2['nursery']+$data2['tax']+$data2['musa']+$data2['public_support']+$data2['pluckers']+$data2['general_activity']+$data2['BRD_credit']+$data2['agaciro_DF']+$data2['part_social'];
$_SESSION['net']=$net;
$_SESSION['musa']=$data2['musa'];
$_SESSION['charge']=$data2['charge_id'];
?>
<input readonly="" type="text" <?php if($_SESSION['net']>$_SESSION['price']){ ?> title='Attention charges are very high' style="border:2px solid red; background-color:#FF6699;" <?php } ?> <?php if($_SESSION['net']==$_SESSION['price']){ ?> title='Attention charges are too high' style="border:2px solid #00FF00; background-color:#99FF66;" <?php } ?> <?php if($_SESSION['net']==0){ ?> title='Attention charges are very low' style="border:2px dotted orange; background-color:#FFCCCC;" <?php } ?> name="" maxlength="6" value="<?php echo $_SESSION['net']; ?> Rfw" />
</td></tr>
<tr><td colspan="4"></td></tr><?php if($net>$_SESSION['price']){ echo "<tr><td>&nbsp;</td><td colspan='3' style='color:red; font-size:13px; font-family:Comic Sans MS;'> Attention The total unit charges are very high! </td></tr>";} if($net==$_SESSION['price']){ echo "<tr><td>&nbsp;</td><td colspan='3' style='color:darkgreen; font-size:13px; -moz-text-decoration:blink; font-family:Comic Sans MS;'> Attention The total unit charges are high! </td></tr>"; } if($net==0){ echo "<tr><td>&nbsp;</td><td colspan='3' style='color:#FF3399; font-size:13px; -moz-text-decoration:blink; font-family:Comic Sans MS;'> Attention The total unit charges are very low! </td></tr>"; } ?>

<tr><td colspan="4"></td></tr>
<tr><td><strong style="font-size:16px;">Quantity (Kg):</strong></td><td colspan="3"><input type="text" name="quantity" required maxlength="6" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" /></td></tr>
<tr><td colspan="4">&nbsp;</td></tr>
<tr><td colspan="2" align="right">&nbsp;</td><td><input type="submit" name="part2" value="Register" /></td><td align="left"><input type="reset" name="" value="Reset" /></td></tr>
</table></center>
</form>
</div>
</div>

</body>
</html>
