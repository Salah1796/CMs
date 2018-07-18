<?php include "../includ/Admin_header.php";?>
<body>

    <div id="wrapper"> 

       
        <?php include "../includ/nav-head.php"; ?>

        <?php include "../includ/nav-left-side.php";?>
                         
        </div>
                
            

<?php 

#########  start  Delete cat From DataBase     ############
       
                 del_cat();

#########  end Delete cat From DataBase     ############
       ?>


        <div id="page-wrapper" style="margin-top: 50px;">
            <div class="col-xs-6">
                            <br>
<?php

##############    add cat to DataBase     ############
              
                 insert_cat_in_DB();
        
##############  End  adding  cat to DataBase   ##############
            ?>
         <!--          add Form           -->
         <h3 style="color: red;"><?php 
            if(isset($error))
                echo $error;
            ?>
            
         </h3>
            <form action="" method="Post">
            <div class="form-group">
            <label for="cat_title">Add category</label>
            <input type="text" class="form-control" name="cat_title">
            </div>
            <div class="form-group">
            <input type="submit" name="add" class=" btn btn-primary" value="Add Category">
            </div>
            </form>

            <!--    update Form     -->
            <?php 
             if(isset($_GET['old_id'])){

             $id=$_GET['old_id'];
             $Title=$_GET['old_title'];
             include "../includ/Cat_Update_form.php";

          
         }
         ?>

            </div>

                    <div class="col-xs-6">
                         
                        <table class="table table-borderd table-hover">
                            <thead>
                               <tr>
                                   <th>Category Id</th>
                                   <th>Category Title</th>


                               </tr>
                            </thead>

                            <tbody>
                            <?php
                               //read cats from db and insert in table  
                                 read_cats_from_db();
                
                            ?>
                             
                                   
                            </tbody>
                        </table>
                      
                    </div>
                    </div>





                       
                       




                        <!-- /.panel-footer -->
                  

   
    <!-- /#wrapper -->

    <!-- jQuery -->
      <?php include "../includ/Admin_footer.php"; ?>

</body>

</html>
