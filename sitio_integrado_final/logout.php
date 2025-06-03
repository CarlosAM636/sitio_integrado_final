<?php
inicio_sesio();
session_destroy();
header("Location: login.php");
?>
