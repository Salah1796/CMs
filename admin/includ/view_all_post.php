<h2 align="center" style="margin-bottom: 20px; font-family: cursive;">View All Posts
</h2> 
            <table class="table table-borderd table-hover">
                            <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Author</th>
                                   <th>Title</th>
                                   <th>Category</th>
                                   <th>Status</th>
                                   <th>Image</th>
                                   <th>Tages</th>
                                   <th>Comment</th>
                                   <th>Date</th>



                               </tr>
                            </thead>

                            <tbody>
         <?php


                  $sql="select * from post ";
                  $res=mysqli_query($con,$sql);
                  $rows=mysqli_num_rows($res);
                  while ($row=mysqli_fetch_assoc($res)) {
                    $id=$row['post_id'];
                    $title=$row['post_title'];
                    $cat_id=$row['post_cat_id'];
                    
                  $sql2="select * from cats where cat_id='$cat_id' ";
                 $res2=mysqli_query($con,$sql2);
                 $cat_title=mysqli_fetch_assoc($res2)['cat_title'];
                    $author=$row['post_author'];
                    $date=$row['post_date'];
                    $image=$row['post_image'];

                    $content=$row['post_content'];
                    $tages=$row['post_tages'];
                    $status=$row['post_status'];
                    $com_counter=$row['post_com_counter'];
                    /*
                                   
                                   
                                 
                                   <th>Id</th>
                                   <th>Author</th>
                                   <th>Title</th>
                                   <th>Category</th>
                                   <th>Status</th>
                                   <th>Image</th>
                                   <th>Tages</th>
                                   <th>Comment</th>
                                   <th>Date</th>

                    */
                     echo '
                      <tr>
                                   
                                  <td>'.$id.'</td>
                                  <td>'.$author.'</td>
                                  <td><a href="../Post/post.php?id='.$id.'">'.$title.'</td>
                                
                                  <td>'.$cat_title.'</td>
                                  <td>'.$status.'</td>
                                  <td><img width=40; height=30; src=..//imgs/Post_imgs/'.$image.'></img></td>
                                  <td>'.$tages.'</td>
                                  <td>'.$com_counter.'</td>
                                  <td>'.$date.'</td>
                                  <td><a href="?del_p_id='.$id.'">Delete</a></td>
                                  <td><a href="?up_p_id='.$id.'">Update</a></td>


                              

                                  
                                  

                               </tr>
                               ';



                 }
                 ?>
                 </tbody></table>