<?php include 'header.php'; 
  $supporter_id = $_GET['id'];
  $supporter_sql = mysqli_query($connection, "SELECT name, surname FROM supporters WHERE id = '$supporter_id'");
  $supporter_data = mysqli_fetch_array($supporter_sql);

  $customers_sql = mysqli_query( $connection, "SELECT id, name, surname, email FROM customers");
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Müşteri Ataması Yap</h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div>
              <div class="col-md-6">
                <div class="row">
                  <div class="form-group col-md-12">
                  <p><b><?=$supporter_data['name']." ".$supporter_data['surname']?></b> isimli bakımcıya atama yapıyorsunuz:</p>
                    <label for="inputState">Tüm Müşteriler</label>
                    <select id="customer_id" name="customer_list" class="form-control">
                      <?php while ($customers_data = mysqli_fetch_array($customers_sql)) { ?>
                        <option value="<?=$customers_data['id']?>" ><?=$customers_data['name']." ".$customers_data['surname']?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="form-group col-md-4 pull-right">
                    <input type="hidden" id="supporter_id" name="supporter_id" class="form-group" value="<?=$_GET['id']?>">
                    <button id="assign_supporter" name="assign_supporter" class="btn btn-success form-control">Atama yap</button>
                  </div>
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