

<head>
    
<style type="text/css">
    
.error
{
color: red;

}

</style>

</head>
<?php 
if(isset($_POST['add']))
{

$post_title_error=$post_cat_id_error=$post_author_error=$post_content_error=$File_error ="";
$errors=array();
if (empty($_POST["post_title"]))
 {
    $post_title_error = "post title is required";
    $errors['post_title_error']="post title is required";
  } 
  else
   {
    $post_title=$_POST['post_title'];
  }


if (!isset($_POST['cats']))
{
 $post_cat_id_error = "post category   is required";
 $errors['post_cat_id_error']="post category  is required";
} 
 else
   {
   // $post_cat_id_error=$_POST['cats'];
    $post_cat_id=$_POST['cats'];
  }

  if (empty($_POST['post_author']))
   {
    $post_author_error = "post author is required";
    $errors['post_author_error']="post author  Id  is required";

  } 
  else
   {
   $post_author=$_POST['post_author'];

  }

  if (empty($_POST['post-content']))
   {
    $post_content_error = "post content is required";
    $errors['post_content_error']="post content is required";

  } 
  else
   {
    $post_content=$_POST['post-content'];
  }

$post_status=$_POST['post_status'];
$post_tages=$_POST['post_tages'];

$post_date=date("Y-m-d");



if ($_FILES['post_image']['error'] > 0) 

$File_error .= 'Sorry, there was an error in uploading the file';
 
//if ($_FILES['post_image']['type'] != 'image/png' ) 

    //$File_error .= 'Only .png files are allowed';

//if ($_FILES['post_image']['size'] >  51200) 

    //$File_error .= 'Files size should be less than 50KB';

    

if ($File_error =="" && count($errors)==0) 
    {
   
    $q="SELECT post_id FROM post ORDER BY post_id DESC LIMIT 1";
    
       $res=$Pdo_con->read_row($q);
       $last_id=$res['post_id'];
        $last_id++;

        $post_image=$last_id.".png"; //from user x.png
        $post_image_path_in_server="..//imgs/Post_imgs/".$last_id.".png";
 //$post_image_name_in_server=$last_id.".png";
        move_uploaded_file($_FILES['post_image']['tmp_name'],$post_image_path_in_server);
          

        /*($post_cat_id,$post_title,
            $post_author,$post_date,$post_image_name_in_server,$post_content,$post_tages,$post_com_counter,$post_status);*/
    $sql="insert into post(post_cat_id,post_title,post_author,post_date,post_image,post_content,post_tages,post_status)";
 $sql.="values('$post_cat_id','$post_title',
            '$post_author','$post_date','$post_image','$post_content','$post_tages','$post_status')";
            $Pdo_con->Pdo_IDU($sql,array());
          header("location:Admin_posts.php");
    }
    else
        echo "<script>alert('There are erors or missing information')</script>";


   // echo $File_error;
}
?>
<div class="col-xs-12" style="height: auto; margin-top: 10px; 
">
<h2 align="center" style="margin-bottom: 20px; font-family: cursive;">Add Post</h2>
 <form action="" method="POST"  enctype="multipart/form-data" >


            <div class="form-group">

            <label for="post_title">Post Title</label>
            <input type="text" class="form-control" name="post_title">
            <span class="error">* <?php  if(isset($post_title_error))echo $post_title_error;?></span>
        </div>
        <div class="form-group">
             
              
            <label for="cats">Post Category </label>
            <select  name="cats" >
            
                 <?php 
                 $sql="select * from cats ";
             $res=$Pdo_con->read_rows($sql,array());
           
  foreach($res as $record) {              
               echo '<option value='.$record['cat_id'].'>'.$record["cat_title"].'</option>';
            }
                
                ?>  
            </select>
           
            <span class="error">* <?php  if(isset($post_cat_id_error))echo $post_cat_id_error;?></span>
        </div>
        <div class="form-group">
            <label for="post_author">Post Author</label>
            <input type="text" class="form-control" name="post_author">
            <span class="error">* <?php  if(isset($post_author_error))echo $post_author_error;?></span>
</div>
<div class="form-group">
            <label for="post_status">Post Status</label>
            <input type="text" class="form-control" name="post_status">
</div>
   
<div class="form-group">
     
            <label for="post_image">Post Image</label>
            <input type="file" class="form-control" name="post_image">
</div>
<div class="form-group">
            <label for="post_tages">Post Tages</label>
            <input type="text" class="form-control" name="post_tages">
</div>
<div class="form-group">
            <label for="post-content">Post Content</label>
            <textarea style="max-width: 100%; height: 300px;" class="form-control" name="post-content"></textarea>
            <span class="error">* <?php  if(isset($post_content_error))echo $post_content_error;?></span>
</div>
<div class="form-group">
<input type="submit" name="add" value="Add Post" class="btn btn-primary" style="width: 90% ;margin-left: 5%; height: 40px;">
            
</div>
            
            




            </form>
        </div>

        
  

          


                       

