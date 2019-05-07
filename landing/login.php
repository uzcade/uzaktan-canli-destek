<?php include 'header.php'; ?>

    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Giriş Yap</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Giriş Yap</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Curve -->
        <div class="breadcrumb-bg-curve">
            <img src="<?=BASE_URL?>/landing/img/core-img/curve-5.png" alt="">
        </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->

    <!-- ***** Contact Area Start ***** -->
    <section class="uza-contact-area section-padding-40">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Contact Form -->
                <div class="col-12 col-lg-8">
                    <div class="uza-contact-form mb-80">
                        <div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control mb-30" name="email" placeholder="Email" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control mb-30" name="password" placeholder="Şifre" required="required">
                                    </div>
                                </div>
                                <div class="col-8">
                                   <button id="submit" class="btn uza-btn btn-3 mt-15 pull-right" name="login" value="Giriş Yap">Giriş Yap</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Area End ***** -->

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
                            <p>Ziya Pasa Caddesi 12/37 Karakoy, Istanbul <br> ucanlidestek@gmail.com</p>
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
                        çok çalışkan ve azimli bir takımız!</p>

                        <!-- Copywrite Text -->
                        <div class="copywrite-text mb-30">
                            <p>&copy; Copyright 2019 <a href="#">HEG</a>.</p>
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
            $("#submit").click(function(){
                
                var data = {
                    type : "login",
                    email : $("#email").val(),
                    password : $("#password").val()
                };


                jQuery.ajax({
                    type: "POST",
                    data: data,
                    url: ajax_url,
                    success: function(response){
                        
                        if(response != "error"){
                            window.location = response;
                        }else{
                            swal("Hatalı Giriş", "Lütfen bilgilerinizi kontrol ediniz!", "error");
                        }
                    }
                });

            });
        });
    </script>

</body>

</html>