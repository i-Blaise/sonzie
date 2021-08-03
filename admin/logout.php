<?php
session_start();

unset($_SESSION['name'], $_SESSION['expire']);
header("Location: login");
?>