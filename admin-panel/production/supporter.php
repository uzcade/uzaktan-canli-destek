<?php include 'header.php'; 
$request_count_sql = mysqli_query($connection,"SELECT * FROM  requests");
$request_count_sql_data = mysqli_num_rows($request_count_sql);

$customer_count_sql = mysqli_query($connection,"SELECT * FROM  customers");
$customer_count_sql_data = mysqli_num_rows($customer_count_sql);

$supporter_count_sql = mysqli_query($connection,"SELECT * FROM  supporters");
$supporter_count_sql_data = mysqli_num_rows($supporter_count_sql);
?>
        <!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Anasayfa<small>
              </small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <!-- Button trigger modal -->

                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-pencil"></i>
                          </div>
                          <div class="count"><?=$request_count_sql_data?></div>

                          <h3>Açılan Talep</h3>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-users"></i>
                          </div>
                          <div class="count"><?=$customer_count_sql_data?></div>

                          <h3>Müşteri</h3>
                        </div>
                      </div>
                      
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-weixin"></i>
                          </div>
                          <div class="count"><?=$supporter_count_sql_data?></div>

                          <h3>Bakımcı</h3>
                        </div>
                      </div>
                    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<?php include 'footer.php'; ?>