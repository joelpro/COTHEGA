<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>COTHEGA-Rwanda</title>
<link rel="stylesheet" type="text/css" href="../styling.css" />
</head>

<body>

<div id="container-report" align="center">
<p style="font-family:pristina; font-size:26px;" >List of the harvestor and their harvest</p>
<table border="0" style="margin-left:-100px;" width="90%">
<tr id="border"><td id="border">number</td><td id="border">First name</td><td id="border">Last name</td><td id="border">Gender</td><td id="border">Account number</td><td id="border">Phone contact</td><td id="border">ID number</td><td id="border">cell</td><td id="border">village</td><td id="border">sector</td><td id="border">District</td></tr>
<?php
include('../Back-end pages/connectify.php');
$sel1=mysql_query("select number, firstname, lastname, account, gender, identity, phone_number, sec_id, cell, village from cultivator where status='Available'") or die(mysql_error());
$i=0;
while($data1=mysql_fetch_array($sel1))
{
$sel2=mysql_query("select * from sector where sec_id='".$data1['sec_id']."'") or die(mysql_query());
$data2=mysql_fetch_array($sel2);

$sel3=mysql_query("select * from district where dist_id='".$data2['dist_id']."'") or die(mysql_query());
$data3=mysql_fetch_array($sel3);
?>
<tr><td id="border" style="padding:2px;"><?php echo $data1['number']; ?></td><td id="border"><?php echo $data1['firstname']; ?></td><td id="border"><?php echo $data1['lastname']; ?></td><td id="border"><?php echo $data1['gender']; ?></td><td id="border"><?php echo $data1['account']; ?></td><td id="border"><?php echo $data1['phone_number']; ?></td><td id="border"><?php echo $data1['identity']; ?></td><td id="border"><?php echo $data1['cell']; ?></td><td id="border"><?php echo $data1['village']; ?></td><td id="border"><?php echo $data2['name']; ?></td><td id="border"><?php echo $data1['village']; ?></td></tr>
<?php
$i=$i+1;
}
?>
<tr><td colspan="6"><input type="submit" name="pay" value="Pay checked" /></form></td></tr>
<?php
if(isset($_POST['pay']))
{
if(isset($_POST['index1']))
{
echo $_POST['index1'];
}
echo @$_POST['index0'];
}
?>
</table>
</div>

</body>
</html>
