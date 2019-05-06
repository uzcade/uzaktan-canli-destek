<?php include 'header.php'; 

$all_licence_keys_sql = mysqli_query( $connection, "SELECT * FROM licence_keys ORDER BY id DESC");

?>

<!-- page content -->
<div class="right_col" role="main">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Lisans Anahtarları</h2>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
              <div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                      <input type="text" readonly="readonly" class="form-control" id="licence_key" name="licence_key" placeholder="Lisans anahtarı">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-group col-md-8">
                    <div class="col-md-6">
                      <button id="save_licence_key" name="save_licence_key" class="btn btn-success form-control">Anahtarı Kaydet</button>
                    </div>
                    <div class="col-md-6">
                      <button type="button" id="create_licence_key" name="create_licence_key" class="btn btn-success form-control">Anahtar Oluştur</button>
                    </div>
                  </div>
                </div>
              </div>

              <br>
              <br>
    
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Lisans ID</th>
                    <th>Lisans Numarası</th>
                    <th>Durum</th>
                  </tr>
                </thead>
    
              <tbody>               
                <?php while ($all_licence_keys_data = mysqli_fetch_array($all_licence_keys_sql)) { ?>
                    <tr>
                      <td><?=$all_licence_keys_data['id']?></td>
                      <td><?=$all_licence_keys_data['licence_key']?></td>
                      <td>
                        <?php if ($all_licence_keys_data['state'] == 0) { ?>
                          <span>Boş</span>
                        <?php } else { ?>
                          <span>Dolu</span>
                        <?php } ?>  
                      </td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  
<?php include 'footer.php'; ?>