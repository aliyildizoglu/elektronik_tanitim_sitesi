<?php require_once "header.php";


$sayfa_iletisim = $conn->prepare("SELECT * FROM  sayfa_iletisim WHERE sayfa_iletisim_id=?");
$sayfa_iletisim->execute(array(1));
$sayfa_iletisim_cek = $sayfa_iletisim->fetch(PDO::FETCH_ASSOC);


$hakkimizda_madde = $conn->prepare("SELECT * FROM hakkimizda_madde WHERE hakkimizda_madde_id");
$hakkimizda_madde->execute();
$madde_cek = $hakkimizda_madde->fetch(PDO::FETCH_ASSOC);


$hakkimizda = $conn->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id");
$hakkimizda->execute();
$hakkimizda_cek = $hakkimizda->fetch(PDO::FETCH_ASSOC);


$anasayfa = $conn->prepare("SELECT * FROM  anasayfa WHERE anasayfa_id=?");
$anasayfa->execute(array(1));
$anasayfa_cek = $anasayfa->fetch(PDO::FETCH_ASSOC);

?>


    <!-- ============================
        Slider
    ============================== -->
    <section id="slider1" class="slider slider-1">
      <div class="carousel owl-carousel carousel-arrows carousel-dots" data-slide="1" data-slide-md="1"
        data-slide-sm="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="true"
        data-speed="3000" data-transition="fade" data-animate-out="fadeOut" data-animate-in="fadeIn">

<?php

