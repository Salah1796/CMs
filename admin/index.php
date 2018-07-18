<?php 

include "includ/Admin_header.php";


?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        
            <!-- /.navbar-header -->
                <?php include "includ/nav-head.php"; ?>     
           
            <!-- /.navbar-top-links -->

            
                  <?php include "includ/nav-left-side.php"; ?>
                </div>
                <!-- /.sidebar-collapse -->
            
            <!-- /.navbar-static-side -->
       

    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Blank</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

 

                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'>
                      
                      <?php
                      $sql="select * from post"; 
                        echo $Pdo_con->getCount($sql);


                      ?>
                  </div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="Admin_posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'>
                         
                      <?php

                      $sql="select * from comments"; 
                        echo $Pdo_con->getCount($sql);


                      ?>

                     </div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="Admin_comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'>
                        <?php
                      
                      $sql="select * from users"; 
                        echo $Pdo_con->getCount($sql);


                      ?>


                    </div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php?op=viewAll">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>
                            <?php
                      
                      $sql="select * from cats"; 
                        echo $Pdo_con->getCount($sql);


                      ?>


                        </div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="cats.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

<div class="row">

<script type="text/javascript">
     /* google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
      */
    </script>
 <!--<div id="columnchart_material" style="width: auto; height: 500px;"></div>-->
</div>


            </div>
            <!-- /.container-fluid -->
        </div>
                       




                        <!-- /.panel-footer -->
                  

   
    <!-- /#wrapper -->

    <!-- jQuery -->
                  <?php include "includ/Admin_footer.php"; ?>
    
</body>

</html>
