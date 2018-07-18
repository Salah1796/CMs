<?php
include 'includ/Post_head.php';
include '../Plog/includ/nav.php';
if(isset($_GET['id']))
{
    
    $post_id=$_GET['id'];


    //read Post From database
    $sql="select * from post where post_id ='$post_id'";
                               
   $row = $Pdo_con->read_row($sql,array()); 
  
    $title=$row['post_title'];
    $cat_id=$row['post_cat_id'];
   
    $sql2="select * from cats where cat_id='$cat_id' ";
     $cat = $Pdo_con->read_row($sql2,array());
                                 
    
    ; 
    $cat_title=$cat['cat_title'];
    $author=$row['post_author'];
    $date=$row['post_date'];
    $image=$row['post_image'];
    $content=$row['post_content'];
    $tages=$row['post_tages'];
    $status=$row['post_status'];
    $com_counter=$row['post_com_counter'];

///read post comments from database
    $q="select * from comments where comment_post_id ='$post_id' and comment_status ='approved'";
    $comments=$Pdo_con->read_rows($q,array());

 


?>




  <body>

    <!-- Navigation -->
    
<header class="masthead" style="background-image: url('../imgs/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
             
             
            </div>
          </div>
        </div>
      </div>
    </header>
  <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo "$title";?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo  $author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
          <p><span class="glyphicon glyphicon-time"></span><?php  echo "$date";?></p>

                <hr>

                <!-- Preview Image -->
    <img width=700px; class="img-responsive" src="../imgs/Post_imgs/<?php echo $image; ?>" alt="">

                <hr>

                <!-- Post Content -->
  <p class="lead"><?php echo  $content;?></p>
                
                

                <hr>

                <!-- Blog Comments -->
              <!-- Get Comment Form Data-->
<?php
  if(isset($_POST['submit_comment'])){
    

 #insert comment in Database

   $Com_content= $_POST['Comment'];
   $Com_author= $_POST['Comment_author'];
   $Com_email= $_POST['Comment_email'];
   $Com_post_id=$post_id;
   $Com_date=date('Y-m-d'); 
 

   $sql="INSERT INTO  comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)";
   $sql.="values('$Com_post_id','$Com_author','$Com_email', '$Com_content','unapproved','$Com_date')";  
   $Pdo_con->Pdo_IDU($sql,array());

   //increment comment number for this post
   //
   
  $q="update post set `post_com_counter`=`post_com_counter`+1 where post_id='$post_id'";
             $Pdo_con->Pdo_IDU($q,array());
           
  }


 ?>

                <!-- Comments Form -->
                <?php if (isset($_SESSION['username'])) {
               ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="Post">

                    <div class="form-group">

                    <label for="Comment_author">Author</label>
                    <input type="text" class="form-control" name="Comment_author">

                        </div>

                    <div class="form-group">

                    <label for="Comment_email">Email</label>
                     <input type="text" class="form-control" name="Comment_email"> 

                    </div>
                        <div class="form-group">

                         <label for="Comment">Your Comment</label>
                          <textarea class="form-control" class="form-control" rows="3" name="Comment"></textarea>

                        </div>

                        <button class="btn btn-primary" name="submit_comment">Submit</button>
                    </form>
                </div>

                <hr>

              <?php 
            }

              ?>

                <!-- Comment -->

            <?php
                foreach ($comments as $com) {
                 
                     $comment_author=$com['comment_author'];
                     $comment_content=$com['comment_content'];
                     $comment_date=$com['comment_date'];

                       



              



                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>&nbsp;&nbsp;&nbsp;
                    <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date;?></small>
                        </h4>
                        <?php echo $comment_content;?>
                        <!-- Nested Comment
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        End Nested Comment -->

                    </div>
                </div><br>
                <?php } ?>
</div>

        

            <!-- Blog Sidebar Widgets Column -->
       


   <div class="col-md-4">
<?php 
//include "config.php";

  ?>
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
          <!-- Categories Widget -->



          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">
                  <?php
             $sql="select * from cats LIMIT 6";
             $res=mysqli_query($con,$sql);
              //$//rows=mysqli_num_rows($res);
             while ($row=mysqli_fetch_assoc($res)) {
              $cat_id=$row['cat_id'];
              echo '
              <li>
                      <a href="http://localhost/cms/Plog/index.php?cat='.$cat_id.'">'.$row['cat_title'].'</a>
                    </li>';
                 
                     
                     }
                  ?>
            


         
                    
                    
                  </ul>
                </div>
                
                </div>
              </div>
            </div>
       

          <!-- Side Widget -->
         <?php include "../Plog/includ/Widget.php" ;?>
        </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php

}
else
header("location:../");
?>