<?php
include "admin/conn.php";
require_once 'fonksıyon.php';


$sayfa_iletisim = $conn->prepare("SELECT * FROM  sayfa_iletisim WHERE sayfa_iletisim_id=?");
$sayfa_iletisim->execute(array(1));
$sayfa_iletisim_cek = $sayfa_iletisim->fetch(PDO::FETCH_ASSOC);



?>
    <!DOCTYPE html>
    <html lang="tr">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="description" content="Buta">
        <link href="assets/images/logo/buta4.png" rel="icon">
        <title>Buta Elektromekanik</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700%7cTeko:400,500,600,700&display=swap">
        <link rel="stylesheet" href="assets/css/libraries.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <style>
            #loading {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                align-items:center;
                justify-content:center;
                background-color: #fff;
                z-index: 999
            }
        </style>
    </head>

<body>
    <div id="loading">
        <img src="assets/images/loader/loader.gif" alt="Yükleniyor..." />
    </div>
<div class="wrapper">
    <!-- =========================
        Header
    =========================== -->
    <header id="header" class="header header">
        <nav class="navbar navbar-expand-lg sticky-navbar">
            <div class="container">
                <a class="navbar-brand" href="index">
                    <img src="assets/images/logo/buta4.png" class="logo-light" alt="logo">
                    <img src="assets/images/logo/buta4.png" class="logo-dark" alt="logo">
                </a>
                <button class="navbar-toggler" type="button">
                    <span class="menu-lines"><span></span></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavigation">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav__item with-dropdown">
                            <a href="index" class="dropdown-toggle nav__item-link">Anasayfa</a>
                        </li><!-- /.nav-item -->
                        <li class="nav__item with-dropdown">
                            <a href="#" class="dropdown-toggle nav__item-link">Şirketimiz</a>
                            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
                            <ul class="dropdown-menu">
                                <li class="nav__item"><a href="about-us" class="nav__item-link">Hakkımızda</a></li>
                                <!-- /.nav-item -->
                                <li class="nav__item"><a href="why-us" class="nav__item-link">Neden Bizi Seçmelisiniz</a></li>
                                <!-- /.nav-item -->
                                <li class="nav__item"><a href="faqs" class="nav__item-link">Yardım & SSS</a></li>
                                <!-- /.nav-item -->

                            </ul><!-- /.dropdown-menu -->
                        </li><!-- /.nav-item -->
                        <li class="nav__item with-dropdown">
                            <a href="#" class="dropdown-toggle nav__item-link">Yaptığımız Çalışmalar</a>
                            <i class="fa fa-angle-right" data-toggle="dropdown"></i>
                            <ul class="dropdown-menu ">
                                <?php
                                $kategori = $conn->prepare("SELECT * FROM kategori WHERE kategori_durum='1' ORDER BY kategori_sira DESC");
                                $kategori->execute([

                                ]);
                                while ($kategori_cek = $kategori->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <li class="nav__item">
                                        <a class="nav__item-link"
                                           href="sayfalar-<?= seolink($kategori_cek['kategori_adi']) . '-' . $kategori_cek['kategori_id'] ?>"><?php echo $kategori_cek['kategori_adi']?>
                                        </a>
                                    </li>
                                <?php } ?>
                                </li><!-- /.nav-item -->
                            </ul><!-- /.dropdown-menu -->
                        </li><!-- /.nav-item -->

                        <li class="nav__item">
                            <a href="contacs" class="nav__item-link">İletişim</a>
                        </li><!-- /.nav-item -->
                    </ul><!-- /.navbar-nav -->
                </div><!-- /.navbar-collapse -->
                <div class="navbar-modules">
                    <ul class="list-unstyled d-flex align-items-center modules__btns-list">


                        <li class="d-none d-lg-block">
                            <div class="module__btn module__btn-phone d-flex align-items-center">
                                <i class="icon-phone"></i>
                                <a href="tel:<?php echo $sayfa_iletisim_cek['sayfa_iletisim_telefon'] ?>"><?php echo $sayfa_iletisim_cek['sayfa_iletisim_telefon'] ?></a>
                            </div>
                        </li>
                    </ul><!-- /.modules-wrapper -->
                </div><!-- /.navbar-modules -->
            </div><!-- /.container -->
        </nav><!-- /.navabr -->
    </header><!-- /.Header -->

    <!-- ========================= 
            Google Map
    =========================  -->
    <div id="googleMap" class="google-map  ">
        <iframe src="<?php echo $sayfa_iletisim_cek['sayfa_iletisim_adres_url'] ?>" width="100%" height="600px" style="border: 10px; border-color: black; " allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div><!-- /.GoogleMap -->

    <!-- ==========================
        contact layout 1
    =========================== -->
    <section id="contactLayout1" class="contact contact-layout1 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="contact__panel">
              <div class="contact__panel-banner">
                <img src="admin/resimler/iletisim_resimler/iletisim1.jpg" alt="banner img">
                <div class="cta__banner">
                  <p class="cta__desc"><strong><?php echo $sayfa_iletisim_cek['sayfa_iletisim_mesai'] ?></strong></p>
                  <div class="contact__number d-flex align-items-center">
                    <i class="icon-phone"></i>
                    <a href="tel:<?php echo $sayfa_iletisim_cek['sayfa_iletisim_telefon']  ?>"><?php echo $sayfa_iletisim_cek['sayfa_iletisim_telefon']  ?></a>
                  </div>
                </div>
              </div>
              <form method="POST" action="admin/islem.php" class="contact__form-panel">
                <div class="row">
                  <div class="col-sm-12 contact__form-panel-header">
                    <h4>İletişime Geç</h4>

                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group"><input type="text" class="form-control" placeholder="Ad Soyad" id="contact-name"
                        name="iletisim_ad" required></div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group"><input type="email" class="form-control" placeholder="E-posta"
                        id="contact-email" name="iletisim_mail" required></div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group"><input type="tel" class="form-control" placeholder="Telefon"
                        id="contact-Phone" name="iletisim_numara" required></div>
                  </div><!-- /.col-lg-6 -->

                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <textarea class="form-control" placeholder="Mesaj Oluşturunuz!" id="contact-messgae"
                        name="iletisim_mesaj" required></textarea>
                    </div>

                  </div><!-- /.col-lg-12 -->
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <button type="submit" name="iletisim_gonder" class="btn btn__secondary btn__block">
                      <span>Gönder</span><i class="icon-arrow-right"></i>
                    </button>
                    <div class="contact-result"></div>
                  </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
              </form>
            </div><!-- /.contact__panel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 1 -->

    <!-- ==========================
       Contact Info
    ============================ -->


    <?php require_once  "footer.php"?>