$slider = $conn->prepare("SELECT * FROM   kayan_resimler  WHERE  slider_durum=:slider_durum  order by slider_sira ASC");
$slider->execute(['slider_durum' => 1]);
while ($slider_cek = $slider->fetch(PDO::FETCH_ASSOC)) {


    ?>
        <div class="slide-item align-v-h bg-overlay">
          <div   class="bg-img" ><img src="admin/resimler/slider_resimler/<?php echo $slider_cek['slider_resim']?>"></div>
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <div class="slide__content">
                  <h2 class="slide__title"><?php echo $slider_cek['slider_baslik'] ?></h2>
                  <p class="slide__desc"><?php echo $slider_cek['slider_aciklama'] ?></p>

                </div><!-- /.slide-content -->
              </div><!-- /.col-xl-9 -->
            </div><!-- /.row -->
          </div><!-- /.container -->
        </div><!-- /.slide-item -->
    <?php } ?>

      </div><!-- /.carousel -->
    </section><!-- /.slider -->

    <!-- ========================
     About Layout 2
   =========================== -->
    <section id="aboutLayout2" class="about about-layout2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="heading heading-2 mb-50">
                        <h2 class="heading__title"><?php echo $anasayfa_cek['sayfa_aciklama_baslik'] ?></h2>
                    </div><!-- /heading -->
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="about__text mr-30">
                                <p><?php echo $anasayfa_cek['sayfa_aciklama'] ?></p>
                            </div>

                        </div><!-- /.col-lg-6 -->
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <p><?php echo $anasayfa_cek['sayfa_aciklama_1'] ?>
                            </p>


                        </div><!-- /.col-lg-6 -->
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <p><?php echo $anasayfa_cek['sayfa_aciklama_2'] ?>
                            </p>

                        </div><!-- /.col-xl-7 -->
                    </div><!-- /.row -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.About Layout 2 -->





    <!-- ========================= 
         Banner layout 1
    =========================  -->
    <section id="bannerLayout1" class="banner banner-layout1 p-0">
      <div class="container-fluid col-padding-0">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 bg-theme">
                <div class="inner-padding">
                    <div class="heading heading-3 heading-white mb-50">
                        <h2 class="heading__title"><?php echo $hakkimizda_cek['hakkimizda_afis_baslik'] ?></h2>

                    </div><!-- /.heading -->
                    <ul class="list-items list-items-white list-unstyled mb-50">

                        <li><?php echo $madde_cek['madde_1'] ?></li>
                        <li><?php echo $madde_cek['madde_2'] ?></li>
                        <li><?php echo $madde_cek['madde_3'] ?></li>
                        <li><?php echo $madde_cek['madde_4'] ?></li>
                        <li><?php echo $madde_cek['madde_5'] ?></li>
                        <li><?php echo $madde_cek['madde_6'] ?></li>
                        <li><?php echo $madde_cek['madde_7'] ?></li>
                        <li><?php echo $madde_cek['madde_8'] ?></li>


                    </ul>

                </div>
            </div><!-- /.col-xl-6 -->
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 bg-parallax" style="min-height: 700px;">
            <div class="bg-img"><img src="admin/resimler/anasayfa_resimler/<?php echo $anasayfa_cek['afis_resim']  ?>" alt="background"></div>

            <ul class="list-unstyled">
              <li class="statistic-item opened">
                <div class="statistic__item-panel">
                  <h4 class="statistic__item-counter counter"><?php echo $anasayfa_cek['calisan_sayisi'] ?></h4>
                  <p class="statistic__item-title"><?php echo $anasayfa_cek['calisan_yazi'] ?></p>
                </div>
                <button class="statistic__item-btn">+</button>
              </li><!-- /.statistic-item -->
              <li class="statistic-item">
                <div class="statistic__item-panel">
                  <h4 class="statistic__item-counter counter"><?php echo $anasayfa_cek['musteri_sayisi'] ?></h4>
                  <p class="statistic__item-title"><?php echo $anasayfa_cek['musteri_yazi'] ?></p>
                </div>
                <button class="statistic__item-btn">+</button>
              </li><!-- /.statistic-item -->
              <li class="statistic-item">
                <div class="statistic__item-panel">
                  <h4 class="statistic__item-counter counter"><?php echo $anasayfa_cek['isler_sayisi']  ?></h4>
                  <p class="statistic__item-title"><?php echo $anasayfa_cek['is_yazi'] ?></p>
                </div>
                <button class="statistic__item-btn">+</button>
              </li><!-- /.statistic-item -->
            </ul>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Banner layout 1 -->
    <!-- =====================
          Features numberd
        ======================== -->
    <section id="featuresNumberd" class="features-numberd pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="carousel owl-carousel carousel-dots" data-slide="5" data-slide-md="3" data-slide-sm="1"
                         data-autoplay="true" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="700">
                        <div class="feature-numberd-item">
                            <div class="feature__numberd-item-icon">
                                <i class="icon-eco"></i>
                            </div>
                            <h3 class="feature__numberd-item-number">01</h3>
                            <h4 class="feature__numberd-item-title"><?php echo $madde_cek['madde_1'] ?></h4>
                        </div><!-- /.feature-numberd-item -->
                        <div class="feature-numberd-item">
                            <div class="feature__numberd-item-icon">
                                <i class="icon-worker"></i>
                            </div>
                            <h3 class="feature__numberd-item-number">02</h3>
                            <h4 class="feature__numberd-item-title"><?php echo $madde_cek['madde_2'] ?></h4>
                        </div><!-- /.feature-numberd-item -->
                        <div class="feature-numberd-item">
                            <div class="feature__numberd-item-icon">
                                <i class="icon-management"></i>
                            </div>
                            <h3 class="feature__numberd-item-number">03</h3>
                            <h4 class="feature__numberd-item-title"><?php echo $madde_cek['madde_3'] ?> </h4>
                        </div><!-- /.feature-numberd-item -->
                        <div class="feature-numberd-item">
                            <div class="feature__numberd-item-icon">
                                <i class="icon-parcel"></i>
                            </div>
                            <h3 class="feature__numberd-item-number">04</h3>
                            <h4 class="feature__numberd-item-title"><?php echo $madde_cek['madde_4'] ?></h4>
                        </div><!-- /.feature-numberd-item -->
                        <div class="feature-numberd-item">
                            <div class="feature__numberd-item-icon">
                                <i class="icon-gear"></i>
                            </div>
                            <h3 class="feature__numberd-item-number">05</h3>
                            <h4 class="feature__numberd-item-title"><?php echo $madde_cek['madde_5'] ?></h4>
                        </div><!-- /.feature-numberd-item -->
                        <div class="feature-numberd-item">
                            <div class="feature__numberd-item-icon">
                                <i class="icon-monitor"></i>
                            </div>
                            <h3 class="feature__numberd-item-number">06</h3>
                            <h4 class="feature__numberd-item-title"><?php echo $madde_cek['madde_6'] ?></h4>
                        </div><!-- /.feature-numberd-item -->
                    </div> <!-- /.carousel -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Features-numberd -->



    <!-- =========================
        Banner layout 4
    =========================== -->
    <section id="bannerLayout4" class="banner banner-layout4 bg-overlay bg-parallax">
      <div class="bg-img"><img src="admin/resimler/anasayfa_resimler/<?php echo $anasayfa_cek['bilgi_resim'] ?>" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7">
            <div class="heading heading-5 heading-white mb-40">

              <h3 class="heading__title"><?php echo $anasayfa_cek['bilgi_baslik'] ?></h3>
              <p class="heading__desc"><?php echo $anasayfa_cek['bilgi_aciklama'] ?></p>
            </div><!-- /.heading -->

          </div><!-- /.col-lg-7 -->
          <div class="col-sm-12 col-md-12 col-lg-4 offset-lg-1">
            <blockquote class="blockquote">
                <?php echo $anasayfa_cek['bilgi_not'] ?>

            </blockquote>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /. Banner layout 4 -->



    <!-- ==========================
        contact layout 2
    =========================== -->
    <section id="contactLayout2" class="contact contact-layout2 pt-0   bg-gray">
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
                        <form action="admin/islem.php" method="post" class="contact__form-panel">
                            <div class="row">
                                <div class="col-sm-12 contact__form-panel-header">
                                    <h4>İletişime Geç</h4>

                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group"><input type="text" name="iletisim_ad" class="form-control" placeholder="Ad Soyad"></div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group"><input type="email" name="iletisim_mail" class="form-control" placeholder="Email"></div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group"><input type="text" name="iletisim_numara" class="form-control" placeholder="Telefon"></div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <textarea name="iletisim_mesaj" class="form-control" placeholder="Mesaj Gönder"></textarea>
                                    </div>
                                </div><!-- /.col-lg-12 -->
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-center">
                                    <button name="iletisim_gonder1" type="submit" class="btn btn__secondary mr-30">
                                        <span>Gönder</span><i class="icon-arrow-right"></i>
                                    </button>
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




<?php require_once "footer.php"; ?>