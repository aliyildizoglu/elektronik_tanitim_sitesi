<?php require_once "header.php";


$nbs = $conn->prepare("SELECT * FROM  neden_bizi_secmelisiniz WHERE nbs_id=?");
$nbs->execute(array(1));
$nbs_cek = $nbs->fetch(PDO::FETCH_ASSOC);


?>
    <!-- ========================
       page title 
    =========================== -->
    <section id="pageTitle" class="page-title page-title-layout2 bg-overlay bg-parallax">
      <div class="bg-img"><img src="admin/resimler/nbs_resimler/<?php print $nbs_cek['nbs_baslik_resim']?>" ></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
            <h1 class="pagetitle__heading"><?php echo $nbs_cek['nbs_baslik'] ?></h1>
          </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ========================
      About layout 1
    =========================== -->
    <section id="aboutLayout1" class="about about-layout1 pt-100 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="about__img">
              <img src="admin/resimler/nbs_resimler/<?php print $nbs_cek['nbs_aciklama_resim'] ?>" alt="about" class="img-fluid">
            </div><!-- /.about__img -->
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="heading heading-2 mt-50 mb-30">
              <h2 class="heading__title"><?php echo $nbs_cek['nbs_baslik_aciklama'] ?></h2>
              <p class="heading__desc"><?php echo $nbs_cek['nbs_aciklama'] ?></p>
            </div><!-- /heading -->


          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.About layout 1 -->


    <!-- =========================
       Banner layout 3
      =========================== -->
    <section id="bannerLayout3" class="banner banner-layout3 fancybox-white p-20">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 bg-overlay bg-overlay-4 background-banner">
            <div class="bg-img"><img src="admin/resimler/nbs_resimler/<?php print $nbs_cek['nbs_afis_resim'] ?>" alt="background"></div>

          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6 inner-padding bg-parallax">
            <div class="bg-img"><img src="assets/images/backgrounds/2.jpg" alt="background"></div>
            <div class="heading heading-3 mb-50">
              <h3 class="heading__title color-white"><?php echo $nbs_cek['nbs_afis_baslik'] ?></h3>
            </div><!-- /.heading -->
            <div class="row">
              <!-- fancybox item #1 -->
              <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                <div class="fancybox-item">
                  <div class="fancybox__icon">
                    <i class="icon-eco"></i>
                  </div><!-- /.fancybox-icon -->
                  <div class="fancybox__content">
                    <h4 class="fancybox__title"><?php echo $nbs_cek['nbs_afis_madde1'] ?></h4>
                  </div><!-- /.fancybox-content -->
                </div><!-- /.fancybox-item -->
              </div><!-- /.col-lg-3 -->
              <!-- fancybox item #2 -->
              <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                <div class="fancybox-item">
                  <div class="fancybox__icon">
                    <i class="icon-worker"></i>
                  </div><!-- /.fancybox-icon -->
                  <div class="fancybox__content">
                    <h4 class="fancybox__title"><?php echo $nbs_cek['nbs_afis_madde2'] ?> </h4>
                  </div><!-- /.fancybox-content -->
                </div><!-- /.fancybox-item -->
              </div><!-- /.col-lg-3 -->
              <!-- fancybox item #3 -->
              <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                <div class="fancybox-item">
                  <div class="fancybox__icon">
                    <i class="icon-management"></i>
                  </div><!-- /.fancybox-icon -->
                  <div class="fancybox__content">
                    <h4 class="fancybox__title"><?php echo $nbs_cek['nbs_afis_madde3'] ?></h4>
                  </div><!-- /.fancybox-content -->
                </div><!-- /.fancybox-item -->
              </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
            <p class="heading__desc color-white mb-30"><?php echo $nbs_cek['nbs_afis_aciklama'] ?></p>

          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Banner layout 3 -->

<!-- =====================
   Clients
======================== -->



 <?php require_once  "footer.php" ?>


