<?php include 'header.php'; 
  $all_company_info_sql = mysqli_query( $connection, "SELECT * FROM company");
  $all_company_data = mysqli_fetch_array($all_company_info_sql);
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Firma Bilgileri<small>
              </small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Firmadı Adı<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="company_name" name="company_name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$all_company_data['company_name']?>">
                  </div>
                </div> 
  
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Adı<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="product_name" name="product_name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$all_company_data['product_name']?>">
                  </div>
                </div>
  
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adres<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="company_address" name="company_address" required="required" class="form-control col-md-7 col-xs-12" value="<?=$all_company_data['company_address']?>">
                  </div>
                </div>
  
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">E-Posta Adresi<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" id="company_mail" name="company_mail"  required="required" class="form-control col-md-7 col-xs-12" value="<?=$all_company_data['company_mail']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Telefon Numarası<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="company_telephone" name="company_telephone"  required="required" class="form-control col-md-7 col-xs-12" value="<?=$all_company_data['company_telephone']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Fax Numarası<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="company_fax" name="company_fax"  required="required" class="form-control col-md-7 col-xs-12" value="<?=$all_company_data['company_fax']?>">
                  </div>
                </div>
  
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button id="company_info_update_btn" name="company_info_update_btn" class="btn btn-success">Güncelle</button>
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