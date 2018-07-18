<?php
function insert_cat_in_DB()
 {
   global $con;
   global $error;

if(isset($_POST['add']))
            {
                    

                $cat_title=$_POST['cat_title'];
                if($cat_title!="")
                {
             $sql="insert into cats (cat_title) values('$cat_title') ";
                 
                 if($res=mysqli_query($con,$sql))
                 {

                    $error="Sucssesfuly add";
             // 
                }
                else
                      die(mysqli_error($con));
            }
             else   $error="can not add empty category";
            // echo  $error=="can not add empty category";

            // header("location:cats.php ");
          

            }
             } 


function del_cat()
{
    global $con;
    global $cat_id;

      if(isset($_GET['id']))
            {
                 
                $cat_id=$_GET['id'];    
                
            $sql="DELETE FROM cats where cat_id ='$cat_id'";
                 
                 if($res=mysqli_query($con,$sql))
                    {
                        echo "
                        <script>


                        alert('Sucssesfuly Deleted :)')
                        </script>";
                      
                 
            }
                else
                     echo "<script>alert('error in databeses')</script>";
           
             header("location:cats.php ");
           
            }

}

function  read_cats_from_db()
{
 global $con;
 global $cat_id;
 global $cat_title;
$sql="select * from cats ";
                 $res=mysqli_query($con,$sql);
                  $rows=mysqli_num_rows($res);
                 while ($row=mysqli_fetch_assoc($res)) {
                        $cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];
                          echo '
                      <tr>
                                   
                                  <td>'.$cat_id.'</td>
                                  <td>'.$cat_title.'</td>
                                  <td>
                                 <a href="cats.php?id='.$cat_id.'">
                                 <button  name="del" >Delete</button>
                                 </a>

                                  </td>
                                     <td>
                                 <a href="cats.php?old_id='.$cat_id.'&old_title='.$cat_title.'">
                                 <button  name="update" >Update</button>
                                 </a>

                                  </td>
                                  

                               </tr>
                               ';
                 } 
}