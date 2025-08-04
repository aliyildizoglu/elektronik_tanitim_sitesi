<?php require_once "header.php"?>
    <!-- ========================
       page title 
    =========================== -->

<?php

$hakkimizda = $conn->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id");
$hakkimizda->execute();
$hakkimizda_cek = $hakkimizda->fetch(PDO::FETCH_ASSOC);

?>


<?php

$hakkimizda_madde = $conn->prepare("SELECT * FROM hakkimizda_madde WHERE hakkimizda_madde_id");
$hakkimizda_madde->execute();
$madde_cek = $hakkimizda_madde->fetch(PDO::FETCH_ASSOC);

?>


<?php

$hakkimizda_resim = $conn->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id");
$hakkimizda_resim->execute();
$resim_cek = $hakkimizda_resim->fetch(PDO::FETCH_ASSOC);

?>


    <section id="pageTitle" class="page-title page-title-layout1 bg-overlay bg-parallax">
      <div class="bg-img"><img width="2048" height="1361" src="admin/resimler/hakkimizda_resimler/<?php echo $resim_cek['hakkimizda_sayfa_kapagi'] ?>"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
            <h1 class="pagetitle__heading" ><?php echo $hakkimizda_cek['hakkimizda_sayfa_baslik'] ?></h1>
          </div><!-- /.col-xl-7 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->
    <!-- ========================
      About Layout 2
    =========================== -->
<section id="aboutLayout2" class="about about-layout2 pt-120 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="heading heading-2 mb-50">
                    <h2 class="heading__title"><?php echo $hakkimizda_cek['hakkimizda_aciklama_baslik'] ?></h2>
                </div><!-- /heading -->
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        <p><?php echo $hakkimizda_cek['hakkimizda_aciklama'] ?></p>

                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.col-xl-7 -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 position-static>
                <div class="row mt-50 about__imgs-container">
                    <div class="col-12">
                        <div class="about__img">
                            <img src="admin/resimler/hakkimizda_resimler/<?php echo $resim_cek['hakkimizda_sayfa_kapagi'] ?>" alt="about" class="img-fluid w-100">

                        </div><!-- /.about-img -->
                    </div><!-- /.col-7 -->

                </div><!-- /.row -->
            </div><!-- /.col-xl-5 -->
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
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 bg-parallax" style="min-height: 600px;">
                <div class="bg-img"><img src="admin/resimler/hakkimizda_resimler/<?php echo $resim_cek['hakkimizda_afis_gorsel'] ?>" alt="background"></div>

            </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
      </div>
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








<?php require_once "footer.php" ?>
