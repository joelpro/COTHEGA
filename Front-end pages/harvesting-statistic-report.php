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

<div id="container-report" align="center">
<?php
session_start();
if($_SESSION['position']=='Manager')
{
?>
<a href="manager-welcome.php" style="position:fixed; left:96.8%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Data collection')
{
?>
<a href="registral-welcome.php" style="position:fixed; left:96.8%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Accountant')
{
?>
<a href="accountant-welcome.php" style="position:fixed; left:96.8%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Encadeur')
{
?>
<a href="director-welcome.php" style="position:fixed; left:96.8%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
?>
<label style="font-family:pristina; padding-top:15px; font-size:26px;"><u>Harvesting statistics in all blocks of site</u></label>
<table border="0" width="35%">
<?php
include('../Back-end pages/connectify.php');
$sel=mysql_query("select * from site") or die(mysql_error());
while($data=mysql_fetch_array($sel))
{
?>
<tr><td colspan="4"><u><font color="blue" face="pristina" size="+2"><b><?php echo $data['name']." site"; ?></b></font></u></td></tr>
<tr id="border" style="font-family:Book Antiqua; font-size:16px; background-color:black; color:white;"><td id="border">Block name</td><td id="border" width="25%">Abasaruye</td><td id="border" width="25%">Abatarasarura</td><td id="border" width="19%">Ijanisha</td></tr>
<?php
$sel1=mysql_query("select * from block where site_id='".$data['site_id']."'") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
?>
<tr id="border" title="double click to uncheck the checked row!" <?php if($data1['block_id']%2!=0){?> bgcolor="#99FFFF" <?php }?> >
<?php
$sample_found=0;
$all_found=0;
$sel2=mysql_query("select number from cultivator where block_id='".$data1['block_id']."'") or die(mysql_error());
while($data2=mysql_fetch_array($sel2))
{
$sel3=mysql_query("select distinct cultivator from harvesting where cultivator='".$data2['number']."'") or die(mysql_error());
while($data3=mysql_fetch_array($sel3))
{
 $sample_found++;
}
$all_found++;
}
?>
<td id="border"><?php echo $data1['block_name']; ?></td><td id="border" align="right"><?php echo $sample_found; ?></td><td id="border" align="right"><?php echo $all_found-$sample_found; ?></td><td id="border" align="right"><?php if($all_found!=0){ echo round(($sample_found*100)/$all_found, 1)." %"; } else echo "0 %"; ?></td>
</tr>
<?php
}
}
?>
<tr><td colspan="9" id="border" style="font-family:pristina; font-size:18px; color:#FF0000;" align="center">No more details ...</td>
</tr>
</table>
</div>

<?php
if(isset($_POST['change']))
{
if(isset($_POST['first']))
{
$first=$_POST['first'];
}
if(isset($_POST['site_id']))
{
$site_id=$_POST['site_id'];
}
if(isset($_POST['number']))
{
$number=$_POST['number'];
}
$update1=mysql_query("update block set block_name='$first', site_id='$site_id' where block_id='$number'") or die(mysql_error());
if($update1==true)
{
echo"<script>location.href='sites-report.php';</script>";
}
}
?>
<form action="blocks-report.php" method="post">
<a href="#" target="_blank">
<input type="submit" name="print" value="print" style="position:fixed; right:10px; bottom:11px;" /></a>
</form>
<?php
if(isset($_POST['print']))
{
?>
<script type="text/javascript">
//<![CDATA[
// Do print the page
window.onload = function()
{
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
//]]>
</script>
<?php
}
?>
</body>
</html>
