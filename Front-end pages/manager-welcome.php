<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>COTHEGA-Rwanda</title>
<link rel="stylesheet" type="text/css" href="../styling.css" />
<style>
label
{
position:absolute;
top:45%;
left:15%;
width:70%;
color:blue;
text-align:center;
height:40%;
font-family:pristina;
font-size:140%;
}
</style>
</head>

<body>

<div id="container">
<?php include('../Front-end pages/page-banner.php'); session_start();?>

<label>
<center>
<table style="text-align:center;">
<tr>
<td><img src="../Resources/skin/images(33).jpg" style="border-radius:100% 100% 100% 100%; box-shadow:0px 0px 0.5px 1px blue; width:70%; height:70%;" /></td>
</tr>
<tr><td></td></tr>
<tr><td>Welcome <?php if($_SESSION['gender']=='M'){ echo "Mr."; } else{ echo "Miss.";} echo $_SESSION['fname'].'  '.$_SESSION['lname']; ?></td></tr>
<tr><td><?php echo $_SESSION['phone']; ?></td></tr>
<tr><td><?php echo $_SESSION['position']; ?></td></tr>
</table>
</center>
</label>

<div class="menudropdown1">
<ul>
<li><a href="board-registration.php">Register workers</a></li>
<li>
<a href="#">Reports</a>
<ul>
<li><a href="workers-report.php">List of workers</a></li>
<li><a href="#">List of sites & blocks</a>
<ul>
<li><a href="#">List of all sites</a></li>
<li><a href="blocks-report.php">List of all blocks</a></li>
</ul>
</li>
<li><a href="easy-search-for-cultivator.php">List of cultivator</a></li>
<li><a href="">Harvesting outcomes</a>
<ul>
<li><a href="easy-search-for-harvest.php">List of harvesters</a></li>
<li><a href="easy-search-for-unharvest.php">List of unharvesters</a></li>
<li><a href="harvesting-statistic-report.php">In-calculation</a></li>
<li><a href="easy-search-for-statistic.php">In-statistic</a></li>
</ul>
</li>
</ul>
</li>
<li><a href="../Back-end pages/signout.php">Signout</a></li>
</ul>
</div>
</div>

</body>
</html>
