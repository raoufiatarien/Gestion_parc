<?php 
require "functions.php";
function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y years "); }
    if ($interval->m) { $result .= $interval->format("%m months "); }
    if ($interval->d) { $result .= $interval->format("%d days "); }
    if ($interval->h) { $result .= $interval->format("%h hours "); }
    if ($interval->i) { $result .= $interval->format("%i minutes "); }
    if ($interval->s) { $result .= $interval->format("%s seconds "); }

    return $result;
}
$date_start =  $_GET['date_start'];
$date_end = $_GET['date_end'];
$heure_start = $_GET['heure_start'];
$heure_end = $_GET['heure_end'];
$first_date = new DateTime($date_start." ".$heure_start.":00:00");
$second_date = new DateTime($date_end." ".$heure_end.":00:00");
$difference = $first_date->diff($second_date);
$difference = format_interval($difference);
if(strpos($difference , 'days') === false){
	$days = 0;
}else{
	$days = floatval(explode("days", $difference)[0]);
}
if(strpos($difference , 'hours') === false){
	$hours = 0;
}else{
	$hours = floatval(explode("hours", $difference)[0]);
}
/*if($first_date > $second_date){
	echo "bigger";
}elseif($first_date < $second_date){
	echo "smaller";
}else{
	echo "equals";
}*/
$vehicules = select("vehicule"," WHERE type = '".$_GET['type']."'");
foreach ($vehicules as $vehicule) {
	$reservs = select('reservation'," WHERE id_vehicule = '".$vehicule['matricule']."'");
	$available = true;
	foreach ($reservs as $reserv) {
		$r_f_date = new DateTime($reserv['date_debut']." ".$reserv['heure_debut'].":00:00");
		$r_s_date = new DateTime($reserv['date_fin']." ".$reserv['heure_fin'].":00:00");
		if($r_s_date <= $first_date || $r_f_date >= $second_date){

		}else{
			$available = false;
		}
	}
	if($available == true){
		echo'<option value="'.$vehicule['matricule'].'">'.$vehicule['nom'].'</option>';
	}else{
		echo'<option disabled style="color : red;" value="'.$vehicule['matricule'].'">'.$vehicule['nom'].' (reservé epndant cette periode )</option>'; 
	
	}

}

?>