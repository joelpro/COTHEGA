<?php
include('connectify.php');
session_start();

if(isset($_POST['part2']))
{
if(isset($_POST['cult']))
{
$cult=$_POST['cult'];
}
if(isset($_POST['quantity']))
{
$quantity=$_POST['quantity'];
}
///////////// ----------------------------------- Attention: calculations ---------------------------------------------- ////////////////
$tax=($_SESSION['net']*$quantity);
$musa=$_SESSION['musa']*$quantity;
$home=($_SESSION['price']*$quantity)-$tax;
///////////// ----------------------------------- Attention: calculations ends ----------------------------------------- ////////////////

$ins1=mysql_query("insert into harvesting(harvest_id, quantity, charge_id, take_home, musa, cultivator, Date, Month) values(null,'$quantity','".$_SESSION['charge']."','$home','$musa','$cult','".$_SESSION['day']."','".$_SESSION['month']."')") or die("Fail to submit");
if($ins1==true)
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr><tr><td><font size='4' weight='bold' color='Red'>Good, now registered<br>Net Charges is ".$tax." and take home is ".$home."</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>OK</button></form></td></tr></table>");
   
	$location = "../Front-end pages/harvestation-registration-part2.php";
	$_SESSION['location'] = $location;
}
else
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; top:40%; left:36%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td> <font size='4' color='Red'>not registered, Please try again!</font></td></tr></table>");
}
}

?>