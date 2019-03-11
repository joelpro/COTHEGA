<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>COTHEGA-Rwanda</title>
<link rel="stylesheet" type="text/css" href="../styling.css" />
<style>
button
{
border:none;
background-color:none;;
}
#container
{
overflow:auto;
}
#cover
{
position:absolute;
top:1%;
width:1350px;
height:651px;
background-color:black;
overflow:auto;
opacity:0.5;
}
#editing
{
position:absolute;
top:25%;
left:34%;
box-shadow:0px 0px 1px 1px black;
background-color:#CCCCCC;
}
input[type=text]
{
width:98%;
}
.style1 {
	color: #FF33CC;
	font-family: greff;
}
</style>
</head>

<body>

<div id="container" align="center">
<?php
session_start();
if($_SESSION['position']=='Manager')
{
?>
<a href="manager-welcome.php" style="position:fixed; left: 97.8%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Data collection')
{
?>
<a href="registral-welcome.php" style="position:fixed; left: 97.8%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Accountant')
{
?>
<a href="accountant-welcome.php" style="position:fixed; left: 97.8%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Encadeur')
{
?>
<a href="director-welcome.php" style="position:fixed; left: 97.8%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
?>
<p style="font-family:pristina; font-size:26px;"><u>List of unharvesters in <font color="#0000FF"><?php echo $_SESSION['to_search_for']; ?></font> block <font color="#0000FF"><?php echo $_SESSION['year']." - igihembwe ".$_SESSION['term']; ?></font></u></p>

<a href="easy-search-for-unharvest.php" style="position:absolute; left:77px; text-decoration:blink; color:blue; font-family:pristina; font-size:18px; top: 69px;">
<img src="../Resources/icons/b_search.png" />Search again</a>

<table border="0" width="90%">
<tr id="border" style="font-family:Book Antiqua; font-size:16px; background-color:black; color:white;"><td id="border"></td><td id="border">#</td><td id="border">First name</td><td id="border">Last name</td><td id="border">gender</td><td id="border">Phone contact</td><td id="border">Account number</td></tr>
<?php
include('../Back-end pages/connectify.php');
$sel=mysql_query("select charge_id from charges where (term='".$_SESSION['term']."' and year='".$_SESSION['year']."')") or die(mysql_error());
$data=mysql_fetch_array($sel);
$i=0;
$sel0=mysql_query("select block_id from block where block_name='".$_SESSION['to_search_for']."'") or die(mysql_error());
$data0=mysql_fetch_array($sel0);

$sel1=mysql_query("select distinct cult.number, cult.firstname, cult.lastname, cult.gender, cult.account, cult.phone_number from cultivator as cult where cult.block_id='".$data0['block_id']."' and cult.status='Available'") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
$sel2=mysql_query("select harvest_id from harvesting where cultivator='".$data1['number']."' and charge_id='".$data['charge_id']."'") or die(mysql_error());
$rows=mysql_num_rows($sel2);
if($rows==0)
{
?>
<tr id="border" style="cursor:pointer; background-color:white; <?php if($i%2==0){?> background-color:#99FFFF; <?php }?>" onclick="javascript:document.getElementById('index<?php echo $i; ?>').checked='checked';" ondblclick="javascript:document.getElementById('index<?php echo $i; ?>').checked='';"><td id="border"><form action="accounting-report.php" method="post"><input type="checkbox" onselect="" id="index<?php echo $i; ?>" name="index<?php echo $i; ?>" value="<?php echo $data1['number']; ?>" style="z-index:auto;"/></td><td id="border"><?php echo $data1['number']; ?></td><td id="border"><?php echo $data1['firstname']; ?></td><td id="border"><?php echo $data1['lastname']; ?></td><td id="border"><?php echo $data1['gender']; ?></td><td id="border"><?php echo $data1['phone_number']; ?></td><td id="border"><?php echo $data1['account']; ?></td></form></tr>
<?php
}
$i++;
}
?>
<tr><td colspan="15" id="border" style="font-family:pristina; font-size:18px; color:#FF0000; padding:5px;" align="center"><img src="../Resources/icons/loader.gif" />No more non-harvest cultivators ...</td></tr>
</table>
</div>
</body>
</html>