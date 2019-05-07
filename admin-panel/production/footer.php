
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Uzaktan Canlı Destek by HEG
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?=BASE_URL?>/admin-panel/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=BASE_URL?>/admin-panel/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=BASE_URL?>/admin-panel/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=BASE_URL?>/admin-panel/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?=BASE_URL?>/admin-panel/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=BASE_URL?>/admin-panel/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=BASE_URL?>/admin-panel/build/js/custom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        var ajax_url = '<?php echo base_url("admin/islem"); ?>';

        function removeCustomer(user_id){
          
          var data = {
              type : "removeCustomer",
              user_id : user_id
          };

          jQuery.ajax({
              type: "POST",
              data: data,
              url: ajax_url,
              success: function(response){
                  
                  if(response == "true"){
                      swal("Başarılı", "Firma bilgileriniz güncelndi!", "success");
                  }else {
                      swal("Hata", "Firma bilgileriniz güncellenirken hata oluştu!", "error");
                  }
              }
          });
        }

        function removeSupporter(supporter_id){
          
          var data = {
              type : "removeSupporter",
              supporter_id : supporter_id
          };

          jQuery.ajax({
              type: "POST",
              data: data,
              url: ajax_url,
              success: function(response){
                  
                  if(response == "true"){
                      swal("Başarılı", "Bakım ekibi üyesi silindi!", "success");
                  }else {
                      swal("Hata", "Bakım ekibi üyesi silinirken hata oluştu!", "error");
                  }
              }
          });
        }

        $(function(){
            $("#company_info_update_btn").click(function(){

                var data = {
                    type : "company_info_update_btn",
                    company_name : $("#company_name").val(),
                    product_name : $("#product_name").val(),
                    company_address : $("#company_address").val(),
                    company_mail : $("#company_mail").val(),
                    company_telephone : $("#company_telephone").val(),
                    company_fax : $("#company_fax").val()
                };

                if (data['company_name'] && data['product_name'] && data['company_address'] && data['company_mail'] && data['company_telephone'] && data['company_fax']) {
                    jQuery.ajax({
                        type: "POST",
                        data: data,
                        url: ajax_url,
                        success: function(response){

                            if(response == "true"){
                                swal("Başarılı", "Firma bilgileriniz güncellendi!", "success");
                            }else {
                                swal("Hata", "Firma bilgileriniz güncellenirken hata oluştu!", "error");
                            }
                        }
                    });
                } else {
                    swal("Hata", "Lütfen tüm alanları doldurunuz!", "error");
                }

            });
        });

        $(function(){
            $("#assign_supporter").click(function(){
                
                var data = {
                    type : "assign_supporter",
                    customer_id : $("#customer_id").val(),
                    supporter_id : $("#supporter_id").val()
                };

                jQuery.ajax({
                    type: "POST",
                    data: data,
                    url: ajax_url,
                    success: function(response){

                        if(response == "true"){
                            swal("Başarılı", "Müşteri Ataması Başarılı", "success");
                        }else {
                            swal("Hata", "Müşteri ataması yapılırken hata oluştu!", "error"); 
                        }
                    }
                });
            });
        });

        $(function(){
            $("#user-info-update-btn").click(function(){
                
                var data = {
                    type : "user-info-update-btn",
                    name : $("#name").val(),
                    surname : $("#surname").val(),
                    email : $("#email").val(),
                    telephone : $("#telephone").val(),
                    user_id : $("#user_id").val(),
                    licence_key : $("#licence_key").val()
                };
                if (data['name'] && data['surname'] && data['email'] && data['telephone']) {
                  jQuery.ajax({
                      type: "POST",
                      data: data,
                      url: ajax_url,
                      success: function(response){

                          if(response == "true"){
                              swal("Başarılı", "Kullanıcı bilgileri güncellendi!", "success");
                          }else {
                              swal("Hata", "Kullanıcı bilgileri güncellenirken hata oluştu!", "error"); 
                          }
                      }
                  });
                } else {
                  swal("Hata", "Tüm bilgileri doldurunuz!", "error");
                }
            });
        });

        $(function(){
            $("#add_supporter").click(function(){
                
                $("#add_supporter").text("Lütfen bekleyin");
                $("#add_supporter").prop("disabled", true);
                
                var data = {
                    type : "add_supporter",
                    name : $("#name").val(),
                    surname : $("#surname").val(),
                    email : $("#email").val()
                };
                if (data['name'] && data['surname'] && data['email']) {
                  jQuery.ajax({
                      type: "POST",
                      data: data,
                      url: ajax_url,
                      success: function(response){

                          $("#register_btn").text("Kaydet");
                          $("#register_btn").prop("disabled", false);

                          if(response == "true"){
                              swal("Başarılı", "Kullanıcı kaydedildi!", "success");
                          }else if(response == 'dupl'){
                              swal("Hata", "Kullanıcı zaten sisteme kayıtlı!", "error");
                          }else {
                              swal("Hata", "Kullanıcı eklenirken hata oluştu!", "error");
                          }
                      }
                  });
                } else {
                  swal("Hata", "Tüm bilgileri doldurunuz!", "error");
                }
            });
        });

        $(function(){
            $("#save_licence_key").click(function(){
                
                var data = {
                    type : "save_licence_key",
                    licence_key : $("#licence_key").val()
                };

                if (data['licence_key']) {

                  jQuery.ajax({
                      type: "POST",
                      data: data,
                      url: ajax_url,
                      success: function(response){

                          if(response != "true"){
                              swal("Hata", "Lisans anahtarı oluşturulurken hata oluştu!", "error"); 
                          }else {
                              swal("Başarılı", "Lisans anahtarı oluşturuldu!", "success");
                              $("#completed_btn").val('');
                          }
                      }
                  });
                } else {
                  swal("Hata", "Lütfen bir lisans anahtarı üretiniz!", "error");
                }
            });
        });

        /*$(function(){
            $("#completed_btn").click(function(){
                var data = {
                    type : "completed_btn",
                    compid : '<?=$request_id?>'
                };

                jQuery.ajax({
                    type: "GET",
                    data: data,
                    url: ajax_url,
                    success: function(response){
                        alert(response);

                        if(response != "true"){
                            swal("Hata", "Talep tamamlanamadı!", "error"); 
                        }else {
                            swal("Başarılı", "Talep başarıyla tamamlandı!", "success");
                            $("#completed_btn").hide();
                        }
                    }
                });
            });
        });*/
        
    </script>

    <script>
      
      function dec2hex (dec) {
        return ('0' + dec.toString(16)).substr(-2)
      }

      // generateId :: Integer -> String
      function generateId (len) {
        var arr = new Uint8Array((len || 40) / 2)
        window.crypto.getRandomValues(arr)
        return Array.from(arr, dec2hex).join('')
      }

      $("#create_licence_key").on('click', function(e) {
          var d = new Date();
          var n = generateId();
          $("#licence_key").val(n);
       });

    </script>
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
  </body>
</html>