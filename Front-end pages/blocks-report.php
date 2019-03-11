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
<p style="font-family:pristina; font-size:26px;">List of block with their site</p>
<table border="0" width="30%">
<?php
include('../Back-end pages/connectify.php');
$sel=mysql_query("select * from site") or die(mysql_error());
while($data=mysql_fetch_array($sel))
{
?>
<tr><td colspan="4"><?php echo $data['name']." site"; ?></td></tr>
<tr id="border" style="font-family:Book Antiqua; font-size:16px; background-color:black; color:white;"><td id="border" colspan="3" width="7%"></td><td id="border">Block name</td></tr>
<?php
$sel1=mysql_query("select * from block where site_id='".$data['site_id']."'") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
?>
<tr id="border" title="double click to uncheck the checked row!" <?php if($data1['block_id']%2!=0){?> bgcolor="#99FFFF" <?php }?> onclick="javascript:document.getElementById('index<?php echo $data1['block_id']; ?>').checked='checked';" ondblclick="javascript:document.getElementById('index<?php echo $data1['block_id']; ?>').checked='';" >
<td id="border" align="center">
<form action="blocks-report.php?sql_query=DELETE+FROM+%60coteg�efcd9d2278f36f234de40&token=f10d1c76cc4efcd9d2278f36" method="post" id="selectForm">
<input type="checkbox" id="index<?php echo $data1['block_id']; ?>" onclick="copyCheckboxesRange('selectForm', 'index<?php echo $data1['block_id']; ?>','l');" name="index<?php echo $data1['block_id']; ?>" value="<?php echo $data1['block_id']; ?>" style="z-index:auto;" />
</td>
<td id="border" align="center"><button name="rename" style="cursor:pointer; background-color:white; <?php if($data1['block_id']%2!=0){?> background-color:#99FFFF; <?php }?>" title="2 clicks to delete" onclick="javascript:document.getElementById('hidden').visibility='visible';"><img src="../Resources/icons/b_usredit.png" /></button></td>
<td id="border" align="center">
<button name="delete" style="cursor:pointer; background-color:white; <?php if($data1['block_id']%2!=0){?> background-color:#99FFFF; <?php }?>" title="2 clicks to delete"><img src="../Resources/icons/b_usrdrop.png" /></button></td>
<td id="border"><?php echo $data1['block_name']; ?></td>
</form>
</tr>
<?php
/*if(isset($_POST['delete']))
{
if(isset($_POST['index'.$data1['ssn']]))         -------------------- Need more negociation ----------------------
{
$del=$_POST['index'.$data1['ssn']];
} 
}
*/
if(isset($_POST['rename']))
{
if(isset($_POST['index'.$data1['block_id']]))
{
$rename=$_POST['index'.$data1['block_id']];
}
}
}
}
/*
if(@$del!='')
{
mysql_query("UPDATE `cotega`.`board` set `status`='Deactivated' WHERE `board`.`ssn` = '$del' LIMIT 1");          -------------------- Need more negociation ----------------------  
$del='';
echo"<script>location.href='workers-report.php';</script>";
}
*/
?>
<tr><td colspan="9" id="border" style="font-family:pristina; font-size:18px; color:#FF0000;" align="center">No more details ...</td>
</tr>
</table>
<?php
if(!empty($rename))
{
?>
<div id='cover'>

</div>
<center>
<table id="editing" width="450px">
<tr><td colspan="3" align="center" style="font-family:pristina; font-size:21px;">Changing block details<img src="../Resources/icons/s_error.png" align="right" onclick="javascript:document.getElementById('cover').style.visibility='hidden'; document.getElementById('editing').style.visibility='hidden';" /></td></tr>
<tr><td colspan="3" align="center" style="font-family:pristina; font-size:21px;"></td></tr>
<?php
$sel1=mysql_query("select * from block where block_id='$rename'") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
?>
<form action="blocks-report.php" method="post">
<tr><td colspan="3"></td></tr>
<tr><td>Block name:<input type="text" name="number" style="visibility:hidden; width:10px;" value="<?php echo $rename; ?>" /></td><td colspan="2"><input type="text" name="first" value="<?php echo $data1['block_name']; ?>" required /></td></tr>
<tr><td>Belong in:</td>
<td colspan="2"><select name="site_id" title="please select site of <?php echo $data1['block_name']; ?> block" required >
<?php
$sel2=mysql_query("select * from site where site_id='".$data1['site_id']."'") or die(mysql_error());
$data2=mysql_fetch_array($sel2);
?>
<option value="<?php echo $data2['site_id']; ?>"><?php echo $data2['name']; ?> </option>
<?php
$sel3=mysql_query("select * from site where site_id!='".$data1['site_id']."'") or die(mysql_error());
while($data3=mysql_fetch_array($sel3))
{
?>
<option value="<?php echo $data3['site_id']; ?>"><?php echo $data3['name']; ?></option>
<?php
}
?>
</select></td></tr>
<tr><td colspan="3" align="center" style="font-family:pristina; font-size:21px;">&nbsp;</td></tr>
<tr style=" background-color:#000000; box-shadow: 0px 0px 3px 3px black;"><td colspan="3" align="right" style="font-family:pristina; font-size:21px;"><input type="submit" name="change" value="Update" /></td></tr>
</form>
</table>
</center>
<?php
}
}
?>
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
echo"<script>location.href='blocks-report.php';</script>";
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
