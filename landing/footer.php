<!-- ***** Footer Area Start ***** -->
    <footer class="footer-area section-padding-80-0" id="contactSection">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Bizimle İletişime Geçin</h4>

                        <!-- Footer Content -->
                        <div class="footer-content mb-15">
                            <h3>(+90) 216 5555</h3>
                            <p>Ziya Pasa Caddesi 12/37 Karakoy, Istanbul <br> uzaktancanlidestek@gmail.com</p>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Kaynaklar</h4>

                        <!-- Nav -->
                        <nav>
                            <ul class="our-link">
                                <li><a href="#">Gizlilik Politikası</a></li>
                                <li><a href="#">Kullanım Şartları</a></li>
                                <li><a href="#">İletişim</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Hakkımızda</h4>
                        <p>Misyonumuz? Müşteri ilişkilerinizi en iyi hale getirmeniz için size yardımcı olmaktan gurur duyan
                        çok çalışkan ve azimli, çok uluslu bir takımız!</p>

                        <!-- Copywrite Text -->
                        <div class="copywrite-text mb-30">
                            <p>&copy;Copyright 2019 <a href="#">HEG</a>.</p>
                        </div>

                        <!-- Social Info -->
                        <div class="footer-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>

            </div>

 <div class="row" style="margin-bottom: 30px;">
                
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tüm hakları saklıdır.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>

        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->
    <!-- jQuery js -->
    <script src="<?=BASE_URL?>/landing/js/jquery.min.js"></script>
    <!-- Popper js -->
    <script src="<?=BASE_URL?>/landing/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?=BASE_URL?>/landing/js/bootstrap.min.js"></script>
    <!-- All js -->
    <script src="<?=BASE_URL?>/landing/js/uza.bundle.js"></script>
    <!-- Active js -->
    <script src="<?=BASE_URL?>/landing/js/default-assets/active.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        var ajax_url = '<?php echo base_url("islem"); ?>';
        $(function(){
            $("#register_btn").click(function(){

                $("#register_btn").text("Lütfen bekleyin");
                $("#register_btn").prop("disabled", true);
                
                var data = {
                    type : "register",
                    name : $("#name").val(),
                    surname : $("#surname").val(),
                    email : $("#email").val(),
                    telephone : $("#telephone").val(),
                    licence_key : $("#licence_key").val()
                };

                if (data['name'] && data['surname'] && data['email'] && data['telephone'] && data['licence_key']) {
                    jQuery.ajax({
                        type: "POST",
                        data: data,
                        url: ajax_url,
                        success: function(response){

                            $("#register_btn").text("Kayıt Ol");
                            $("#register_btn").prop("disabled", false);

                            if(response == "duplicate"){
                                swal("Hatalı Kayıt", "Bu kullanıcı zaten sistemimize kayıtlı!", "error");
                            }else if (response == "error") {
                                swal("Hatalı Kayıt", "Lütfen bilgilerinizi kontrol ediniz!", "error");
                            }else if(response == "ok"){

                                swal("Kayıt Başarılı", "Sisteme erişebilmeniz için gerekli bilgiler tarafınıza mail yoluyla gönderilecektir!", "success").then((value) => {
                                    window.location = '<?php echo base_url("login"); ?>';
                                });
                            }
                        }
                    });
                } else {
                    swal("Bilgiler Hatalı", "Lütfen girdiğiniz bilgileri kontrol ediniz!", "error");
                }

            });
        });
    </script>

</body>

</html>