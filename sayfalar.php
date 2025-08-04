<?php require_once 'header.php' ?>



<?php

$kategori = $conn->prepare("SELECT * FROM   kategori  where kategori_id=:kategori_id order by kategori_sira");
$kategori->execute(['kategori_id'=>$_GET['kategori_id']]);
$kategori_cek = $kategori->fetch(PDO::FETCH_ASSOC);


    ?>

    <!-- ========================
       page title 
    =========================== -->
    <section id="pageTitle" class="page-title page-title-layout8 bg-overlay bg-parallax">
        <div class="bg-img"><img width="2048" height="1361"src="admin/resimler/kategori_resimler/<?php echo $kategori_cek['sayfa_resim'] ?>"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <h1 class="pagetitle__heading"><?php echo $kategori_cek['sayfa_baslik'] ?></h1>

                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
      Text Content Section
    ========================= -->
    <section id="textContentSection" class="text-content-section pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <aside class="sidebar mb-30">
                        <div class="widget widget-categories p-0">
                            <div class="widget-content">
                                <ul class="list-unstyled">
                                    <li >
                                        <?php

                                        $kategori = $conn->prepare("SELECT * FROM kategori WHERE kategori_durum='1' ORDER BY kategori_sira DESC");
                                        $kategori->execute(['kategori_durum'=>'1','kategori_id'=>$_GET['kategori_id']]);


                                        while ($kategori_cek = $kategori->fetch(PDO::FETCH_ASSOC)) {


                                        ?>

                                    <a <?php if( $kategori_cek['kategori_id'] == $_GET['kategori_id']){ ?> class="active" <?php } ?> href="sayfalar-<?=seolink($kategori_cek['kategori_adi']).'-'.$kategori_cek['kategori_id'] ?>"><?php echo  $kategori_cek['kategori_adi'] ?><i class="icon-arrow-right"></i></a>
                                    <?php } ?>
                                </ul>
                            </div><!-- /.widget-content -->
                        </div><!-- /.widget-categories -->


                    </aside><!-- /.sidebar -->
                </div><!-- /.col-lg-4 -->

                <?php


                $kategori = $conn->prepare("SELECT * FROM   kategori  where kategori_id=:kategori_id order by kategori_sira DESC ");
                $kategori->execute(['kategori_id' =>$_GET['kategori_id']]);
                $kategori_cek = $kategori->fetch(PDO::FETCH_ASSOC);


                ?>
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="text__block mb-40">
                        <h5 class="text__block-title"><?php echo $kategori_cek['sayfa_aciklama_baslik1']?></h5>
                        <p class="text__block-desc"><?php echo $kategori_cek['sayfa_aciklama1']?></p>

                    </div><!-- /.text-block -->
                    <div class="text__block">
                        <h5 class="text__block-title"><?php echo $kategori_cek['sayfa_aciklama_baslik2']?></h5>
                        <p class="text__block-desc"><?php echo $kategori_cek['sayfa_aciklama2']?>
                        </p>
                    </div><!-- /.text-block -->
                    <div class="video-banner bg-overlay mb-60">
                        <div class="bg-img"><img src="admin/resimler/kategori_resimler/<?php echo $kategori_cek['sayfa_aciklama_resim'] ?>" alt="background"></div>

                    </div><!-- /.video -->
                    <div class="text__block">
                        <h5 class="text__block-title"><?php echo $kategori_cek['sayfa_madde_baslik']?></h5>
                        <p class="text__block-desc"><?php echo $kategori_cek['sayfa_madde_aciklama']?>.</p>
                    </div><!-- /.text-block -->

                    <div class="features-list mb-30">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="feature-item feature-list-item">
                                    <div class="feature__content">
                                        <h4 class="feature__title"><?php echo $kategori_cek['sayfa_madde_altbaslik1']?></h4>
                                        <p class="feature__desc"><?php echo $kategori_cek['sayfa_madde_altbaslik_aciklama1']?>.</p>
                                    </div><!-- /.feature-content -->
                                </div><!-- /.feature-item -->
                                <div class="feature-item feature-list-item">
                                    <div class="feature__content">
                                        <h4 class="feature__title"><?php echo $kategori_cek['sayfa_madde_altbaslik2']?></h4>
                                        <p class="feature__desc"><?php echo $kategori_cek['sayfa_madde_altbaslik_aciklama2']?></p>
                                    </div><!-- /.feature-content -->
                                </div><!-- /.feature-item -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <div class="feature-item feature-list-item">
                                    <div class="feature__content">
                                        <h4 class="feature__title"><?php echo $kategori_cek['sayfa_madde_altbaslik3']?></h4>
                                        <p class="feature__desc"><?php echo $kategori_cek['sayfa_madde_altbaslik_aciklama3']?> </p>
                                    </div><!-- /.feature-content -->
                                </div><!-- /.feature-item -->
                                <div class="feature-item feature-list-item">
                                    <div class="feature__content">
                                        <h4 class="feature__title"><?php echo $kategori_cek['sayfa_madde_altbaslik4']?></h4>
                                        <p class="feature__desc"><?php echo $kategori_cek['sayfa_madde_altbaslik_aciklama4']?> </p>
                                    </div><!-- /.feature-content -->
                                </div><!-- /.feature-item -->
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                    </div><!-- /.features-list -->
                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.Text Content Section -->
<?php require_once 'footer.php'?>