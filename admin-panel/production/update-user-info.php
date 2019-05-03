<?php include 'header.php'; 

  if (isset($_GET['id'])) {
      $all_customers_sql = mysqli_query( $connection, "SELECT * FROM customers WHERE id = '".$_GET['id']."'");
      $all_supporter_data = mysqli_fetch_array($all_customers_sql);
  }
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kullanıcı Bilgilerini Güncelle</h2>

            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            <!-- Div İçerik Başlangıç -->
            <div class="row">
              
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" name="name" id="name" placeholder="Adı" value="<?=$all_supporter_data['name']?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="surname"name="surname"  placeholder="Soyadı" value="<?=$all_supporter_data['surname']?>">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" name="email" id="email" placeholder="E-Posta" value="<?=$all_supporter_data['email']?>">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telefon Numarası" value="<?=$all_supporter_data['telephone']?>">

                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                       <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?=$all_supporter_data['id']?>">

                      <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                          <label class="col-md-12">Lisans Anahtarı</label>
                          <input type="text" class="form-control" name="licence_key" readonly="readonly" value="<?=$all_supporter_data['licence_key']?>">
                      </div>
                      
                      <div class="form-group">
                        <button id="user-info-update-btn" class="btn btn-success pull-right" name="user-info-update-btn">Güncelle</button>
                      </div>

                    </div>
                  </div>
                </div>
         
          </div>

        </div>

<?php include 'footer.php'; ?>
