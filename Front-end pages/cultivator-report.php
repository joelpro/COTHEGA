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
.editing
{
position:absolute;
top:15%;
left:34%;
box-shadow:0px 0px 1px 1px black;
background-color:#CCCCCC;
visibility:hidden;
}
input[type=text]
{
width:98%;
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

<p style="font-family:pristina; font-size:26px;"><u>List of cultivator in <font color="blue"><?php echo $_SESSION['to_search_for']." ".$_SESSION['title']; ?></font></u></p>

<a href="easy-search-for-cultivator.php" style="position:absolute; left:77px; text-decoration:blink; color:blue; font-family:pristina; font-size:18px; top: 69px;">
<img src="../Resources/icons/b_search.png" />Search again</a>

<table border="0" width="98%">
<tr id="border" style="font-family:Book Antiqua; font-size:16px; background-color:black; color:white;">
<?php if($_SESSION['position']=='Data collection' || $_SESSION['position']=='Encadeur'){ ?><td id="border" colspan="3" width="7%"></td><?php } ?><td id="border">#</td><td id="border">First name</td><td id="border">Last name</td><td id="border">Gender</td><td id="border">Phone number</td><td id="border">National id</td><td id="border">Account number</td><td id="border" colspan="2">Guardian</td><?php if($_SESSION['title']=="site"){?><td id="border">Block name</td><?php } ?><td id="border">Village</td><td id="border">Cell</td><td id="border">Sector</td><td id="border">District</td>
</tr>

<?php
include('../Back-end pages/connectify.php');
$num=1;
if($_SESSION['title']=='block')
{
$sel1=mysql_query("select block_id from block where block_name='".$_SESSION['to_search_for']."'") or die(mysql_error());
$data1=mysql_fetch_array($sel1);
$sel2=mysql_query("select * from cultivator where block_id='".$data1['block_id']."' and status='Available' order by number asc") or die(mysql_error());
while($data2=mysql_fetch_array($sel2))
{
$sel3=mysql_query("select name, dist_id from sector where sec_id='".$data2['sec_id']."'") or die(mysql_error());
$data3=mysql_fetch_array($sel3);
$sel4=mysql_query("select name from district where dist_id='".$data3['dist_id']."'") or die(mysql_error());
$data4=mysql_fetch_array($sel4);
$sel5=mysql_query("select lastname, firstname from guardian where number='".$data2['number']."'") or die(mysql_error());
$data5=mysql_fetch_array($sel5);
?>

<tr id="border" title="double click to uncheck the checked row!" <?php if($num%2!=0){?> bgcolor="#99FFFF" <?php }?> onclick="javascript:document.getElementById('index<?php echo $num; ?>').checked='checked';" ondblclick="javascript:document.getElementById('index<?php echo $num; ?>').checked='';" >
<?php if($_SESSION['position']=='Data collection' || $_SESSION['position']=='Encadeur')
{ 
?>
<td id="border" align="center">
<form action="cultivator-report.php?sql_query=DELETE+FROM+%60coteg…efcd9d2278f36f234de40&token=f10d1c76cc4efcd9d2278f36" method="post" id="selectForm">
<input type="checkbox" id="index<?php echo $num; ?>" onclick="copyCheckboxesRange('selectForm', 'index<?php echo $num; ?>','l');" name="index<?php echo $num; ?>" value="<?php echo $data2['number']; ?>" style="z-index:auto;" />
</td>
<td id="border" align="center"><button name="rename" style="cursor:pointer; background-color:white; <?php if($num%2!=0){?> background-color:#99FFFF; <?php }?>" title="2 clicks to delete" onclick="javascript:document.getElementById('hidden').visibility='visible';"><img src="../Resources/icons/b_usredit.png" /></button></td>
<td id="border" align="center">
<button name="delete" style="cursor:pointer; background-color:white; <?php if($num%2!=0){?> background-color:#99FFFF; <?php }?>" title="2 clicks to delete"><img src="../Resources/icons/b_usrdrop.png" /></button></td>
<?php } ?>
<td id="border"><?php echo $data2['number']; ?></td>
<td id="border"><?php echo $data2['firstname']; ?></td>
<td id="border"><?php echo $data2['lastname']; ?></td>
<td id="border"><?php echo $data2['gender']; ?></td>
<td id="border"><?php echo $data2['phone_number']; ?></td>
<td id="border"><?php echo $data2['identity']; ?></td>
<td id="border"><?php echo $data2['account']; ?></td>
<td id="border"><?php echo $data5['firstname']?></td><td><?php echo $data5['lastname']; ?></td>
<td id="border"><?php echo $data2['village']; ?></td>
<td id="border"><?php echo $data2['cell']; ?></td>
<td id="border"><?php echo $data3['name']; ?></td>
<td id="border"><?php echo $data4['name']; ?></td>
</form>
</tr>

<?php
if(isset($_POST['delete']))
{
if(isset($_POST['index'.$num]))
{
$del=$_POST['index'.$num];
} 
}
if(isset($_POST['rename']))
{
if(isset($_POST['index'.$num]))
{
$rename=$_POST['index'.$num];
}
}
if(@$del!='')
{
mysql_query("UPDATE `cotega`.`cultivator` set `status`='Unavailable' WHERE `cultivator`.`number` = '$del' LIMIT 1");
$del='';
echo"<script>location.href='cultivator-report.php';</script>";
}
$num++;
}
}
?>

<?php
if($_SESSION['title']=='site')
{

$sel=mysql_query("select site_id from site where name='".$_SESSION['to_search_for']."'") or die(mysql_error());
$data=mysql_fetch_array($sel);
$sel1=mysql_query("select block_id, block_name from block where site_id='".$data['site_id']."'") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
$sel2=mysql_query("select * from cultivator where block_id='".$data1['block_id']."' and status='Available' order by number asc") or die(mysql_error());
while($data2=mysql_fetch_array($sel2))
{
$sel3=mysql_query("select name, dist_id from sector where sec_id='".$data2['sec_id']."'") or die(mysql_error());
$data3=mysql_fetch_array($sel3);
$sel4=mysql_query("select name from district where dist_id='".$data3['dist_id']."'") or die(mysql_error());
$data4=mysql_fetch_array($sel4);
$sel5=mysql_query("select lastname, firstname from guardian where number='".$data2['number']."'") or die(mysql_error());
$data5=mysql_fetch_array($sel5);
?>

<tr id="border" title="double click to uncheck the checked row!" <?php if($num%2!=0){?> bgcolor="#99FFFF" <?php }?> onclick="javascript:document.getElementById('index<?php echo $num; ?>').checked='checked';" ondblclick="javascript:document.getElementById('index<?php echo $num; ?>').checked='';" >
<?php if($_SESSION['position']=='Data collection' || $_SESSION['position']=='Encadeur'){ ?>
<td id="border" align="center">
<form action="cultivator-report.php?sql_query=DELETE+FROM+%60coteg…efcd9d2278f36f234de40&token=f10d1c76cc4efcd9d2278f36" method="post" id="selectForm">
<input type="checkbox" id="index<?php echo $num; ?>" onclick="copyCheckboxesRange('selectForm', 'index<?php echo $num; ?>','l');" name="index<?php echo $num; ?>" value="<?php echo $data2['number']; ?>" style="z-index:auto;" />
</td>
<td id="border" align="center"><button name="rename" style="cursor:pointer; background-color:white; <?php if($num%2!=0){?> background-color:#99FFFF; <?php }?>" title="2 clicks to delete" onclick="javascript:document.getElementById('hidden').visibility='visible';"><img src="../Resources/icons/b_usredit.png" /></button></td>
<td id="border" align="center">
<button name="delete" style="cursor:pointer; background-color:white; <?php if($num%2!=0){?> background-color:#99FFFF; <?php }?>" title="2 clicks to delete"><img src="../Resources/icons/b_usrdrop.png" /></button></td>
<?php }?>
<td id="border"><?php echo $data2['number']; ?></td>
<td id="border"><?php echo $data2['firstname']; ?></td>
<td id="border"><?php echo $data2['lastname']; ?></td>
<td id="border"><?php echo $data2['gender']; ?></td>
<td id="border"><?php echo $data2['phone_number']; ?></td>
<td id="border"><?php echo $data2['identity']; ?></td>
<td id="border"><?php echo $data2['account']; ?></td>
<td id="border"><?php echo $data5['firstname']?></td><td><?php echo $data5['lastname']; ?></td>
<td id="border"><?php echo $data1['block_name']; ?></td>
<td id="border"><?php echo $data2['village']; ?></td>
<td id="border"><?php echo $data2['cell']; ?></td>
<td id="border"><?php echo $data3['name']; ?></td>
<td id="border"><?php echo $data4['name']; ?></td>
</form>
</tr>

<?php
if(isset($_POST['delete']))
{
if(isset($_POST['index'.$num]))
{
$del=$_POST['index'.$num];
} 
}
if(isset($_POST['rename']))
{
if(isset($_POST['index'.$num]))
{
$rename=$_POST['index'.$num];
}
}
$num++;
}
if(@$del!='')
{
mysql_query("UPDATE `cotega`.`cultivator` set `status`='Unavailable' WHERE `cultivator`.`number` = '$del' LIMIT 1");
$del='';
echo"<script>location.href='cultivator-report.php';</script>";
}
}
}
?>
<tr><td colspan="17" id="border" style="font-family:pristina; font-size:18px; color:#FF0000; padding:3px;" align="center"><img src="../Resources/icons/loader.gif" />No more cultivator details ...</td></tr>
</table
></div>

