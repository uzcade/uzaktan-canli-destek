<?php include 'header.php'; ?>

    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Kayıt Ol</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kayıt Ol</li>
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control mb-30" name="name" placeholder="İsim" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="surname" type="text" class="form-control mb-30" name="surname" placeholder="Soyisim" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control mb-30" name="email" placeholder="Email" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="telephone" type="text" class="form-control mb-30" name="telephone" placeholder="Telefon" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input id="licence_key" type="text" class="form-control mb-30" name="licence_key" placeholder="Lisans Anahtarı" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button id="register_btn" class="btn uza-btn btn-3 mt-15 pull-right" name="register">Kayıt Ol</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Area End ***** -->

   <?php include 'footer.php'; ?>