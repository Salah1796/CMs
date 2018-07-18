<?php include "includ/Admin_header.php";?>

    


</style>
<body>

    <div id="wrapper"> 

       
        <?php include "includ/nav-head.php"; ?>

        <?php include "includ/nav-left-side.php";?>
                         
        
                
    <div id="page-wrapper" style="margin-top: 20px; padding: 10px; height: 1300px;"> 
<?php
if (isset($_GET['op'])) {

    if($_GET['op']=="add")      include "includ/add_user.php";//Profile
    if($_GET['op']=="Profile")  include "includ/Profile.php"; 
    if($_GET['op']=="viewAll")  include "includ/view_all_users.php"; 

} 
           
 if (isset($_GET['up_user_id'])) {
//echo $_GET['up_user_id'];
include "includ/edit_user.php";  
  }

  

                                
                            
                
  ?>
                             
                                   
      
     </div>
                    
            
      <?php include "includ/Admin_footer.php"; ?>

</body>

</html>
