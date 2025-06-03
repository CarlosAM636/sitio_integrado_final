<?php
inicio_sesion();
session_destroy();
header("Location: login.php");
?>
