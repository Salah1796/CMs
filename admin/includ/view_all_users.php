<h2 align="center" style="margin-bottom: 20px; font-family: cursive;">View All users
</h2> 
            <table class="table table-borderd table-hover">
                            <thead>
                               <tr>
                                  
                                   <th>Id</th>
                                   <th>username</th>
                                   <th>Firstname</th>
                                   <th>Lastname</th>
                                   <th>Email</th>
                                   <th>Role</th>
                                
                                  
                                   <th>Delete</th>
                                 

                                   


                                 



                               </tr>
                            </thead>

                            <tbody>
         <?php


         if(isset($_GET['user_del_id'])){
                 $id=  $_GET['user_del_id'];  
                $sql="delete from users where user_id ='$id'";     
               $Pdo_con->Pdo_IDU($sql,array());
               
               }
               if (isset($_GET['To_admin'])) {
                 $id=$_GET['To_admin'];  
                    $sql="update  users set user_role ='Admin' where user_id ='$id'";     
               $Pdo_con->Pdo_IDU($sql,array());
               }
                 if (isset($_GET['To_sub'])) {
                 $id=$_GET['To_sub'];  
                    $sql="update  users set user_role ='Subscriber' where user_id ='$id'";     
               $Pdo_con->Pdo_IDU($sql,array());
               }


                  $sql="select * from users ";
                  $res=$Pdo_con->read_rows($sql,array());
                 
                  foreach ($res as $row) {
                   
                    
                   
                    $id=$row['user_id'];
                    $username=$row['username'];
                    $Firstname=$row['user_firstname'];
                    $Lastname=$row['user_lastname'];
                    $email=$row['user_email'];
                    $Role=$row['user_role'];
                   
            //user_id
                     echo '
                      <tr>
                                   
                            <td>'.$id.'</td>
                            <td>'.$username.'</td>
                            <td>'.$Firstname.'</td>
                            <td>'.$Lastname.'</td>
                            <td>'.$email.'</td>
                            <td>'.$Role.'</td>
                            
                       <td><a href="?up_user_id='.$id.'">Update</a></td>           
 <td><a href="?user_del_id='.$id.'">Delete</a></td>
                                  <td><a href="?To_admin='.$id.'">Admin</a></td>
                                  <td><a href="?To_sub='.$id.'">Subscriber</a></td>

                                
                                 


                              

                                  
                                  

                               </tr>
                               ';



                 }
                 ?>
                 </tbody></table>