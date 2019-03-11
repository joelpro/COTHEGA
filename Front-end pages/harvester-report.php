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
opacity:0.6;
}
#editing
{
position:absolute;
top:24%;
left:7%;
max-height:400px;
min-width: 1170px;
max-width: 1170px;
box-shadow:0px 0px 1px 1px black;
overflow:auto;
background-color:#CCCCCC;

}
input[type=text]
{width:98%;
}
.style1 {
	color: #FF33CC;
	font-family: greff;
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
<a href="manager-welcome.php" style="position:fixed; left: 96.7%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Data collection')
{
?>
<a href="registral-welcome.php" style="position:fixed; left: 96.7%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Accountant')
{
?>
<a href="accountant-welcome.php" style="position:fixed; left: 96.7%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
else if($_SESSION['position']=='Encadeur')
{
?>
<a href="director-welcome.php" style="position:fixed; left: 96.7%; top:10px;" type="submit" name="closebtn" title="&laquo; close & back"><img src='../Resources/icons/s_error.png' style="width: 18px;" ismap="ismap" id="hiddenbtn"  /></a>
<?php
}
?>
<p style="font-family:pristina; font-size:26px;"><u>List of harvesters in <font color="#0000FF"><?php echo $_SESSION['to_search_for']; ?></font> block <font color="#0000FF"><?php echo $_SESSION['year']." - igihembwe ".$_SESSION['term']; ?></font></u></p>

<a href="easy-search-for-harvest.php" style="position:absolute; left:77px; text-decoration:blink; color:blue; font-family:pristina; font-size:18px; top: 69px;">
<img src="../Resources/icons/b_search.png" />Search again</a>

<table border="0" width="90%" id="printed">
<tr id="border" style="font-family:Book Antiqua; font-size:16px; background-color:black; color:white;"><td id="border" colspan="2"></td><td id="border">#</td><td id="border">First name</td><td id="border">Last name</td><td id="border">Account number</td><td id="border">Unit charges /kg</td><td id="border">Unit price</td><td id="border">harvested quantity</td><?php if($_SESSION['position']=='Accountant' || $_SESSION['position']=='Manager'){?><td id="border">Musa charges</td><td id="border">Amount to be paid</td><td id="border">Payment</td><?php } ?></tr>
<?php
include('../Back-end pages/connectify.php');
$sel=mysql_query("select charge_id, fertilizer, union_federation, transport, management_fees, REA, nursery,	musa, tax, public_support, pluckers, general_activity, BRD_credit, agaciro_DF,	part_social, Unit_price from charges where (term='".$_SESSION['term']."' and year='".$_SESSION['year']."')") or die(mysql_error());
$data=mysql_fetch_array($sel);

$netcharges=$data['fertilizer']+$data['union_federation']+$data['transport']+$data['management_fees']+$data['REA']+$data['nursery']+$data['musa']+$data['tax']+$data['public_support']+$data['pluckers']+$data['general_activity']+$data['BRD_credit']+$data['agaciro_DF']+$data['part_social'];

$max_tot_quantity=0;
$max_tot_musa=0;
$max_tot_takehome=0;
$sel0=mysql_query("select * from block where block_name='".$_SESSION['to_search_for']."'") or die(mysql_error());
while($data1=mysql_fetch_array($sel0))
{
$sel1=mysql_query("select number, firstname, lastname, account from cultivator where block_id='".$data1['block_id']."' and status='Available'") or die(mysql_error());
$i=1;
while($data1=mysql_fetch_array($sel1))
{
$total_quantity=0;
$take_home=0;
$sel2=mysql_query("select quantity, take_home, status from harvesting where (cultivator='".$data1['number']."' and charge_id='".$data['charge_id']."' and (status='Pend' or status='Paid'))") or die(mysql_query());
$count=mysql_num_rows($sel2);
$row=$count;
if($count>0)
{
while($data2=mysql_fetch_array($sel2))
{
$total_quantity=$total_quantity+$data2['quantity'];
$take_home=$take_home+$data2['take_home'];
$unitprice=$data['Unit_price'];
$status=$data2['status'];
}
$musa_price=$data['musa']*$total_quantity;
$max_tot_quantity=$max_tot_quantity+$total_quantity;
$max_tot_musa=$max_tot_musa+$musa_price;
$max_tot_takehome=$max_tot_takehome+$take_home;
?>
<tr id="border" style="cursor:pointer; background-color:white; <?php if($i%2==0){?> background-color:#99FFFF; <?php }?>" onclick="javascript:document.getElementById('index<?php echo $i; ?>').checked='checked';" ondblclick="javascript:document.getElementById('index<?php echo $i; ?>').checked='';"><td id="border"><form action="harvester-report.php" method="post"><input type="checkbox" onselect="" id="index<?php echo $i; ?>" name="index<?php echo $i; ?>" value="<?php echo $data1['number']; ?>" style="z-index:auto;"/></td><td id="border" width="30px"><button name="more" style="cursor:pointer; background-color:white; <?php if($i%2==0){?> background-color:#99FFFF; <?php }?>" onclick="javascript:document.getElementById('hidden').visibility='visible';" title="click for more info ..."><img src="../Resources/icons/b_plus.png" /></button></td>

<td id="border"><?php echo $data1['number']; ?></td><td id="border"><?php echo $data1['firstname']; ?></td><td id="border"><?php echo $data1['lastname']; ?></td><td id="border"><?php echo $data1['account']; ?></td><td id="border"><?php echo $netcharges." Frw"; ?></td><td id="border"><?php echo $unitprice." Frw"; ?></td><td id="border"><?php echo $total_quantity." kg"; ?></td><?php if($_SESSION['position']=='Accountant' || $_SESSION['position']=='Manager'){?><td id="border"><?php echo $musa_price." Frw"; ?></td><td id="border"><?php echo $take_home." Frw"; ?></td><td id="border"><?php echo $status; ?></td><?php } ?></tr>
<?php
if(isset($_POST['more']))
{
if(isset($_POST['index'.$i]))
{
$more=$_POST['index'.$i];
}
}
}
$i=$i+1;
}
?>
<tr id="border" style="color:red; font-weight:bold;"><td colspan="8" id="border" style="padding:5px;">*** Total ***</td><td id="border" align="right" style="padding:5px;"><u><?php echo $max_tot_quantity." Kg"; ?></u></td><?php if($_SESSION['position']=='Accountant' || $_SESSION['position']=='Manager'){?><td id="border" align="right" style="padding:5px;"><u><?php echo $max_tot_musa." Frw"; ?></u></td><td id="border" colspan="2" align="right" style="padding:5px;"><u><?php echo $max_tot_takehome." Frw"; ?></u></td><?php } ?></tr>
<tr><td colspan="12"><!--<label onclick="javascript:document.getElementById('index'+<?php //echo "1"; ?>).checked='checked';" style="color:blue; text-decoration: underline; cursor:pointer;">Check all</label>&nbsp; | &nbsp;<label onclick="javascript:document.getElementById('index'+<?php //echo $i; ?>).checked='';" style="color:blue; text-decoration: underline; cursor:pointer;">Uncheck all</label>--></td></tr>
<tr><td colspan="12">&nbsp;</td></tr>
<?php 
if($_SESSION['position']=='Accountant')
{
?>
<tr><td colspan="6"><input type="submit" name="pay" style="width: 125px;" value="Valid payment" /></form></td></tr>
<?php }?>
</table>

<?php
if(!empty($more))
{
?>
<div id='cover'>

</div>
<center>
<div id="editing">
<table width="100%">
<?php
$selcult=mysql_query("select number, firstname from cultivator where number='$more'") or die(mysql_error());
$datacult=mysql_fetch_array($selcult)
?>
<tr><td colspan="19" style="font-family:pristina; font-size:21px;"><b><label style="text-align:left;">cultivator: <font color="blue" size="+2"> <?php echo $datacult['number']." - ".$datacult['firstname']; ?></font></label> <img src="../Resources/icons/s_error.png" style="cursor: pointer;" align="right" onclick="javascript:document.getElementById('cover').style.visibility='hidden'; document.getElementById('editing').style.visibility='hidden';" /> <br>harvesting details in<font color="blue"> term <?php echo $_SESSION['term']." - ".$_SESSION['year']; ?></font></b></td></tr>
<tr><td colspan="3" align="center" style="font-family:pristina; font-size:21px;"></td></tr>
<tr style="font-weight:bold; font-size:14px; color:blue;"><td id="border" rowspan="2" width="6%" colspan="2"></td><td id="border" rowspan="2" width="6%">Quantity</td><td id="border" rowspan="2" width="6%">Unit price</td><td id="border" colspan="15" align="center">All charges taken away / Frw</td></tr>
<tr style="font-weight:bold; font-size:14px; color:red;"><td id="border" width="6%" style="padding:4px;">fertilizer</td><td id="border" width="7%">union fed...</td><td id="border">transport</td><td id="border" width="7%">management fees</td><td id="border" width="5%">REA</td><td id="border" width="5%">nursary</td><td id="border" width="6%">musa</td><td id="border" width="6%">tax</td><td id="border">public_sup...</td><td id="border">pluckers</td><td id="border">general activ..</td><td id="border">BRD credit</td><td id="border">agaciro DF</td><td id="border">part social</td><td id="border" width="4%">Date</td></tr>
<?php
$sel=mysql_query("SELECT Unit_price FROM charges where (term='".$_SESSION['term']."' and year='".$_SESSION['year']."')");
$data4=mysql_fetch_array($sel);
$sel3=mysql_query("select harvest_id, quantity, Date, Month from harvesting where cultivator='$more' and charge_id='".$data['charge_id']."'") or die(mysql_error());
$i = mysql_num_rows($sel3);
while($data3=mysql_fetch_array($sel3))
{
?>
<tr align="right"></td><form action="#" method="post"><td id="border"><button name="change" style="cursor:pointer;" title="clicks to change quantity"><img src="../Resources/icons/b_edit.png" /></button></td>

<td id="border"><button name="change" style="cursor:pointer;" title="clicks to change quantity" onclick="javascript:document.getElementById('hidden').visibility='visible';"><img src="../Resources/icons/b_drop.png" /></button></td>

</td><td id="border" style="color: blue; font-weight: bold;"><input type="text" name="toChange" placeholder=' ... ' value="<?php echo $data3['quantity']; ?>" style='width: 59%; height: 18px;' <?php if($_SESSION['position']=='Data collection'){?> readonly="readonly" <?php }?> required/>Kg</td><td id="border"><?php echo $data4['Unit_price']." Frw"; ?><input type="text" name="harv_id" value="<?php echo $data3['harvest_id']; ?>" style="width:0px; height:0px; visibility: hidden;" /></td></form><td id="border"><?php echo $data['fertilizer']*$data3['quantity']; ?></td><td id="border"><?php echo $data['union_federation']*$data3['quantity']; ?></td><td id="border"><?php echo $data['transport']*$data3['quantity']; ?></td><td id="border"><?php echo $data['management_fees']*$data3['quantity']; ?></td><td id="border"><?php echo $data['REA']*$data3['quantity']; ?></td><td id="border"><?php echo $data['nursery']*$data3['quantity']; ?></td><td id="border"><?php echo $data['musa']*$data3['quantity']; ?></td><td id="border"><?php echo $data['tax']*$data3['quantity']; ?></td><td id="border"><?php echo $data['public_support']*$data3['quantity']; ?></td><td id="border"><?php echo $data['pluckers']*$data3['quantity']; ?></td><td id="border"><?php echo $data['general_activity']*$data3['quantity']; ?></td><td id="border"><?php echo $data['BRD_credit']*$data3['quantity']; ?></td><td id="border"><?php echo $data['agaciro_DF']*$data3['quantity']; ?></td><td id="border"><?php echo $data['part_social']*$data3['quantity']; ?></td><td id="border" align="right"><?php echo $data3['Date']." /".$data3['Month']; ?></td></tr>
<?php
}
}
?>
</table>
</div>
<script type="text/javascript">
//<![CDATA[
function printPage()
{
    // Do print the page
	document.getElementById('printed').style.visibility='visible';
	document.getElementById('printed').style.position='absolute';
	document.getElementById('printed').style.top='70px';
	
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
//]]>
</script>

<p class="print_ignore">
    <input type="button" id="print" target='_blank' value="Print preview"
        onclick="printPage();" /></p>
<?php
if(isset($_POST['pay']))
{
while($i>0)
{
 if(isset($_POST['index'.$i]))
 {
  $pay = mysql_query("UPDATE harvesting SET status='Paid' WHERE cultivator='".$_POST['index'.$i]."'") or die("Something went wrong in payment");
  echo"<script>location.href='harvester-report.php';</script>";
 }
 $i--;
}
}
}
/*if(isset($_GET['check']))
{
 <a href="sql.php?db=cotega&amp;table=harvesting&amp;sql_query=SELECT+%2A+FROM+%60harvesting%60&amp;goto=tbl_structure.php&amp;checkall=1&amp;token=aeb34317c4da109d456154f1bfa06537" onclick="if (markAllRows('rowsDeleteForm')) return false;">Check All</a>
}*/
if(isset($_POST['change']))
{
 if(isset($_POST['harv_id']))
 {
  $harv = $_POST['harv_id'];
 }
 if(isset($_POST['toChange']))
 {
  $quantity = $_POST['toChange'];
 }
 $charges = ($data['fertilizer']+$data['union_federation']+$data['transport']+$data['management_fees']+$data['REA']+$data['nursery']+$data['tax']+$data['musa']+$data['public_support']+$data['pluckers']+$data['general_activity']+$data['BRD_credit']+$data['agaciro_DF']+$data['part_social'])*$quantity;
 
 $wage = ($data['Unit_price']*$quantity) - $charges;
 $change = mysql_query("UPDATE harvesting SET quantity='$quantity', take_home='$wage' WHERE harvest_id='".$harv."'") or die("Something went wrong in payment");
 if($change == true)
 {
  echo("<table align='center' border='0' style='position:absolute; font-family:Comic Sans MS; text-align:center; box-shadow:0px 0px 0px 1px dimgray; top:40%; left:30%; width:550px;'><tr><td style='text-align:center;'><img src='../Resources/icons/like.png' width='65px' style='border-radius:70% 70% 70% 70%; border:2px solid red;'/></td></tr><tr><td><font size='4' weight='bold' color='Red'>An update, Quantity <br>Changes are made, ".$quantity." Kg and take home is ".$wage." Frw </font></td></tr><tr><td></td></tr><tr><td style='background-color:dimgray; box-shadow:0px 0px 0px 2px dimgray;' align='right'><form action='back.php' method='post'><button style='font-size:20px; width:100px; margin-top:2px;' name='back'>OK</button></form></td></tr></table>");
   if(isset($_POST['back']))
   echo"<script>location.href='harvester-report.php';</script>";
 }
}
?>
</body>
</html>
