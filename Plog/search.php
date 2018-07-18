<?php 
include  "includ/header.php";

?>
  <body>

    <!-- Navigation -->
     <?php include "includ/nav.php";?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>

          <!-- Blog Post -->

     <?php
    
     
      
      $tag=$_POST["Search"];
       $sql="select * from post where post_tages like '%$tag%'";
       $Search_res=mysqli_query($con,$sql);
      $rows=mysqli_num_rows($Search_res);

       if ($rows==0) 

      echo "<br><h2 class='card-title'>No Result</h2><br><br>";

      else
      {
    //include "config.php";
   
    while ($row=mysqli_fetch_assoc($Search_res)) {
      $img_src=$row['post_image'];
      $Post_Title=$row['post_title'];
      $post_content=$row['post_content'];
      $post_author=$row['post_author'];
      $post_date=$row['post_date'];
         echo '<div class="">
<h2 class="card-title"><a href="#">'.$Post_Title.'</a></h2>
 <h5>Posted on '.$post_date.' </h5>
 <h4> by <a href="#">'.$post_author.'</a></h4>
            <img class="card-img-top" src="..//imgs/Post_imgs/'.$img_src.'" alt="Card image cap">
            <div class="card-body">
             
              <p class="card-text">'.$post_content.'</p>
                <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
             

            </div>
          </div>';


    }}





    ?>

         

         

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
     <?php include "includ/Sidebar.php"; ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
 <?php 
include "includ/footer.php";

?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
