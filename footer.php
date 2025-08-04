

<?php


$sayfa_iletisim = $conn->prepare("SELECT * FROM  sayfa_iletisim WHERE sayfa_iletisim_id=?");
$sayfa_iletisim->execute(array(1));
$sayfa_iletisim_cek = $sayfa_iletisim->fetch(PDO::FETCH_ASSOC);



?>
<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 footer__widget footer__widget-about">
                    <h6 class="footer__widget-title">Hızlı İletişim</h6>
                    <div class="footer__widget-content">
                        <p class="color-gray">Herhangi bir sorunuz varsa veya yardıma ihtiyacınız varsa, ekibimizle iletişime geçmekten çekinmeyin.</p>
                        <p class="footer__contact-phone">
                            <i class="icon-phone"></i>
                            <a href="tel:<?php echo $sayfa_iletisim_cek['sayfa_iletisim_telefon'] ?>"><?php echo $sayfa_iletisim_cek['sayfa_iletisim_telefon'] ?> </a>
                        </p>
                        <p><?php echo $sayfa_iletisim_cek['sayfa_iletisim_adres']?></p>
                        <ul class="social__icons">
                            <li><a href="<?php echo  $sayfa_iletisim_cek['sayfa_iletisim_facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo  $sayfa_iletisim_cek['sayfa_iletisim_instagram'] ?>"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="<?php echo  $sayfa_iletisim_cek['sayfa_iletisim_twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo  $sayfa_iletisim_cek['sayfa_iletisim_linkedin'] ?>  "><i class="fa fa-linkedin"></i></a></li>
                        </ul><!-- /.social-icons -->
                    </div>
                </div><!-- /.col-xl-3 -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-2 offset-xl-1 footer__widget footer__widget-nav">
                    <h6 class="footer__widget-title">Şirketimiz</h6>
                    <div class="footer__widget-content">
                        <nav>
                            <ul class="list-unstyled">
                                <li><a href="about-us">Hakkımızda</a></li>
                                <li><a href="why-us">Neden Bizi Seçmelisiniz</a></li>
                                <li><a href="faqs">Yardım & SSS</a></li>

                            </ul>
                        </nav>
                    </div><!-- /.footer-widget-content -->
                </div><!-- /.col-xl-2 -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-2 footer__widget footer__widget-nav">
                    <h6 class="footer__widget-title">Yaptığımız Çalışmalar</h6>
                    <div class="footer__widget-content">
                        <nav>
                            <ul class="list-unstyled">  <?php

                                $kategori = $conn->prepare("SELECT * FROM   kategori order by kategori_id DESC");
                                $kategori->execute();
                                while ($kategori_cek = $kategori->fetch(PDO::FETCH_ASSOC)) {


                                ?>
                                <li><a href="sayfalar-<?=seolink($kategori_cek['kategori_adi']).'-'.$kategori_cek['kategori_id'] ?>"><?php echo  $kategori_cek['kategori_adi'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div><!-- /.footer-widget-content -->
                </div><!-- /.col-xl-2 -->
                    <div class="col-sm-12 col-md-10 col-lg-6 col-xl-4 footer__widget footer__widget-newsletter">

                    </div><!-- /.col-xl-4 -->
                </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-top -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <img src="assets/images/logo/buta4.png" alt="logo">
                </div><!-- /.col-lg-3 -->

                </div><!-- /.col-lg-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.Footer-bottom -->
</footer><!-- /.Footer -->
<button id="scrollTopBtn"><i class="fa fa-long-arrow-up"></i></button>

<div class="module__search-container">
    <i class="fa fa-times close-search"></i>
    <form class="module__search-form">
        <input type="text" class="search__input" placeholder="Type Words Then Enter">
        <button class="module__search-btn"><i class="fa fa-search"></i></button>
    </form>
</div><!-- /.module-search-container -->

</div><!-- /.wrapper -->

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
<script src="admin/assets/vendors/sweetalert2/sweetalert2.min.js"></script>
<script>
    window.addEventListener('load', fg_load)

    function fg_load() {
        document.getElementById('loading').style.display = 'none'
    }
</script>
</body>

</html>