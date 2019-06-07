<?php include 'header.php'; 
if(isset($_SESSION['customer_id'])){
  $all_requests_sql = mysqli_query($connection, "SELECT * FROM requests WHERE customer_id='".$_SESSION['customer_id']."'");
}
?>
  <!-- page content -->
<div class="right_col" role="main">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tüm Talepler</h2>
  
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
  
              <!-- Div İçerik Başlangıç -->
  
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>İsim Soyisim</th>
                  <th>Talep Başlığı</th>
                  <th>Talep Tarihi</th>
                  <th>Durum</th>
                  <th></th>
                </tr>
              </thead>
  
          <tbody>               
            <?php while ($all_requests_data = mysqli_fetch_array($all_requests_sql)) { ?>
                <tr>
                  <td><?=$all_requests_data['id']?></td>
                  <td><?=$all_requests_data['customer_fullname']?></td>
                  <td><?=$all_requests_data['request_title']?></td>
                  <td><?=$all_requests_data['request_date'] ?></td>
                  <td><?=$all_requests_data['state'] ?></td>
                  <td><center><a href="<?=base_url('panel/supporter/request/detail?id='.$all_requests_data['id'])?>" class="btn btn-primary btn-xs">Detayları Gör</center></td>
                </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
  
        <!-- /page content -->
        
<?php include 'footer.php'; ?>