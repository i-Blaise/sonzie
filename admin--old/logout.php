<?php
session_start();

unset($_SESSION['user_name'], $_SESSION['user_email']);
echo "<script>location='http://localhost/covid.trusthospital/admin/'</script>";
?>