
<?php

 $id= $_SESSION['id'] ;

//echo $_SESSION['id'];

$q="select * from users where user_id ='$id'";
      $row=$Pdo_con->read_row($q,array());
                    $F_name=$row['user_firstname'];
                    $L_name=$row['user_lastname'];
                    $username=$row['username'];
                    $user_email=$row['user_email'];
                    $role=$row['user_role'];
                    $user_password=$row['user_password'];

                    
               
 
 
 ?>



<head>
    
<style type="text/css">
    
.error
{
color: red;

}

</style>

</head>
<?php 
if(isset($_POST['update']))
{

$Username_error=$firstName_error=$Last_name_error=$email_error =$password_error ="";
$errors=array();
if (empty($_POST["F_name"]))
 {
    $firstName_error = "first Name is required";
    $errors[count($errors)]="first Name is required";
  } 
  else
   {
    $F_name=$_POST['F_name'];
  }


if (empty($_POST["L_name"]))
 {
    $Last_name_error = "Last Name is required";
    $errors[count($errors)]="Last Name is required";
  } 
  else
   {
    $L_name=$_POST['L_name'];
  }


  if (empty($_POST["Username"]))
 {
    $Username_error = "Username is required";
   $errors[count($errors)]="Username is required";
  } 
  else
   {
    $user_name=$_POST['Username'];
  }

  
////
if (empty($_POST['user_pass']))
   {
    $user_pass_error = "Password is required";
    $errors[count($errors)]="Password is required";

  } 
  else
   {
    $user_pass=$_POST['user_pass'];
  }
  if (empty($_POST['user_email']))
   {
    $user_email_error = "Email is required";
    $errors[count($errors)]="Email is required";

  } 
  else
   {
    $user_email=$_POST['user_email'];
  }

  $user_role=$_POST['user_role'];
    if(count($errors)>0)
    {
     echo "<script>alert('There are erors or missing information')</script>";
  }
 else

 {
     //echo "<script>alert('updataing!!!!')</script>";
  //echo(arg1)
  $sql="update users set 
 username='$user_name',
 user_password='$user_pass',
 user_firstname='$F_name',
 user_lastname='$L_name',
 user_email='$user_email',
 user_role='$user_role'
  where user_id='$id'";
$Pdo_con->Pdo_IDU($sql,array());
        header("location:users.php?op=viewAll");
    }
 
}
?>
<div class="col-xs-12" style="height: auto; margin-top: 10px; 
">
<h2 align="center" style="margin-bottom: 20px; font-family: cursive;">Youer Profile</h2>
 <form action="" method="POST"  enctype="multipart/form-data" >


            <div class="form-group">

            <label for="Fname">First Name</label>
            <input type="text" class="form-control" name="F_name" value=<?php echo $F_name;?> >
            <span class="error">* <?php  if(isset($firstName_error))echo $firstName_error;?></span>
        </div>
        
        <div class="form-group">
            <label for="Lname">Last Name</label>
            <input type="text" class="form-control" name="L_name" value=<?php echo $L_name;?> >
            <span class="error">* <?php  if(isset($Last_name_error))echo $Last_name_error;?></span>
</div>
<div class="form-group">
             
              
            <label for="cats"> User Role </label>
            <select  name="user_role"  class="form-control" >
            
            <option value=<?php echo $role ?>><?php echo $role?></option>
            <?php if ($role=='Admin') {
              echo " <option value='Subscriber'>Subscribe</option>";
            } 
            else
              echo "<option value='Admin'>Admin</option>";
          
           

               ?> 
            </select>
           
           
        </div>
<div class="form-group">
            <label for="Username"> Username</label>
            <input type="text" class="form-control" name="Username" value=<?php echo $username;?> >
            <span class="error">* <?php  if(isset($Username_error))echo 
            $Username_error;?></span>

</div>
   
<div class="form-group">
     
            <label for="user_emile">Email</label>
            <input type="Email" class="form-control" name="user_email" value=<?php echo $user_email;?> >
            <span class="error">* <?php  if(isset($user_email_error)) echo $user_email_error;?></span>
</div>
<div class="form-group">
  
            <label for="user_pass">Password</label>
            <input type="Password" class="form-control" name="user_pass" value=<?php echo $user_password;?>>
            <span class="error">* <?php  if(isset($user_pass_error))echo $user_pass_error;?></span>
</div>

<input type="submit" name="update" value="Update" class="btn btn-primary" style="width: 90% ;margin-left: 5%; height: 40px;">
            
</div>
            
            




            </form>
        </div>

        
  


        
  

          

