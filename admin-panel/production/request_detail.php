<?php include 'header.php'; 

if (isset($_GET['id'])) {
  
  $request_id = $_GET['id'];
  $all_requests_sql = mysqli_query( $connection, "SELECT * FROM requests WHERE id = '$request_id'");
  $all_requests_data = mysqli_fetch_array($all_requests_sql);

}
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Talep Açıklaması</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$all_requests_data['request_title']?><small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
              
                    <div class="col-md-12 col-lg-12 col-sm-12">
                      <!-- blockquote -->
                      <blockquote>
                        <p><?=$all_requests_data['request_content']?></p>
                      </blockquote>
                      <?php if ($all_requests_data['state'] == "Tamamlanmadı") { ?>
                        <button id="completed_btn" class="btn btn-primary btn-md col-xs-2 pull-right">Tamamla</button>
                      <?php } ?>
                      <a href="<?=base_url('panel/supporter/chat')?>" class="btn btn-success btn-md col-xs-2 pull-right">İletişime Geç</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /page content -->

<?php include 'footer.php'; ?>