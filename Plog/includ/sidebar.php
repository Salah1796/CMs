  <div class="col-md-4">

           <!-- Search Widget -->
     <form method="post" action="../Plog/search.php">
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" name="Search" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button type="submit " name="submit" class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
        </form>


<?php

//login.php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['Submit'])) {
  $username=test_input($_POST['username']);
  $password=test_input($_POST['Password']);

$sql="select * from users where username='$username'";

if($Pdo_con->getCount($sql)>0){ //user exist

$sql="select * from users where username='$username' and user_password='$password'";
if($Pdo_con->getCount($sql)>0){//username Exist & Password is ok 
  
  $user=$Pdo_con->read_row($sql);
  $_SESSION['id']        =  $user['user_id'];
  $_SESSION["username"]  =  $username;
  $_SESSION["Password"]  =  $password;
  $_SESSION['role']      =  $user['user_role'];
  //header('location:index.php');



  
}

else{
  //password is incorect
   $pass_error="Password incorect!!!";

    }
}

else   //username Not exist
{

$username_error="Username Not Exist!!";

}
}
?>
<?php
if (!isset($_SESSION["username"])) {
 



?>
<form method="post" action="">

          <div class="card my-4">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
               </div>
                   <span style="color: red"><?php if (isset($username_error))echo $username_error;?></span>
                   <span style="color: red"><?php if (isset($pass_error))echo $pass_error;?></span>
              <div class="input-group">

                <input type="Password" name="Password" class="form-control" placeholder="Enter Password">
               
             <span class="input-group-btn">
               <button  type="submit" name="Submit" class="btn btn-secondary-control "type="button">Submit</button>
             </span>
                </div>
            </div>
          </div>
 </form>
 <?php
}


?>
          <!-- Categories Widget -->



       

          <!-- Side Widget -->
         