<?php 

try{
	$db=new PDO("mysql:host=localhost;dbname=basf_anket;charset=utf8", 'root','');
}

catch(PDOExpception $e){

echo $e->getMessage();

}

?>