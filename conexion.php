<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Conexión a la base de datos (debes configurar la conexión)
$conn = mysqli_connect("localhost", "userPro", "123", "Escalafon");