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
                      <a href="?cat='.$cat_id.'">'.$row['cat_title'].'</a>
                    </li>';
                 
                     
                     }
                  ?>
            


         
                    
                    
                  </ul>
                </div>
                
                </div>
              </div>
            </div>