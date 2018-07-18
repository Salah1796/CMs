<?php include "includ/Admin_header.php";?>
</style>
<body>

    <div id="wrapper"> 

       
        <?php include "includ/nav-head.php"; ?>

        <?php include "includ/nav-left-side.php";?>
                         
        
                
    <div id="page-wrapper" style="margin-top: 20px; padding: 10px; height: 1300px;"> 
    <?php

                     if(isset($_GET['del_p_id']))
                     {
                            
                         $id=$_GET['del_p_id'];
                          $sql="DELETE FROM post where post_id ='$id'";
                         $Pdo_con->Pdo_IDU($sql);

                        
                         header("location:Admin_posts.php");

                      }

                    

                     if(isset($_GET['up_p_id']))
                     {
                 
                     $_GET['op']="update";
                       
                     }



                    ?>       

<?php                   
     if(isset($_GET['op'])){


            switch ($_GET['op']){
                  
                  case 'add_post':
                              
                       include "includ/add_post.php"; 

                        break;
                  case 'update':
                        {
                            $up_p_id=$_GET['up_p_id'];
                            include "includ/update_post.php";
                                  
                        }
                        
                        break;
                              
                             
                            }
                             
                        }   
                           else
                               include "includ/view_all_post.php";
                                // read_Posts_from_db();
                                //view_all_post.php
                            
                
                            ?>
                             
                                   
      
                    </div>
                    
            
      <?php include "includ/Admin_footer.php"; ?>

</body>

</html>
