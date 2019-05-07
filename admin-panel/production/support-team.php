<?php include 'header.php'; 

$all_supporter_sql = mysqli_query( $connection, "SELECT * FROM supporters");

?>

<!-- page content -->
<div class="right_col" role="main">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Bakım Ekibi</h2>
  
              <div class="clearfix"></div>
  
              <div align="right">
                <a href="<?=base_url('panel/admin/add/support-member')?>"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>
              </div>

              <?php if (isset($_GET['state']) && $_GET['state'] == "true" ) { ?>
                <div class="alert alert-success col-3" role="alert" alert-dismissible>
                  Bakım elemanı başarıyla silindi!
                  <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div> 
              <?php } else if (isset($_GET['state']) && $_GET['state'] == "false" ) { ?>
                <div class="alert alert-danger col-3" role="alert" alert-dismissible>
                  Bakım elemanı silinirken hata oluştu!
                  <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div> 
              <?php } ?>
            </div>

            <div class="x_content">

            <!-- Div İçerik Başlangıç -->
  
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>İsim Soyisim</th>
                  <th>E-Posta</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
  
          <tbody>               
            <?php while ($all_supporter_data = mysqli_fetch_array($all_supporter_sql)) { ?>
                <tr>
                  <td><?=$all_supporter_data['id']?></td>
                  <td><?=$all_supporter_data['name']." ".$all_supporter_data['surname']?></td>
                  <td><?=$all_supporter_data['email']?></td>
                  <td><center><a class="btn btn-warning btn-xs" href="<?=base_url('panel/admin/assign?id='.$all_supporter_data['id'])?>">Atama Yap</a></center></td>
                  <td><center><button onclick="removeSupporter(<?=$all_supporter_data['id']?>)" class="btn btn-danger btn-xs">Sil</button></center></td>
                </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      
<?php include 'footer.php'; ?>