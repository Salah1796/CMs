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

     header("location:cats.php ");
          

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
  //if($con) echo "okk";
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

function add_post_in_db($post_cat_id,$post_title,$post_author,$post_date,$post_image,$post_content,$post_tages,$post_com_counter,$post_status)
{
 global $con;
 
         IDU($sql);
            /* if($res=mysqli_query($con,$sql))
                 {

                   echo "<script>alert('Sucssesfuly add')</script>";
             // 
                }
                else
                {
                      die(mysqli_error($con));
}
*/
}
//
function Del_Post($id)
{
     global $con;
            $sql="DELETE FROM post where post_id ='$id'";
         IDU($sql);
                 
                /* if($res=mysqli_query($con,$sql))

                 echo "<script>alert('Sucssesfuly Deleted :)')</script>";
                      
                else
                     echo "<script>alert('error in databeses')</script>";
              */
           
           
      }
   

function update_post($post_cat_id,$post_title,$post_author,$post_date,$post_image,$post_content,$post_tages,$post_com_counter,$post_status,
  $up_post_id)
{
  global $Pdo_con;
  
    $sql="update post set 
 post_cat_id='$post_cat_id',
 post_title='$post_title',
 post_author='$post_author',
 post_date='$post_date',
 post_image='$post_image',
 post_content='$post_content',
 post_tages='$post_tages',
 post_com_counter='$post_com_counter' where post_id='$up_post_id'";
 $stmt = $Pdo_con->Pdo_IDU($sql,array());    //Prepare function
//$stmt->execute();                // execute the query
//if($stmt->rowCount() =0)
 // echo "<script>alert('error in databeses')</script>";
                //  echo mysqli_error($con);
            
                header("location:Admin_posts.php");
}





 
