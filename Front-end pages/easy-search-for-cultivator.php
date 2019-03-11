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
visibility:;
opacity:0.73;
}
#searching
{
position:absolute;
top:35%;
left:37%;
visibility:;
box-shadow:0px 0px 1px 1px black;
background-color:#CCCCCC;
}
input[type=text]
{
width:98%;
}
</style>
</head>

<body>

<div id="container" align="center">

<!---------------------- Search box here -------------------------------------------------->
<div id='cover'>

</div>
<form action="easy-search-for-cultivator.php" method="post">
<table style="font-size:18px; background-color: royalgreen; width:320px;" id="searching">
<tr><td colspan="3" Style="background-color:#666666; border-bottom:2px solid red; color:blue;">
<img src="../Resources/icons/b_tipp.png" width="18px" />Easy search here 
<?php
session_start();
if($_SESSION['position']=='Manager')
{
?>
<a href="manager-welcome.php" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' align="right" style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Data collection')
{
?>
<a href="registral-welcome.php" type="submit" name="closebtn" title="&laquo; close & back"><img align="right" src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Accountant')
{
?>
<a href="accountant-welcome.php" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn" align="right" /></a>
<?php
}
else if($_SESSION['position']=='Encadeur')
{
?>
<a href="director-welcome.php" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' align="right" style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
?>

</td></tr>
<tr><td>Seach Cultivators by :</td><td> <input type="radio" name='search' value="Site" onclick="javascript:document.getElementById('1').style.visibility='visible'; document.getElementById('2').style.visibility='hidden';" required/>Site </td>
<td> <input type="radio" name='search' value="Block" onclick="javascript:document.getElementById('1').style.visibility='hidden'; document.getElementById('2').style.visibility='visible';" required/>Block </td></tr>
<tr><td colspan="3"><select name="to_search_for1" id="1" style="visibility:hidden; position:absolute; left:0px;">
<option value="">---------------- Select a site ----------------</option>
<?php
include('../Back-end pages/connectify.php');
$sel=mysql_query("select * from site") or die(mysql_error());
while($data1=mysql_fetch_array($sel))
{
?>
<option><?php echo $data1['name']; ?></option>
<?php
}

?>
</select><select name="to_search_for2" id="2"  style="visibility:hidden; position:absolute; left:0px;">
<option value="">--------------- select a block ----------------</option>
<?php
$sel1=mysql_query("select * from site group by name order by name") or die(mysql_error());
while($data1=mysql_fetch_array($sel1))
{
$sel2=mysql_query("select * from block where site_id='".$data1['site_id']."' group by block_name order by block_name") or die(mysql_error());
while($data2=mysql_fetch_array($sel2))
{
?>
<option value="<?php echo $data2['block_name']; ?>"><?php echo $data1['name']." - ".$data2['block_name']; ?></option> 
<?php
}
}
?>
</select></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="right" Style="background-color:#666666;">
<input type="submit" name="searchbtn" value="Search" style="height:32px;" />
</td></tr>
</table>
</form>
<?php
if(isset($_POST['searchbtn']))
{
 if(isset($_POST['to_search_for1']))
 {
  $data1=$_POST['to_search_for1'];
 }
 if(isset($_POST['to_search_for2']))
 {
  $data2=$_POST['to_search_for2'];
 }
 
 if(!empty($data1))
 {
  $_SESSION['title']="site";
  $_SESSION['to_search_for']=$data1;
 }
 else
 {
  $_SESSION['title']="block";
  $_SESSION['to_search_for']=$data2;
 }
 echo"<script>location.href='cultivator-report.php';</script>";
}
?>
<!-------------------- Search box ends ---------------------------------------------------->

</div>

</body>
</html>
