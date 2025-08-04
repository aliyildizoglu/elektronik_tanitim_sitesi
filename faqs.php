<?php require_once "header.php" ?>
    <!-- ========================
       page title 
    =========================== -->
    <section id="pageTitle" class="page-title page-title-layout5 bg-overlay bg-parallax">
        <div class="bg-img"><img src="assets/images/page-titles/5.jpg" alt="background"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <h1 class="pagetitle__heading">Sıkça Sorulan Sorular</h1>
                </div><!-- /.col-lg-5-->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
       FAQ
    ========================= -->
    <section id="faq" class="faq pt-120">
        <div class="container">
            <div class="row" id="accordion">
                <div class="col-sm-12 col-md-12 col-lg-12">

                    <?php

                    $yardim = $conn->prepare("SELECT * FROM yardim where yardim_durum=:yardim_durum order by yardim_id ASC");
                    $yardim->execute(['yardim_durum' => 1]);
                    $say = 0;
                    while ($yardim_cek = $yardim->fetch(PDO::FETCH_ASSOC)) {
                        $say++;
                        ?>
                        <div class="accordion-item">
                            <div class="accordion__item-header" data-toggle="collapse"
                                 data-target="#collapse<?php echo $say ?>">
                                <a class="accordion__item-title" href="#"><?php echo $yardim_cek['yardim_baslik'] ?></a>
                            </div><!-- /.accordion-item-header -->
                            <div id="collapse<?php echo $say ?>" class="collapse" data-parent="#accordion">
                                <div class="accordion__item-body">
                                    <p><?php echo $yardim_cek['yardim_aciklama'] ?></p>
                                </div><!-- /.accordion-item-body -->
                            </div>
                        </div><!-- /.accordion-item -->

                        <?php
                    }
                    ?>
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.FAQ -->

<?php require_once "footer.php"; ?>