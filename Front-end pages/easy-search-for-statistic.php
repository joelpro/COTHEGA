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
left:38%;
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
<form action="easy-search-for-statistic.php" method="post">
<table style="font-size:18px; background-color: royalgreen; width:340px;" id="searching">
<tr><td colspan="3" Style="background-color:#666666; border-bottom:2px solid red; color:blue;">
<img src="../Resources/icons/b_tipp.png" width="18px" />Easy search here 
<?php
session_start();
if($_SESSION['position']=='Manager')
{
?>
<a href="manager-welcome.php"  type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" align="right" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Data collection')
{
?>
<a href="registral-welcome.php" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" align="right" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Accountant')
{
?>
<a href="accountant-welcome.php" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" align="right" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Encadeur')
{
?>
<a href="director-welcome.php"  type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" align="right" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
?>

</td></tr>
<tr><td colspan="3" style="padding:5px;"></td></tr>
<tr><td width="45%">Term and year :</td><td width="60px"><select name="term" style="height:31px;"><option>A</option><option>B</option><option>C</option><option>D</option></select></td>
<td colspan="2"><input type="text" name="year" placeholder='Year' style="width:95%;" maxlength="4" required /></td></tr>
<tr><td colspan="3" style="padding:5px;"></td></tr>
<tr><td colspan="3" align="right" Style="background-color:#666666;">
<input type="submit" name="searchbtn" value="Search" />
</td></tr>
</table>
</form>
<?php
if(isset($_POST['searchbtn']))
{
 if(isset($_POST['term']))
 {
  $_SESSION['term']=$_POST['term'];
 }
 if(isset($_POST['year']))
 {
  $_SESSION['year']=$_POST['year'];
 }
 echo"<script>location.href='statistical-report.php';</script>";
}
?>
<!-------------------- Search box ends ---------------------------------------------------->

</div>

</body>
</html>
