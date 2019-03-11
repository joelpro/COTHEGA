<?php 
include('../Back-end pages/connectify.php');
session_start();
mysql_query("DELETE FROM `cotega`.`board` WHERE `board`.`ssn` = '".$_SESSION['del'.$_SESSION['this']]."' LIMIT 1"); 
?>