<?php include 'header.php'; 

if (isset($_GET['id'])) {

  $request_id = $_GET['id'];
  $all_requests_sql = mysqli_query( $connection, "SELECT * FROM requests WHERE id = '".$_GET['id']."'");  
  $all_requests_data = mysqli_fetch_array($all_requests_sql);

}
?>

<script>
  function isTrue() {
    <?php
      if(isset($_SESSION['supporter_id'])) {
        $update_requests_sql = mysqli_query( $connection, "UPDATE requests SET supporter_state=1 WHERE id = '".$_GET['id']."'");  
        $update_requests_data = mysqli_fetch_array($update_requests_sql);
      } else if(isset($_SESSION['customer_id'])) {
        $update_requests_sql = mysqli_query( $connection, "UPDATE requests SET customer_state=1 WHERE id = '".$_GET['id']."'");  
        $update_requests_data = mysqli_fetch_array($update_requests_sql);
      }
      
    ?>
  }
</script>
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
                      <?php 
                        if(isset($_SESSION['supporter_id'])) {
                          if ($all_requests_data['supporter_state'] == 0) { ?>
                            <a href="<?=base_url('panel/supporter/room?rid='.$request_id)?>" onclick="isTrue()" class="btn btn-success btn-md col-xs-2 pull-right">Görüşmeyi Başlat</a>
                         <?php } }
                         
                        if(isset($_SESSION['customer_id'])) {
                          if ($all_requests_data['customer_state'] == 0) { ?>
                            <a href="<?=base_url('panel/supporter/room?rid='.$request_id)?>" onclick="isTrue()" class="btn btn-success btn-md col-xs-2 pull-right">Görüşmeyi Başlat</a>
                        <?php } } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /page content -->

<?php include 'footer.php'; ?>