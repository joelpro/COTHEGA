<?php

include('connectify.php');
session_start();

if(isset($_POST['register']))
{
if(isset($_POST['fname']))
{
$name=$_POST['fname'];
}
if(isset($_POST['lname']))
{
$lname=$_POST['lname'];
}
if(isset($_POST['gender']))
{
$gender=$_POST['gender'];
}
if(isset($_POST['year']))
{
$year=$_POST['year'];
}
if(isset($_POST['month']))
{
$month=$_POST['month'];
}
if(isset($_POST['day']))
{
$day=$_POST['day'];
}
if(isset($_POST['phone']))
{
$phone=$_POST['phone'];
}
if(isset($_POST['position']))
{
$position=$_POST['position'];
}

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
 $date=$day."/".$month."/".$year;
$ins1=mysql_query("insert into board(firstname,lastname, gender, telephone, DOB, position, pin) values('$name', '$lname', '$gender', '$phone', '$date', '$position', '$num')") or die(mysql_query());
if($ins1==true)
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr><tr><td><font size='4' weight='bold' color='Red'>Good, ");if($position == 'Encadeur') echo "Peuser"; else echo $position; echo(" [ ".$name." ".$lname." ] is now registered<br>Keep this pin [<font color:blue>".$num."</font>] for worker sign up!</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>OK</button></form></td></tr></table>");
   
	$location = "../Front-end pages/board-registration.php";
	$_SESSION['location'] = $location;

}
else
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; top:40%; left:36%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td> <font size='4' color='Red'>not registered, Please try again!</font></td></tr></table>");
}
}

if(isset($_POST['signup']))
{
if(isset($_POST['user']))
{
$user=$_POST['user'];
}
if(isset($_POST['pass']))
{
$pass=$_POST['pass'];
}
if(isset($_POST['repass']))
{
$repass=$_POST['repass'];
}
if(isset($_POST['pin']))
{
$pin=$_POST['pin'];
}
if($pass!=$repass)
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; top:40%; left:36%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td> <font size='4' color='Red'>please, Enter password must be similar to re-entered password!</font></td></tr></table>");
return false;
}
$sel2=mysql_query("select ssn, position, pin from board where pin='$pin' and status='Deactivated'") or die(mysql_error());
$count=mysql_num_rows($sel2);
if($count==1)
{
$data1=mysql_fetch_array($sel2);
$ins2=mysql_query("insert into silent values('$user', '$pass', '".$data1['ssn']."')");
if($ins2==true)
{
$upd1=mysql_query("update board set status='Activated'") or die(mysql_error());
if($upd1==true)
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr><tr><td><font size='4' weight='bold' color='Red'>Hello, ".$data1['position']." you' re now registered<br>Go on logging in now!</font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>OK</button></form></td></tr></table>");
   
	$location = "../index.php";
	$_SESSION['location'] = $location;

}
}
else
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; top:40%; left:36%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td style='text-align:center;'> <font size='4' color='Red'>not registered, Please try again!</font></td></tr></table>");
}
}
else
{
echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; top:40%; left:36%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td> <font size='4' color='Red'>Please check your Pin careful and try again!</font></td></tr></table>");
}
}

?>