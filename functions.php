<?php 
require "database.php";
$GLOBALS['database'] = $database; 



function add_admin($username,$password,$priviliges){

	$query = "SELECT count(*) FROM `admin` WHERE username = :mail";  
	$exist=$GLOBALS['database']->prepare($query);
	$exist->execute(array(':mail'=>$username));
	$exist=$exist->fetchColumn(); 
	session_start();
	if($exist == 0){
		$message = "username deja utilisé !";
		header("location:add_admin.php?message=$message");
	}else{
		$password = sha1($password);
		$query2='INSERT INTO admin VALUES ( NULL, '.$username.','.$password.','.$priviliges.' )';
		$requette=$GLOBALS['database']->prepare($query2);
		if ($requette->execute())
		{
			header("location:admins.php");
					
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
function select_sum($var,$table,$where=""){
	$safe = explode(";", $where);
	$where = $safe[0];
	$query = "SELECT sum(".$var.") FROM ".$table." ".$where;
	$requette = $GLOBALS['database']->prepare($query);
	$requette->execute();
	$data = $requette->fetch();
	//echo $query;

	return $data;
}
function login($username, $password){
	$password = "'".sha1($password)."'";
	$username = "'".$username."'";
	$user = select1('user',"WHERE username = ".$username." AND password = ".$password);
	if(!isset($user['id'])){
		header("location:login.php?Error=Erreur ! Username ou mot de passe incorrecte");
	}else{

		$_SESSION['username'] = $user['username'];
		$_SESSION['id_user'] = $user['id'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['role'] = $user['role'];
		
		
		header("location:index.php");
	}
}
function insert($table,$values){
	$query2="INSERT INTO ".$table." VALUES ( ".$values." )";
	$requette=$GLOBALS['database']->prepare($query2);
	if ($requette->execute())
	{
		return $GLOBALS['database']->lastInsertId();
				
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
	$admin = select1('user',"WHERE id =".$id." AND password = ".$old);
	if(!isset($admin['id'])){
		$message = "Ancien mot de pass incorrecte";
		header("location:settings.php?Error=$message");
	}else{
		update("user"," password = ".$new." WHERE id = ".$id);
		$message = "Votre mot de passe a ete mis a jour";
		header("location:settings.php?success=$message");
	}
}
?>