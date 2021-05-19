<?php

session_start();

$conn=pg_connect("host=localhost port=5432 dbname=crud user=postgres password=Yilver");

if(isset($conn)){
}else{
  echo 'problemas';
}
//$conn=mysqli_connect(
    //'localhost',
    //'root',
    //'',
    //'crud'
//);

//if(isset($conn)){
  //  echo 'conectado';
//}else{
  //  echo 'problemas';
//}


?>