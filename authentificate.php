<?php
session_start();
require "functions.php";
$username = $_POST['Username'];
$password = $_POST['Password'];

login($username,$password);

?>