<?php
if(!empty($rename))
{
?>
<div id="cover">

</div>
<center>

<table align='center' id="confirm" border='0' style='position:absolute; background-color: white; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px black; top:35%; left:30%; width:550px;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png'  style='border-radius:70% 70% 70% 70%;'/></td></tr><tr><td><font size='4' weight='bold' color='Red'>Do you want to change cultivator details or guardian?</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'>
<button type="submit" style='font-size:20px; cursor:pointer; border:1px solid black; width:100px; opacity:0.8; margin-top:2px;' name='owner' onclick="javascript:document.getElementById('confirm').style.visibility='hidden';document.getElementById('editing1').style.visibility='visible';">Cultivator</button> 
&nbsp; 
<button style='font-size:20px; opacity:0.8; width:100px; cursor:pointer; border:1px solid black; margin-top:2px;' name='guardian' onclick="javascript:document.getElementById('confirm').style.visibility='hidden';document.getElementById('editing2').style.visibility='visible';">Guardian</button></td></tr></table>




<table id="editing1" class="editing" width="450px">
<tr><td colspan="3" align="center" style="font-family:pristina; font-size:21px;"><u><font color="blue">Change cultivator details</font></u><img src="../Resources/icons/s_error.png" align="right" onclick="javascript:document.getElementById('cover').style.visibility='hidden'; document.getElementById('editing1').style.visibility='hidden';" /></td></tr>
<tr><td colspan="3" align="center" style="font-family:pristina; font-size:21px;"></td></tr>
<?php
$sel1=mysql_query("select * from cultivator where number='$rename'") or die(mysql_error());
$data1=mysql_fetch_array($sel1);
?>
<form action="cultivator-report.php" method="post">
<tr><td colspan="3"></td></tr>
<tr><td>First name:<input type="text" name="number" style="visibility:hidden; width:0px;" value="<?php echo $rename; ?>" /></td><td colspan="2"><input type="text" name="first" value="<?php echo $data1['firstname']; ?>" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>Last name:</td><td colspan="2"><input type="text" name="last" value="<?php echo $data1['lastname']; ?>" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>Gender:</td><td><input type="radio" name="gender" value="M" required />Male </td><td> <input type="radio" name="gender" value="F" required />Female</td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>Phone number:</td><td colspan="2"><input type="text" name="phone" value="<?php echo $data1['phone_number']; ?>" maxlength="10" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>National ID:</td><td colspan="2"><input type="text" name="identity" value="<?php echo $data1['identity']; ?>" maxlength="16" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>Account number:</td><td colspan="2"><input type="text" name="account" value="<?php echo $data1['account']; ?>" maxlength="" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>village:</td><td colspan="2"><input type="text" name="village" value="<?php echo $data1['village']; ?>" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>Cell:</td><td colspan="2"><input type="text" name="cell" value="<?php echo $data1['cell']; ?>" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>living place:</td><td colspan="2"><select name="place" required><option value="">-------- select a district - sector --------</option>
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
</select></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td width="32%">Cultivate in [block]:</td><td colspan="2"><select name="block" required><option value="">-------------- select a block --------------</option>
<?php
$sel2=mysql_query("select block_id, block_name from block") or die(mysql_error());
while($data2=mysql_fetch_array($sel2))
{
?>
<option value="<?php echo $data2['block_id']; ?>"><?php echo $data2['block_name']." block"; ?></option>
<?php
}
?>
</select></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td colspan="3" style="background-color:green; text-align:right;"><input type="submit" name="change" value="Update" /></td></tr>
</form>
</table>

<?php
}
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
if(isset($_POST['account']))
{
$account=$_POST['account'];
}
if(isset($_POST['gender']))
{
$gender=$_POST['gender'];
}
if(isset($_POST['phone']))
{
$phone=$_POST['phone'];
}
if(isset($_POST['identity']))
{
$identity=$_POST['identity'];
}
if(isset($_POST['village']))
{
$village=$_POST['village'];
}
if(isset($_POST['cell']))
{
$cell=$_POST['cell'];
}
if(isset($_POST['place']))
{
$place=$_POST['place'];
}
if(isset($_POST['block']))
{
$block=$_POST['block'];
}
$update1=mysql_query("update cultivator set	firstname='$first',	lastname='$last', gender='$gender',	account='$account', identity='$identity', phone_number='$phone', sec_id='$place', cell='$cell', village='$village', block_id='$block' where number='$number'") or die(mysql_error());
if($update1==true)
{
echo"<script>location.href='cultivator-report.php';</script>";
}
}

