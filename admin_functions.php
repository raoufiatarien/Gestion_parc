<?php 
require "database.php";
require "hash.php";
$GLOBALS['database'] = $database; 

function convertCurrency($amount,$from_currency,$to_currency){
  $apikey = 'cc1787e6184afc8e97b9';

  $from_Currency = urlencode($from_currency);
  $to_Currency = urlencode($to_currency);
  $query =  "{$from_Currency}_{$to_Currency}";
  $str = "https://free.currconv.com/api/v7/convert?q=".$query."&compact=ultra&apiKey=".$apikey;
  $json = file_get_contents($str);
  $obj = json_decode($json, true);

  $val = floatval($obj["$query"]);
  $total = $val * $amount;
  return number_format($total, 4, '.', '');
}


function add_admin($username,$email,$password,$priviliges){
	$password = sha1($password);
	$username = encrypt($username);
	$query = "SELECT count(*) FROM `admin` WHERE username = :mail";  
	$exist=$GLOBALS['database']->prepare($query);
	$exist->execute(array(':mail'=>$username));
	$exist=$exist->fetchColumn(); 

	if($exist > 0){
		$message = "username deja utilise !";
		header("location:add_admin.php?Error=$message");
	}else{

		$query2='INSERT INTO admin VALUES ( NULL, "'.$username.'","'.$email.'","'.$password.'",'.$priviliges.',"FCFA","XAF")';
		$requette=$GLOBALS['database']->prepare($query2);
		if ($requette->execute())
		{
			header("location:admin.php");
					
		}else  {
			echo $query2;
				
		}
	}
}
function select($table,$where=""){
	$safe = explode(";", $where);
	$where = $safe[0];
	$query = "SELECT * FROM ".$table." ".$where;
	// echo $query;
	$requette = $GLOBALS['database']->prepare($query);
	$requette->execute();
	$data = $requette->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}
function select_distinct($var,$table,$where=""){
	$safe = explode(";", $where);
	$where = $safe[0];
	$query = "SELECT DISTINCT ".$var." FROM ".$table." ".$where;
	// echo $query;
	$requette = $GLOBALS['database']->prepare($query);
	$requette->execute();
	$data = $requette->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}
function select1($table,$where=""){
	$safe = explode(";", $where);
	$where = $safe[0];
	$query = "SELECT * FROM ".$table." ".$where;
	$requette = $GLOBALS['database']->prepare($query);
	$requette->execute();
	$data = $requette->fetch();
	//echo $query;

	return $data;
}
function login_admin($username, $password){
	$password = "'".sha1($password)."'";
	$username = "'".encrypt($username)."'";
	$admin = select1('admin',"WHERE username = ".$username." AND password = ".$password);
	if(!isset($admin['id'])){
		header("location:login.php?Error=Erreur ! Username ou mote de passe incorrecte");
	}else{
		$_SESSION['username'] = decrypt($username);
		$_SESSION['id_admin'] = $admin['id'];
		$_SESSION['currency'] = $admin['currency'];
		$_SESSION['currency_code'] = $admin['currency_code'];
		$_SESSION['priviliges'] = $admin['priviliges'];
		
		
		header("location:index.php");
	}
}
function insert($table,$values){
	$query2="INSERT INTO ".$table." VALUES ( ".$values." )";
	$requette=$GLOBALS['database']->prepare($query2);
	if ($requette->execute())
	{
		//header("location:admins.php");
				
	}else  {
		echo $query2;
			
	}
}
function delete($table,$where){
	$safe = explode(";", $where);
	$where = $safe[0];
	$query = "DELETE FROM ".$table." ".$where;
	// echo $query;

	$requette = $GLOBALS['database']->prepare($query);
	$requette->execute();
	if ($requette->execute())
	{ 
		//return $color;
		//header("location:../marketplace.php");
	}else  {
		//header("location:../404.html");
		echo $query;
			
	}
}
function update($table, $where){
	$query2="UPDATE ".$table." SET ".$where;
	$requette=$GLOBALS['database']->prepare($query2);
	if ($requette->execute())
	{
		//header("location:admins.php");
				
	}else  {
		echo $query2;
			
	}
}
function change_password($old,$new,$id){
	$old = "'".sha1($old)."'";
	$new = "'".sha1($new)."'";
	$admin = select1('admin',"WHERE id =".$id." AND password = ".$old);
	if(!isset($admin['id'])){
		$message = "Ancien mot de pass incorrecte";
		header("location:settings.php?Error=$message");
	}else{
		update("admin"," password = ".$new." WHERE id = ".$id);
		$message = "Votre mot de passe a ete mis a jour";
		header("location:settings.php?success=$message");
	}
}
?>