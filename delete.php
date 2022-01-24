<?php
require "admin_functions.php";
if(isset($_GET['v']) && isset($_GET['id'])){
	$v = $_GET['v'];
	$id = $_GET['id'];
	if($v === "employe"){
		delete($v,"WHERE id_user = ".$id);
		delete("user","WHERE id = ".$id);
		delete("reservation","WHERE id_user = ".$id);

		
	}elseif($v === "vehicule"){
		delete($v,"WHERE matricule = '".$id."'");
		delete("reservation"," WHERE id_vehicule = '".$id."'");
	}
	
	
	header("location:".$_GET['v'].".php");
}
?>