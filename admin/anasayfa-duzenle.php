<?php
require_once "header.php";


$anasayfa = $conn->prepare("SELECT * FROM  anasayfa WHERE anasayfa_id=?");
$anasayfa->execute(array(1));
$anasayfa_cek = $anasayfa->fetch(PDO::FETCH_ASSOC);

?>
<?php if (isset($_GET['yuklenme'])) { ?>
    <script>
        <?php
        switch($_GET['yuklenme']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Anasayfa Ayarları  İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Anasayfa Ayarları İşlemi Oluşurken Bir Sorun Oluştu',
            showConfirmButton: false,
            timer: 1500
        })

        <?php
        break;
        }
        ?>
    </script>
<?php } ?>



<div class="page-content">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Anasayfa Ayarlar</h6>
                <form action="islem.php" method="POST" enctype="multipart/form-data" >



                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa Açıklama Başlık </label>
                        <div  class="col-sm-9">
                            <input type="text" name="sayfa_aciklama_baslik" class="form-control"  value="<?php echo $anasayfa_cek['sayfa_aciklama_baslik'] ?>" placeholder="Anasayfa Açıklama Başlığını Giriniz. " required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa Vurgulanan Açıklama </label>
                        <div  class="col-sm-9">
                            <input type="text" name="sayfa_aciklama" class="form-control"  value="<?php echo $anasayfa_cek['sayfa_aciklama'] ?>" placeholder="Anasayfa Açıklama Giriniz. " required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa 1. Açıklama Kısmı </label>
                        <div  class="col-sm-9">
                            <input type="text" name="sayfa_aciklama_1" class="form-control"  value="<?php echo $anasayfa_cek['sayfa_aciklama_1'] ?>" placeholder="Anasayfa 2. Açıklama  Kısmını  Giriniz. " required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa 2. Açıklama Kısmı </label>
                        <div  class="col-sm-9">
                            <input type="text" name="sayfa_aciklama_2" class="form-control"  value="<?php echo $anasayfa_cek['sayfa_aciklama_2'] ?>" placeholder="Anasayfa 3.  Açıklama Kısmını Giriniz. " required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa Afiş 1 Sayısını </label>
                        <div  class="col-sm-9">
                            <input type="number" name="calisan_sayisi" class="form-control"  value="<?php echo $anasayfa_cek['calisan_sayisi'] ?>" placeholder="Anasayfa Afiş 1 Sayısını Giriniz." required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa Afiş 1 Yazısı  </label>
                        <div  class="col-sm-9">
                            <input type="text" name="calisan_yazi" class="form-control"  value="<?php echo $anasayfa_cek['calisan_yazi'] ?>" placeholder="Anasayfa Afiş 1. Kısım Yazınızı Giriniz." required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa Afiş 2  Sayısı</label>
                        <div  class="col-sm-9">
                            <input type="number" name="isler_sayisi" class="form-control"  value="<?php echo $anasayfa_cek['isler_sayisi'] ?>" placeholder="Anasayfa Afiş 2 Sayısını Giriniz." required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa Afiş 2 Yazısı</label>
                        <div  class="col-sm-9">
                            <input type="text" name="is_yazi" class="form-control"  value="<?php echo $anasayfa_cek['is_yazi'] ?>" placeholder="Anasayfa Afiş 2 Yazınızı Giriniz." required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa 3 Afiş  Sayısı</label>
                        <div  class="col-sm-9">
                            <input type="number" name="musteri_sayisi" class="form-control"  value="<?php echo $anasayfa_cek['musteri_sayisi'] ?>" placeholder="Anasayfa 3 Afiş Sayısını Giriniz "required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa 3 Afiş  Yazısı</label>
                        <div  class="col-sm-9">
                            <input type="text" name="musteri_yazi" class="form-control"  value="<?php echo $anasayfa_cek['musteri_yazi'] ?>" placeholder="Anasayfa 3 Afiş  Yazınızı Giriniz "required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa Bilgi Başlık </label>
                        <div  class="col-sm-9">
                            <input type="text" name="bilgi_baslik" class="form-control"  value="<?php echo $anasayfa_cek['bilgi_baslik'] ?>" placeholder="Anasayfa Bilgi Başlığını Giriniz." required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa Bilgi Açıklama</label>
                        <div  class="col-sm-9">
                            <input type="text" name="bilgi_aciklama" class="form-control"  value="<?php echo $anasayfa_cek['bilgi_aciklama'] ?>" placeholder="Anasayfa Bilgi Açıklama Giriniz. " required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Anasayfa Bilgi Kısa Not </label>
                        <div  class="col-sm-9">
                            <input type="text" name="bilgi_not" class="form-control"  value="<?php echo $anasayfa_cek['bilgi_not'] ?>" placeholder="Anasayfa Bilgi Kısmına Kısa Not Giriniz." required>
                        </div>

                    </div>
                    <button  type="submit" name="anasayfa_kaydet" class="btn btn-primary me-2">Kaydet</button>
                </form>
            </div>
        </div>
    </div>


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Anasayfa Afis Kısmı Resmi </h6>
                <form action="islem.php" method="POST" enctype="multipart/form-data" >
                    <div class="mb-3">
                        <div class="form-group">
                            <img style="width: 25%;" src="resimler/anasayfa_resimler/<?php echo $anasayfa_cek['afis_resim'] ?>">
                        </div>
                        <br><label class="form-label" for="formFile">Anasayfa Afis Kısmı Resim </label>
                        <input class="form-control" name="afis_resim" type="file" required >
                        <input type="hidden" name="eskiresim1" value="<?php echo $anasayfa_cek['afis_resim'] ?>">
                    </div>
                    <button type="submit" name="anasayfa_kaydet2" class="btn btn-primary me-2">Kaydet</button>
                </form>


            </div>
        </div>
    </div>





    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Anasayfa Bilgi Resim</h6>

                <form action="islem.php" method="POST" enctype="multipart/form-data" >
                    <div class="mb-3">

                        <div class="form-group">
                            <img style="width: 25%;" src="resimler/anasayfa_resimler/<?php echo $anasayfa_cek['bilgi_resim'] ?>">
                        </div>
                        <br><label class="form-label" for="formFile">Hakkımızda Afiş Görseli Seçiniz </label>
                        <input class="form-control" name="bilgi_resim" type="file" required>
                        <input type="hidden" name="eskiresim2" value="<?php echo $anasayfa_cek['bilgi_resim']?>">
                    </div>
                    <button type="submit" name="anasayfa_kaydet3" class="btn btn-primary me-2">Kaydet</button>

                </form>

            </div>
        </div>
    </div>




</div>


<?php
require_once  "footer.php";


?>
