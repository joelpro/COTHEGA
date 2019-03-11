<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>COTHEGA-Rwanda</title>
<link rel="stylesheet" type="text/css" href="../styling.css" />
<script src="../Resources/javascript/charts/Chart.bundle.js"></script>
<script src="../Resources/javascript/charts/utils.js"></script>
</head>

<body>
<center><div id="container" style="opacity:0.80; width: 1300px; padding: 0px 15px 3px 15px;" align="center">
<canvas id="canvas"></canvas>
</div></center>

<?php
session_start();
include('../Back-end pages/connectify.php');
$sel0=mysql_query("SELECT charge_id FROM charges WHERE term='".$_SESSION['term']."' and year='".$_SESSION['year']."'") or die("Fails");
$data0=mysql_fetch_array($sel0);
if(mysql_num_rows($sel0)<=0)
{
 echo"<script>alert('Invalid selection')</script>";
 echo"<script>history.back();</script>";
}

$sel1=mysql_query("select * from site") or die(mysql_error());
$i=0;

while($data=mysql_fetch_array($sel1))
{
 $data1[$i]=$data['name'];
 $data2[$i]=$data['site_id'];
 $harvesters = 0;
 $unharvesters = 0;
 $sel2=mysql_query("SELECT block_id, block_name FROM block WHERE site_id='".$data['site_id']."'") or die("Fails");
 while($value1=mysql_fetch_array($sel2))
 {
  $sel3=mysql_query("select number from cultivator where block_id='".$value1['block_id']."'") or die(mysql_error());
  while($data2=mysql_fetch_array($sel3))
  {
   $sel4=mysql_query("select distinct cultivator from harvesting where charge_id='".$data0['charge_id']."' and cultivator='".$data2['number']."'") or die(mysql_error());
   if(mysql_num_rows($sel4)>0)
   {
    $harvesters++;
   }
   else
   {
    $unharvesters++;
   }
  }
  
 }
 $harv[$i]=round(($harvesters*100)/($harvesters+$unharvesters), 2);
 $unharv[$i]=round(($unharvesters*100)/($harvesters+$unharvesters), 2);
 //echo $data['name']." ".$data0['charge_id']." ".$harvesters;
 $i++;
}
$i--;
?>

<script>

    var SITES = [<?php while($data=mysql_fetch_assoc($sel1)){?>"<?php echo $data['name'];?>",<?php }?>];

    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
     
    var config = {
        type: 'bar',
        data: {
            labels: [<?php while($i>=0){?>"<?php echo $data1[$i]; ?>",<?php $i--;}?>],
            datasets: [{
                label: "harvester",
                backgroundColor: window.chartColors.blue,
                borderColor: window.chartColors.blue,
                data: [
				    <?php echo $harv[2]; ?>,<?php echo $harv[1]; ?>,<?php echo $harv[0]; ?>
                ],
                fill: false,
            }, {
                label: "non-harvester",
                fill: false,
                backgroundColor: window.chartColors.yellow,
                borderColor: window.chartColors.yellow,
                data: [
                  <?php echo $unharv[2]; ?>,<?php echo $unharv[1]; ?>,<?php echo $unharv[0]; ?>
                ],
            }]
        },
        options: {
            responsive: true,
            title:{
                display:true,
                text:'System management tool'
            },
            tooltips: {
                mode: 'index',
                intersect: true,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Sites'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: ' Value[ % ]'
                    },
                    ticks: {
                        min: 0,
                        max: 100,

                        // forces step size to be 5 units
                        stepSize: 5
                    }
                }]
            }
        }
    };
    //
    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx, config);
    };

 //////////////////////////// pie ///////////////////////////////////////




</script>

</div>
</body>
</html>
