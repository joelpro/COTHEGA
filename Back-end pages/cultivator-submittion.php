<?php

include('connectify.php');
session_start();

if(isset($_POST['cultivator']))
{
if(isset($_POST['first']))
{
$fname=$_POST['first'];
}
if(isset($_POST['last']))
{
$lname=$_POST['last'];
}
if(isset($_POST['gender']))
{
$gender=$_POST['gender'];
}
if(isset($_POST['nation']))
{
$nation=$_POST['nation'];
}
if(isset($_POST['phone']))
{
$phone=$_POST['phone'];
}
if(isset($_POST['account']))
{
$account=$_POST['account'];
}
if(isset($_POST['place']))
{
$place=$_POST['place'];
}
if(isset($_POST['cell']))
{
$cell=$_POST['cell'];
}
if(isset($_POST['village']))
{
$village=$_POST['village'];
}
if(isset($_POST['block']))
{
$block=$_POST['block'];
}

/////////// -------------------------- Part for Guardian part ---------------////////////////////////

if(isset($_POST['G_first']))
{
$G_fname=$_POST['G_first'];
}
if(isset($_POST['G_last']))
{
$G_lname=$_POST['G_last'];
}
if(isset($_POST['G_gender']))
{
$G_gender=$_POST['G_gender'];
}
if(isset($_POST['G_nation']))
{
$G_nation=$_POST['G_nation'];
}
if(isset($_POST['G_phone']))
{
$G_phone=$_POST['G_phone'];
}
if(isset($_POST['G_place']))
{
$G_place=$_POST['G_place'];
}
if(isset($_POST['G_cell']))
{
$G_cell=$_POST['G_cell'];
}
if(isset($_POST['G_village']))
{
$G_village=$_POST['G_village'];
}

///////////////------------------------------ Guardian part ------------------------------------/////////////////////

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
 $num=code();

$ins1=mysql_query("insert into cultivator values('$num', '$fname', '$lname', '$gender', '$account', '$nation', '$phone', '$place', '$cell', '$village', '$block', 'Available')") or die(mysql_query());
if($ins1==true)
{
$ins2=mysql_query("insert into guardian values('$G_lname', '$G_fname', '$G_gender', '$G_nation', '$G_phone', '$G_cell', '$G_village', '$G_place', $num)") or die(mysql_error());
if($ins2==true)
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr><tr><td><font size='4' weight='bold' color='Red'>Good, cultivator [ ".$fname." ".$lname." ] is now registered</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>OK</button></form></td></tr></table>");
   
	$location = "../Front-end pages/cultivator-registration.php";
	$_SESSION['location'] = $location;
}
}
else
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; top:40%; left:36%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td> <font size='4' color='Red'>not registered, Please try again!</font></td></tr></table>");
}

}
?>