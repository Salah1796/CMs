 <form action="" method="Post">
            <div class="form-group">
            <label for="new_title">New  category</label>
            
           
            

            <input type="text " name="oldCat_id"  hidden=""  value=
            <?php

        if(isset($id)) echo "$id";


         ?>> 

           
            <input type="text" class="form-control" name="new_title"

            value=
            <?php

        if(isset($Title)) echo "$Title";


         ?>> 
        </div>
            <div class="form-group">
            <input type="submit" name="update" class=" btn btn-primary" value="Update">
            </div>
            </form>
            <?php 
            ##############   Update cat in DataBase     ############
            if(isset($_POST['update']))
            {
                  

                 
                $newCat_title=$_POST['new_title'];
                $id=$_POST['oldCat_id'];

                if($newCat_title!="")
                {
             $sql="UPDATE cats  SET cat_title ='$newCat_title'  WHERE  cat_id ='$id'";
                 
                 if($res=mysqli_query($con,$sql))
                 {
                    echo "<script>alert('Sucssesfuly Updated')</script>";
                    //header("location:cats.php");
                  //header("location:cats.php");
                }
                else
                     echo "<script>alert('error in databeses')</script>";
            }
            else  echo "<script>alert('can not Updated empty category')</script>";
       
            header("location:cats.php ");
            }



            ?>