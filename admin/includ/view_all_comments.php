<h2 align="center" style="margin-bottom: 20px; font-family: cursive;">View All Comments
</h2> 
            <table class="table table-borderd table-hover">
                            <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Author</th>
                                   <th>comment</th>
                                   <th>Email</th>
                                   <th>Status</th>
                                   <th>In Response to</th>
                                   <th>Date</th>
                                   <th>Approve</th>
                                   <th>Unapprove</th>
                                   <th>Delete</th>
                                   <th>Update</th>


                                 



                               </tr>
                            </thead>

                            <tbody>
         <?php


                  $sql="select * from comments ";
                  $res=mysqli_query($con,$sql);
                 
                  while ($row=mysqli_fetch_assoc($res)) {
                   
                    $id=$row['comment_id'];
                    $comment_post_id=$row['comment_post_id'];
                    $comment_author=$row['comment_author'];
                    $comment_email=$row['comment_email'];
                    $comment_content=$row['comment_content'];
                    $comment_status=$row['comment_status'];
                    $comment_date=$row['comment_date'];
                 //read post tiltle 
                $q="select post_title from post where post_id ='$comment_post_id' ";
                  $result=$Pdo_con->read_row($q,array());
                     echo '
                      <tr>
                                   
                            <td>'.$id.'</td>
                            <td>'.$comment_author.'</td>
                            <td>'.$comment_content.'</td>
                            <td>'.$comment_email.'</td>
                            <td>'.$comment_status.'</td>
                            <td><a href="../Post/post.php?id='.$comment_post_id.'">'. $result['post_title'].'</td>
                                  
                                  <td>'.$comment_date.'</td>
                                  <td><a href="?approve='.$id.'">Approve</a></td>
                                  <td><a href="?unapprove='.$id.'">Unapprove</a></td>

                                  <td><a href="?del_com_id='.$id.'">Delete</a></td>
                                  <td><a href="?up_com_id='.$id.'">Update</a></td>
                                 


                              

                                  
                                  

                               </tr>
                               ';



                 }
                 ?>
                 </tbody></table>