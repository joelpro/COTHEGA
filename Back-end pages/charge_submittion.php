<?php
include('connectify.php');
session_start();
if(isset($_POST['register']))
{
if(isset($_POST['fert']))
{
$fert=$_POST['fert'];
$_SESSION['fert']=$fert;
}
if(isset($_POST['fed']))
{
$fed=$_POST['fed'];
$_SESSION['fed']=$fed;
}
if(isset($_POST['trans']))
{
$trans=$_POST['trans'];
$_SESSION['trans']=$trans;
}
if(isset($_POST['fees']))
{
$fees=$_POST['fees'];
$_SESSION['fees']=$fees;
}
if(isset($_POST['rea']))
{
$rea=$_POST['rea'];
$_SESSION['rea']=$rea;
}
if(isset($_POST['nurse']))
{
$nurse=$_POST['nurse'];
$_SESSION['nurse']=$nurse;
}
if(isset($_POST['tax']))
{
$tax=$_POST['tax'];
$_SESSION['tax']=$tax;
}
if(isset($_POST['pluck']))
{
$pluck=$_POST['pluck'];
$_SESSION['pluck']=$pluck;
}
if(isset($_POST['general']))
{
$general=$_POST['general'];
$_SESSION['general']=$general;
}
if(isset($_POST['brd']))
{
$brd=$_POST['brd'];
$_SESSION['brd']=$brd;
}
if(isset($_POST['musa']))
{
$musa=$_POST['musa'];
$_SESSION['musa']=$musa;
}
if(isset($_POST['sup']))
{
$sup=$_POST['sup'];
$_SESSION['sup']=$sup;
}
if(isset($_POST['df']))
{
$df=$_POST['df'];
$_SESSION['df']=$df;
}
if(isset($_POST['part']))
{
$part=$_POST['part'];
$_SESSION['part']=$part;
}
if(isset($_POST['price']))
{
$price=$_POST['price'];
$_SESSION['price']=$price;
}
if(isset($_POST['term']))
{
$term=$_POST['term'];
$_SESSION['term']=$term;
}
if(isset($_POST['year']))
{
$year=$_POST['year'];
$_SESSION['year']=$year;
}
$tot=$fert+$fed+$trans+$fees+$rea+$nurse+$musa+$tax+$sup+$pluck+$general+$brd+$df+$part;
$_SESSION['tot']=$tot;
$sel1=mysql_query("select charge_id from charges where term='$term' and year='$year'") or die(mysql_error());
$count=mysql_num_rows($sel1);
if($count<1)
{
$ins1=mysql_query("insert into charges values(null, '$fert', '$fed', '$trans', '$fees', '$rea', '$nurse', '$musa', '$tax', '$sup', '$pluck', '$general', '$brd', '$df', '$part', '$price', '$term', '$year')") or die(mysql_query());
if($ins1==true)
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr><tr><td><font size='4' weight='bold' color='Red'>Net charge per unit[ Kg ] is ".$tot.".</br>Good, new Charges is registered </font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>OK</button></form></td></tr></table>");
   
	$location = "../Front-end pages/charges-registration.php";
	$_SESSION['location'] = $location;
}
else
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; top:40%; left:36%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td> <font size='4' color='Red'>not registered, Please try again!</font></td></tr></table>");
}
}
else
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;' colspan='2'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr>
<tr><td colspan='2'><font size='4' weight='bold' color='Red'>Already charges for <font color='blue'>".$term." ".$year."</font> registered.<br>Do you prefer to change?</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='charge_submittion.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='change'>Yes</button></form></td><td style='background-color:dimgray; width:100px; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>No</button></form></td></tr></table>");
    
	$location = "../Front-end pages/charges-registration.php";
	$_SESSION['location'] = $location;
}
}

if(isset($_POST['change']))
{
$update1=mysql_query("update charges set fertilizer='".$_SESSION['fert']."', union_federation='".$_SESSION['fed']."', transport='".$_SESSION['trans']."', management_fees='".$_SESSION['fees']."', REA='".$_SESSION['rea']."', nursery='".$_SESSION['nurse']."', MUSA='".$_SESSION['musa']."', tax='".$_SESSION['tax']."', public_support='".$_SESSION['sup']."', pluckers='".$_SESSION['pluck']."', general_activity='".$_SESSION['general']."', BRD_credit='".$_SESSION['brd']."', agaciro_DF='".$_SESSION['df']."', part_social='".$_SESSION['part']."' where term='".$_SESSION['term']."' and year='".$_SESSION['year']."'") or die(mysql_error());
if($update1==true)
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr><tr><td><font size='4' weight='bold' color='Red'>Net charge per unit[ Kg ] is ".$_SESSION['tot'].".</br>Good, Charges for <font color='blue'>".$_SESSION['term']." ".$_SESSION['year']."</font> is modified </font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>OK</button></form></td></tr></table>");
    
	$location = "../Front-end pages/charges-registration.php";
	$_SESSION['location'] = $location;
}
else
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; top:40%; left:36%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td> <font size='4' color='Red'>not modified, Please try again!</font></td></tr></table>");
}
}

?>