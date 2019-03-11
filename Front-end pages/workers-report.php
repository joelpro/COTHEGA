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
a
{
 color: blue;
 text-decoration: none;
}
p
{
 line-height: 0.1;
 margin-left: 70px;
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
?>

<span style="font-family:pristina; font-size:26px;"><u>List of system workers</u></span><br />
<form action="#" method="get">
<p style='text-align:left;'><b>User Management: </b><a href="?act=1">Activated users List</a> | <a href="?act=2" id="deactive">Deactivated users List</a> | <a href="?act=3" id="drop">Deleted users List</a><br /></p></form>
<?php 
 if(isset($_GET['act']))
 {
  if($_GET['act'] == 1)
  $_SESSION['wanted_data']='Activated';
  else if($_GET['act'] == 2)
  $_SESSION['wanted_data']='Deactivated';
  else
  $_SESSION['wanted_data']='Deleted';
 }
?>
<table border="0" width="90%">
<tr id="border" style="font-family:Book Antiqua; font-size:16px; background-color:black; color:white;">
<td id="border" <?php if(@$_SESSION['wanted_data']!='Deleted'){ ?>colspan="3"<?php } else{?>colspan="2"<?php }?> width="7%"></td><td id="border">First name</td><td id="border">Last name</td><td id="border">Birth date</td><td id="border">Gender</td><td id="border">Contact number</td><td id="border" align="center">Pin</td><td id="border">Position</td></tr>
<?php
include('../Back-end pages/connectify.php');
@$sel1=mysql_query("select ssn, firstname, lastname, gender, telephone, DOB, position, pin, status from board where status='".$_SESSION['wanted_data']."'") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
?>
<tr id="border" title="double click to uncheck the checked row!" <?php if($data1['ssn']%2!=0){?> bgcolor="#99FFFF" <?php }?> onclick="javascript:document.getElementById('index<?php echo $data1['ssn']; ?>').checked='checked';" ondblclick="javascript:document.getElementById('index<?php echo $data1['ssn']; ?>').checked='';" >
<td id="border" align="center">
<form action="workers-report.php?sql_query=DELETE+FROM+%60coteg…efcd9d2278f36f234de40&token=f10d1c76cc4efcd9d2278f36" method="post" id="selectForm">
<input type="checkbox" id="index<?php echo $data1['ssn']; ?>" onclick="copyCheckboxesRange('selectForm', 'index<?php echo $data1['ssn']; ?>','l');" name="index<?php echo $data1['ssn']; ?>" value="<?php echo $data1['ssn']; ?>" style="z-index:auto;" />
</td>
<td id="border" align="center"><button name="rename" style="cursor:pointer; background-color:white; <?php if($data1['ssn']%2!=0){?> background-color:#99FFFF; <?php }?>" title="2 clicks to delete" onclick="javascript:document.getElementById('hidden').visibility='visible';"><img src="../Resources/icons/b_usredit.png" /></button></td>
<?php if($data1['status']!='Deleted'){ ?><td id="border" align="center">
<button name="delete" style="cursor:pointer; background-color:white; <?php if($data1['ssn']%2!=0){?> background-color:#99FFFF; <?php }?>" title="2 clicks to delete"><img src="../Resources/icons/b_usrdrop.png" /></button></td><?php } ?>
<td id="border"><?php echo $data1['firstname']; ?></td>
<td id="border"><?php echo $data1['lastname']; ?></td>
<td id="border"><?php echo $data1['DOB']; ?></td>
<td id="border"><?php echo $data1['gender']; ?></td>
<td id="border"><?php echo $data1['telephone']; ?></td>
<td id="border" align="center"><?php echo $data1['pin']; ?></td>
<td id="border"><?php echo $data1['position']; ?></td>
</form>
</tr>
<?php
if(isset($_POST['delete']))
{
if(isset($_POST['index'.$data1['ssn']]))
{
$del=$_POST['index'.$data1['ssn']];
} 
}
if(isset($_POST['rename']))
{
if(isset($_POST['index'.$data1['ssn']]))
{
$rename=$_POST['index'.$data1['ssn']];
}
}
}
if(@$del!='')
{
 function code($length = 4)
 {
  $validCharacters = "0123456789";
  $validCharNumber = strlen($validCharacters);
 
  $result = "";
 
  for ($i = 0; $i < $length; $i++)
  {
   $index = mt_rand(0, $validCharNumber - 1);
   $result .= $validCharacters[$index];
  }
 
  return $result;
 }
$changes=mysql_query("UPDATE `cotega`.`board` set `status`='Deleted', `pin`='".code()."' WHERE `board`.`ssn` = '$del' LIMIT 1");
if($changes == true)
{
 mysql_query("DELETE FROM silent WHERE ssn='$del' LIMIT 1");
 $del='';
 echo"<script>location.href='workers-report.php';</script>";
}
else
{
 echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center; background: white;'><img src='../Resources/icons/notification.png' width='65px'/></td></tr><tr><td background: white;><font size='4' weight='bold' color='Red'>Deletion fail, Try once again!</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='#' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>OK</button></form></td></tr></table>");

if(isset($_POST['back']))
echo"<script>location.href='workers-report.php';</script>";
}
}
?>
<tr><td colspan="10" id="border" style="font-family:pristina; font-size:18px; color:#FF0000;" align="center">No more worker details ...</td></tr>
</table>
<?php
if(!empty($rename))
{
?>
<div id='cover'>

</div>
<center>
<table id="editing" width="450px">
<tr><td colspan="3" align="center" style="font-family:pristina; font-size:21px;">Change this details<img src="../Resources/icons/s_error.png" align="right" onclick="javascript:document.getElementById('cover').style.visibility='hidden'; document.getElementById('editing').style.visibility='hidden';" /></td></tr>
<tr><td colspan="3" align="center" style="font-family:pristina; font-size:21px;"></td></tr>
<?php
$sel1=mysql_query("select ssn, firstname, lastname, gender, telephone, DOB, position from board where ssn='$rename'") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
?>
<form action="workers-report.php" method="post">
<tr><td colspan="3"></td></tr>
<tr><td>First name:<input type="text" name="number" style="visibility:hidden; width:0px;" value="<?php echo $rename; ?>" /></td><td colspan="2"><input type="text" name="first" value="<?php echo $data1['firstname']; ?>" required /></td></tr>
<tr><td>Last name:</td><td colspan="2"><input type="text" name="last" value="<?php echo $data1['lastname']; ?>" required /></td></tr>
<tr><td>Birth date:</td><td colspan="2"><input type="text" name="date" value="<?php echo $data1['DOB']; ?>" required /></td></tr>
<tr><td>Gender:</td><td><input type="radio" name="gender" value="M" required />Male</td><td><input type="radio" name="gender" value="F" required />Female</td></tr>
<tr><td>Phone number:</td><td colspan="2"><input type="text" name="phone" value="<?php echo $data1['telephone']; ?>" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" required /></td></tr>
<tr><td>Position:</td><td colspan="2"><select name="position" required ><option>Manager</option><option>Data collection</option><option value="Encadeur">Peuser</option><option>Accountant</option></select></td></tr>
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
if(isset($_POST['number']))
{
$number=$_POST['number'];
}
if(isset($_POST['last']))
{
$last=$_POST['last'];
}
if(isset($_POST['date']))
{
$date=$_POST['date'];
}
if(isset($_POST['gender']))
{
$gender=$_POST['gender'];
}
if(isset($_POST['phone']))
{
$phone=$_POST['phone'];
}
if(isset($_POST['position']))
{
$position=$_POST['position'];
}
$update1=mysql_query("update board set firstname='$first', lastname='$last', gender='$gender', telephone='$phone', DOB='$date', position='$position' where ssn='$number'");
if($update1==true)
{
echo"<script>location.href='workers-report.php';</script>";
}
}
?>

</body>
</html>