///////////////////////-------------------------Part for updating guardian info............. -----------------------------////////////////////////////////
?>

<!-------------------------- Guardian updating detail fields ------------------------------------------->

<table id="editing2" class="editing" width="450px">
<tr><td colspan="3" align="center" style="font-family:pristina; font-size:21px;"><u><font color="blue">Change guardian details</font></u><img src="../Resources/icons/s_error.png" align="right" onclick="javascript:document.getElementById('cover').style.visibility='hidden'; document.getElementById('editing2').style.visibility='hidden';" /></td></tr>
<tr><td colspan="3" align="center" style="font-family:pristina; font-size:21px;"></td></tr>
<?php
@$sel1=mysql_query("select * from guardian where number='$rename'") or die(mysql_error());
$data1=mysql_fetch_array($sel1);
?>
<form action="cultivator-report.php" method="post">
<tr><td colspan="3"></td></tr>
<tr><td>First name:<input type="text" name="G_number" style="visibility:hidden; width:0px;" value="<?php echo $rename; ?>" /></td><td colspan="2"><input type="text" name="G_first" value="<?php echo $data1['firstname']; ?>" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>Last name:</td><td colspan="2"><input type="text" name="G_last" value="<?php echo $data1['lastname']; ?>" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>Gender:</td><td><input type="radio" name="G_gender" value="M" required />Male </td><td> <input type="radio" name="G_gender" value="F" required />Female</td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>Phone number:</td><td colspan="2"><input type="text" name="G_phone" value="<?php echo $data1['telephone']; ?>" maxlength="10" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>National ID:</td><td colspan="2"><input type="text" name="G_identity" value="<?php echo $data1['national_id']; ?>" maxlength="16" onKeypress="if (event.keyCode < 43 || event.keyCode > 57) event.returnValue = false;" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>village:</td><td colspan="2"><input type="text" name="G_village" value="<?php echo $data1['village']; ?>" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>Cell:</td><td colspan="2"><input type="text" name="G_cell" value="<?php echo $data1['cell']; ?>" required /></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td>living place:</td><td colspan="2"><select name="G_place" required><option value="">-------- select a district - sector --------</option>
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
</select></td></tr>
<tr><td colspan="3"></td></tr>
<tr><td colspan="3" style="background-color:green; text-align:right;"><input type="submit" name="guardian" value="Update1" /></td></tr>
</form>
</table>
<?php

