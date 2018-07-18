<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";
/**
* 
*/
class mydb
{

public function __construct($name)
{
   $this->pd=new PDO("mysql:host=localhost;dbname=$name","root","");

}

public function read_row($q,$arg=array())
{
  $stm= $this->pd->prepare($q);

$stm->execute($arg);
return $stm->fetch();

}
public function read_rows($q,$arg=array())
{
  $stm= $this->pd->prepare($q);

$stm->execute($arg);
return $stm->fetchAll();

}
public function getCount($query, $arg=array())
           {
                $stmt = $this->pd->prepare($query);
                $stmt->execute($arg);
                return $stmt->rowCount();
           }

public function Pdo_IDU($q,$arg=array())
{
  $stm= $this->pd->prepare($q);

$stm->execute($arg);


}


}
 $Pdo_con=new mydb('cms');


  
 
  
/*
 ##################     Creat db       ###############################   

 $sql="";      #creat table string 
 $Pdo_con->exec($sql);    //use exec() function 


#################      Creat Table      ######################### 

 $sql="";                     creat table string 
 $Pdo_con->exec($sql);           use exec() function  

#################    Insert  or  Delete  #######################

 sql="";                Delete or insert statment
 $Pdo_con->exec($sql);      use exec() function 

 


//insert using preaper

   $sql="INSERT INTO MyGuests (firstname, lastname, email) 
    VALUES (:firstname, :lastname, :email)";    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    // insert a row
    $firstname = "salah";
    $lastname = "mahmoud";
    $email = "a@example.com";
    $stmt->execute(); 


#################      Update            ############################

$sql = "";                       //update Statment 
$stmt = $Pdo_con->prepare($sql);    //Prepare function
$stmt->execute();                // execute the query
$stmt->rowCount()                //nuber or row is updated

//update  without  prepare    

$sql = "";                           //update Statment 
$Pdo_con->exec($sql);                   // execute the query



################       Select            ##############################
    
$sql="select * from cats";                                         // select Statment
$stmt = $Pdo_con->prepare($sql);                    // Prepare function
$stmt->execute();                                // execute statment

$arr=$stmt->fetchAll();                     // retuen array of selected valus
 

*/
      


/*
#####  Insert Multiple Records Into MySQL ###########

$conn->beginTransaction();

// our SQL statements


$conn->exec("INSERT INTO MyGuests (firstname, lastname, email)  VALUES ('John', 'Doe', 'john@example.com')");


 $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)  VALUES ('Mary', 'Moe', 'mary@example.com')");


 $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Julie', 'Dooley', 'julie@example.com')");


 //commit the transaction
 $conn->commit();



  $last_id = $conn->lastInsertId();   //last inserted id 

*/