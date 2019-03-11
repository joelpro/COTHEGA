<?php
session_start();
echo"<script>location.href='".$_SESSION['location']."';</script>";

?>