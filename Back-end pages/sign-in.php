<?php
session_start();
include('connectify.php');
if(isset($_POST['login']))
{
if(isset($_POST['user']))
{
$user=$_POST['user'];
}
if(isset($_POST['key']))
{
$pass=$_POST['key'];
}
@$sel1=mysql_query("select ssn from silent where username='$user' and userkey='$pass'") or die(mysql_error());
$count=mysql_num_rows($sel1);
if($count==1)
{
 $data1=mysql_fetch_array($sel1);
 $sel2=mysql_query("select firstname, gender, lastname, telephone, position from board where ssn='".$data1['ssn']."' and status='Activated'") or die(mysql_error());
 $count1=mysql_num_rows($sel2);
 if($count1==1)
 {
  $data2=mysql_fetch_array($sel2);
  $_SESSION['fname']=$data2['firstname'];
  $_SESSION['lname']=$data2['lastname'];
  $_SESSION['phone']=$data2['telephone'];
  $_SESSION['position']=$data2['position'];
  $_SESSION['gender']=$data2['gender'];
  if($_SESSION['position']=='Manager')
  {
   echo"<script>location.href='../Front-end pages/manager-welcome.php';</script>";
   return false;
  }
  else if($_SESSION['position']=='Encadeur')
  {
   echo"<script>location.href='../Front-end pages/director-welcome.php';</script>";
   return false;
  }
  else if($_SESSION['position']=='Data collection')
  {
   echo"<script>location.href='../Front-end pages/registral-welcome.php';</script>";
   return false;
  }
  else if($_SESSION['position']=='Accountant')
  {
   echo"<script>location.href='../Front-end pages/accountant-welcome.php';</script>";
   return false;
  }
  else
  {
  echo("<table align='center' border='0' style='position:absolute; top:43%; left:40%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td align='center'> <font size='4' color='Red'>Your account is invalid.<br> Please contact us!</font></td></tr></table>");
 }
 }
 else
 {
  echo("<table align='center' border='0' style='position:absolute; top:43%; left:40%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td align='center'> <font size='4' color='Red'>Your account is locked.<br> Please contact us!</font></td></tr></table>");
 }
}
else
{
echo("<table align='center' border='0' style='position:absolute; top:40%; left:36%;'><tr><td style='text-align:center;'><img src='../Resources/icons/notification.png' width='65px' /></td><td> <font size='4' color='Red'>Incorrect username or password!</font></td></tr></table>");
}
}
?>