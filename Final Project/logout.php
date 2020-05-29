<?php
session_start(); //mengaktifkan session
session_destroy(); //menghapus semua session
header("location:login.php"); //mengalihkan ke halaman login
?>