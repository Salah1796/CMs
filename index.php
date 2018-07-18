<?php 
session_start();
include  "Plog/includ/header.php";

//include 
?>

  <body>

    <!-- Navigation -->
     <?php include "Plog/includ/nav.php";?>
<header class="masthead" style="background-image: url('imgs/home-bg.jpg')">
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
 $sql="select * from post";
if(isset($_GET['cat']))
 {

    $cat_id=$_GET['cat']; 
    $sql="select * from post where `post_cat_id` ='$cat_id'";
}
$res=mysqli_query($con,$sql); 
         if(mysqli_num_rows($res) ==0)   
          echo "<h3>No Post For This Category ):</h3>";
  while ($row=mysqli_fetch_assoc($res)) {

      $post_id=$row['post_id'];
      $img_src=$row['post_image'];
      $Post_Title=$row['post_title'];
      $post_content=substr($row['post_content'], 0,20);
      $post_author=$row['post_author'];
      $post_date=$row['post_date'];
         echo '<div class="">
<h2 class="card-title"><a href="Post/post.php?id='.$post_id.'">'.$Post_Title.'</a></h2>
 <h5>Posted on '.$post_date.' </h5>
 <h4> by <a href="#">'.$post_author.'</a></h4>
            <img class="card-img-top" src="imgs/Post_imgs/'.$img_src.'" alt="Card image cap">
            <div class="card-body">
             
              <p class="card-text">'.$post_content.'</p>
                <a href="Post/post.php?id='.$post_id.'" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
             

            </div>
          </div>';
        }?>
       

         

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
      <?php include "Plog/includ/Sidebar.php"; ?>
    <?php include "Plog/includ/cats.php"; ?>
    <?php include "Plog/includ/Widget.php" ;?>
        
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
 <?php 
include "Plog/includ/footer.php";

?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
