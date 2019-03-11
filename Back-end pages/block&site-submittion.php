<?php
include('connectify.php');
session_start();

if(isset($_POST['registered']))
{
if(isset($_POST['name']))
{
$name=$_POST['name'];
}
if(isset($_POST['choose']))
{
$choice=$_POST['choose'];
}

if($choice=='Site')
{
$sel1=mysql_query("select site_id from site where name='$name'") or die(mysql_error());
$count1=mysql_num_rows($sel1);
if($count1<1)
{
$ins1=mysql_query("insert into site values(null, '$name')") or die(mysql_error());
if($ins1==true)
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr><tr><td><font size='4' weight='bold' color='Red'>Good, New site [ ".$name." ] is registered</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>OK</button></form></td></tr></table>");
   
	$location = "../Front-end pages/block,site-registration.php";
	$_SESSION['location'] = $location;
}
}
else
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;' colspan='2'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr>
<tr><td colspan='2'><font size='4' weight='bold' color='Red'>Already site <font color='blue'>".$name."</font> is registered.<br>Do you prefer to change?</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='change'>Yes</button></form></td><td style='background-color:dimgray; width:100px; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>No</button></form></td></tr></table>");
    
	$location = "../Front-end pages/block,site-registration.php";
	$_SESSION['location'] = $location;
}
}
else
{
if(isset($_POST['belong']))
{
$belong=$_POST['belong'];
}
$sel2=mysql_query("select block_id from block where block_name='$name' and site_id='$belong'") or die(mysql_error());
$count2=mysql_num_rows($sel2);
if($count2<1)
{
$ins2=mysql_query("insert into block values(null, '$name', '$belong')") or die(mysql_error());
if($ins2==true)
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr><tr><td><font size='4' weight='bold' color='Red'>Good, New block [ ".$name." ] is registered</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>OK</button></form></td></tr></table>");
   
	$location = "../Front-end pages/block,site-registration.php";
	$_SESSION['location'] = $location;
}
}
else
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;' colspan='2'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr>
<tr><td colspan='2'><font size='4' weight='bold' color='Red'>Already block <font color='blue'>".$name."</font> is registered.<br>Do you prefer to change?</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='change'>Yes</button></form></td><td style='background-color:dimgray; width:100px; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>No</button></form></td></tr></table>");
    
	$location = "../Front-end pages/block,site-registration.php";
	$_SESSION['location'] = $location;
}
}
}

?>