if(isset($_REQUEST['guardian']))
{
if(isset($_POST['G_first']))
{
$G_first=$_POST['G_first'];
}
if(isset($_POST['G_number']))
{
$G_number=$_POST['G_number'];
}
if(isset($_POST['G_last']))
{
$G_last=$_POST['G_last'];
}
if(isset($_POST['G_gender']))
{
$G_gender=$_POST['G_gender'];
}
if(isset($_POST['G_phone']))
{
$G_phone=$_POST['G_phone'];
}
if(isset($_POST['G_identity']))
{
$G_identity=$_POST['G_identity'];
}
if(isset($_POST['G_village']))
{
$G_village=$_POST['G_village'];
}
if(isset($_POST['G_cell']))
{
$G_cell=$_POST['G_cell'];
}
if(isset($_POST['G_place']))
{
$G_place=$_POST['G_place'];
}

$update1=mysql_query("update guardian set lastname='$G_last', firstname='$G_first', gender='$G_gender', national_id='$G_identity', telephone='$G_phone', sec_id='$G_place', cell='$G_cell', village='$G_village' where number='$G_number'") or die(mysql_error());
if($update1==true && mysql_num_rows($update1)==1)
{
 echo"<script>location.href='cultivator-report.php';</script>";
}
else
{
 $ins1=mysql_query("INSERT INTO guardian VALUES('$G_last', '$G_first', '$G_gender', '$G_identity', '$G_phone', '$G_place', '$G_cell', '$G_village', '$G_number')") or die("fails");
 if($ins1==true)
 {
  echo"<script>location.href='cultivator-report.php';</script>";
 }
}
}
?>

<!-------------------------- Guardian updating detail fields ------------------------------------------->

</body>
</html>