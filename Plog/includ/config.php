<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cms');

$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME) or die("not Connected") ;
mysqli_set_charset($con,'utf8');
/*
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "cms";
*/
try{

    $dsn="mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $Pdo_con = new PDO($dsn,DB_USER, DB_PASS); 
  $Pdo_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Set Valus
  }
     catch (Exception $e) {
        echo $e->error();
    }

     function read($query)
         {
         	global $Pdo_con;
                $stmt = $Pdo_con->prepare($query);
                $stmt->execute();
                return $stmt->fetchALL();
           }

              
               function IDU($query){
         
         	global $Pdo_con;
               	
               // $stmt = $Pdo_con->prepare($query);
             $Pdo_con->exec($query); 
                //return $stmt->rowCount();
              //  return  pdo->lastInsertId();
              }
          

?>



