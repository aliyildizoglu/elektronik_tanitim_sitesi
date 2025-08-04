<?php require_once "islem.php";




$kullanicisor =$conn->prepare("SELECT * FROM kullanici WHERE kullanici_adi=:kullanici_adi");
$kullanicisor->execute(['kullanici_adi'=>$_SESSION['kullanici_adi']]);
$var =$kullanicisor->rowCount();

if ($var ==0) {

    header("Location:login?durum=izinsizgiris");
}

?>
<?php

$kullanici =$conn->prepare("SELECT * FROM kullanici WHERE kullanici_adi=:kullanici_adi");
$kullanici->execute(['kullanici_adi'=>$_SESSION['kullanici_adi']]);
$kullanici_cek = $kullanici->fetch(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>

<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Buta Elektromekanik Sanayi Ve Ticaret A.Ş ">
    <meta name="author" content="Buta">
    <meta name="keywords" content="buta, elektromekanik,ankara,butamekanik,elektromekanikbuta">

    <title>Buta </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/dropzone/dropzone.min.css">
    <link rel="stylesheet" href="assets/vendors/dropify/dist/dropify.min.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">




    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo1/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="resimler/profil_resim/buta4.png" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
                BUTA<span>  A.Ş.</span>
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Anasayfa</li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Gösterge Paneli</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Sayfa Yönetimi</li>
                <li class="nav-item">
                    <a href="hakkimizda-duzenle.php" class="nav-link">
                        <i class="link-icon" data-feather="user-check"></i>
                        <span class="link-title">Hakkımızda Ayarları</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="anasayfa-duzenle.php" class="nav-link">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">Anasayfa Ayarları</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="kategori-tablo.php" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Kategori Ayarları</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="slider.php" class="nav-link">
                        <i class="link-icon" data-feather="sliders"></i>
                        <span class="link-title">Kayan Resim Ayarları</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="nbs-duzenle.php" class="nav-link">
                        <i class="link-icon" data-feather="thumbs-up"></i>
                        <span class="link-title">NBS Ayarlar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="yardim-tablo.php" class="nav-link">
                        <i class="link-icon" data-feather="info"></i>
                        <span class="link-title">Yardım && SSS Ayarları</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="sayfa-iletisim.php" class="nav-link">
                        <i class="link-icon" data-feather="send"></i>
                        <span class="link-title">İletişim Ayarları</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Okuyucularla İletişim</li>
                <li class="nav-item">
                    <a href="iletisim-tablo.php" class="nav-link">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Mesajlar</span>
                    </a>
                </li>




                <li class="nav-item nav-category">Kullanıcı Ayarları</li>
                <li class="nav-item">
                    <a href="kullanicilar.php" class="nav-link">
                        <i class="link-icon" data-feather="key"></i>
                        <span class="link-title">Admin Ayarları</span>
                    </a>
                </li>





            </ul>
        </div>
    </nav>

    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">

                <?php

                $iletisim = $conn->prepare("SELECT * FROM   iletisim where iletisim_durum = '0' ");
                $iletisim->execute();
                $var = $iletisim->rowCount();


                ?>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="bell"></i>

                            <div class="indicator">
                                <?php if ($var > 0){

                                 ?>
                                <div class="circle"></div>

                                <?php } ?>
                            </div>
                        </a>
                        <?php

                        $iletisim = $conn->prepare("SELECT * FROM   iletisim where iletisim_durum = '0' ");
                        $iletisim->execute();
                        $var1 = $iletisim->rowCount();


                        ?>
                        <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                            <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                                <?php if($var1 == 0){ ?>
                                <p> Mesajınız Yok</p>
                                <?php }else{ ?>
                                <p><?php echo $var1 ?> Yeni Mesaj</p>
                                <?php } ?>

                            </div>
                            <div class="p-1">


                                <?php

                                $iletisim = $conn->prepare("SELECT * FROM   iletisim where iletisim_durum = '0' order by iletisim_id DESC limit 0,10");
                                $iletisim->execute();
                                while ($iletisim_cek = $iletisim->fetch(PDO::FETCH_ASSOC)) {


                                    ?>
                                    <a href="iletisim-oku.php?iletisimoku&id=<?php echo $iletisim_cek['iletisim_id'] ?>" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <img class="wd-30 ht-30 rounded-circle" style="background: white" src="resimler/profil_resim/buta5.png" alt="userr">
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p><?php echo $iletisim_cek['iletisim_ad'] ?></p>
                                            <p class="tx-12 text-muted"><?php echo $iletisim_cek['iletisim_tarin'] ?></p>
                                        </div>
                                    </a>
                                <?php }
                                ?>
                            </div>
                            <?php if( $var1 > 0 ){ ?>
                            <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                                <a href="iletisim-tablo.php">Mesajları Oku</a>
                            </div>
                            <?php } ?>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="wd-30 ht-30 rounded-circle" src="resimler/profil_resim/buta5.png" alt="profile">
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    <img class="wd-80 ht-80 rounded-circle" src="resimler/profil_resim/buta4.png" alt="">
                                </div>
                                <div class="text-center">
                                    <p class="tx-20 fw-bolder"><?php echo  $kullanici_cek['kullanici_adi'] ?></p>

                                </div>
                            </div>
                            <ul class="list-unstyled p-1">


                                    <a href="cikis.php" class="text-body ms-0">
                                        <li class="dropdown-item py-2">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Log Out</span>
                                        </li>
                                    </a>

                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>