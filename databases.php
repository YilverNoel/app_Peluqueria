<?php 

//$server='localhost';
//$username='root';
//$pass='';
//$db='cliente';
//try {
    
 //   $conn= new PDO("mysql:host=$server; dbname=$db;",$username, $pass);
//} catch (PDOException $e) {

  //  die('paila weon ');
    //throw $th;
//}



$conn=pg_connect("host=localhost port=5432 dbname=crud user=postgres password=Yilver");

if(isset($conn)){
}else{
  echo 'problemas';
}

?>