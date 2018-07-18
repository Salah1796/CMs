<?php include "includ/Admin_header.php";?>

    


</style>
<body>

    <div id="wrapper"> 

       
        <?php include "includ/nav-head.php"; ?>

        <?php include "includ/nav-left-side.php";?>
                         
        
                
    <div id="page-wrapper" style="margin-top: 20px; padding: 10px; height: 1300px;"> 
<?php

     if(isset($_GET['del_com_id'])){

                            
          
          $del_com_id=$_GET['del_com_id'];
          $sql="DELETE FROM comments where comment_id ='$del_com_id'";
          $Pdo_con->Pdo_IDU($sql,array());     
                  

        }
         if(isset($_GET['approve'])){

                            
          
          $approv_com_id=$_GET['approve'];
          $sql="update comments set comment_status='approved' where comment_id ='$approv_com_id'";
          $Pdo_con->Pdo_IDU($sql,array());     
                

        }
     if(isset($_GET['unapprove'])){

                            
          
          $unapprov_com_id=$_GET['unapprove'];
          $sql="update comments set comment_status='unapproved' where comment_id ='$unapprov_com_id'";
          $Pdo_con->Pdo_IDU($sql,array());     
                  

        }


    if(isset($_GET['up_com_id'])){
                 
        $_GET['op']="update";
                       
        
        }


include "includ/view_all_comments.php";
                                
                            
                
  ?>
                             
                                   
      
     </div>
                    
            
      <?php include "includ/Admin_footer.php"; ?>

</body>

</html>
