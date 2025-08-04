<?php
require_once "header.php";

#Nbs Sayfası Kısmı Database Kısmında Neden Bizi Seçmelisiniz İle ilişkilendirildi






$nbs = $conn->prepare("SELECT * FROM  neden_bizi_secmelisiniz WHERE nbs_id=?");
$nbs->execute(array(1));
$nbs_cek = $nbs->fetch(PDO::FETCH_ASSOC);

?>

<?php if (isset($_GET['yuklenme'])) { ?>
    <script>
        <?php
        switch($_GET['yuklenme']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Neden Bizi Seçmelisiniz Kaydetme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Neden Bizi Seçmelisiniz Kaydetme İşleminde Bir Sorun Oluştu',
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
                <h6 class="card-title">Neden Bizi Seçmelisiniz Ayarlar</h6>
                <form action="islem.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">NBS Sayfa Başlığı</label>
                        <div class="col-sm-9">
                            <input type="text" name="nbs_baslik" class="form-control" value="<?php echo $nbs_cek['nbs_baslik'] ?>" placeholder="Sayfa Başlığını Giriniz." required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">NBS Açıklama Başlık </label>
                        <div class="col-sm-9">
                            <input type="text" name="nbs_baslik_aciklama" class="form-control"
                                   placeholder="Açıklama Başlığı Giriniz. " value="<?php echo $nbs_cek['nbs_baslik_aciklama'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">NBS Açıklama </label>
                        <div class="col-sm-9">
                            <input type="text" name="nbs_aciklama" class="form-control"
                                   placeholder="Açıklama Giriniz." value="<?php echo $nbs_cek['nbs_aciklama'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">NBS Afiş Başlığı</label>
                        <div class="col-sm-9">
                            <input type="text" name="nbs_afis_baslik" class="form-control"
                                   placeholder="Kısmı Afiş Başlığı Giriniz. " value="<?php echo $nbs_cek['nbs_afis_baslik'] ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş
                            1.Madde </label>
                        <div class="col-sm-9">
                            <input type="text" name="nbs_afis_madde1" class="form-control"
                                   placeholder="Afiş 1. Maddeyi Giriniz. " value="<?php echo $nbs_cek['nbs_afis_madde1'] ?>" required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş 2.
                            Madde</label>
                        <div class="col-sm-9">
                            <input type="text" name="nbs_afis_madde2" class="form-control"
                                   placeholder="Afiş 2. Maddeyi  Giriniz. " value="<?php echo $nbs_cek['nbs_afis_madde2'] ?>" required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş 3.
                            Madde</label>
                        <div class="col-sm-9">
                            <input type="text" name="nbs_afis_madde3" class="form-control"
                                   placeholder="Afiş 3. Maddeyi  Giriniz. " value="<?php echo $nbs_cek['nbs_afis_madde3'] ?>" required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">NBS Afiş Açıklama</label>
                        <div class="col-sm-9">
                            <input type="text" name="nbs_afis_aciklama" class="form-control"
                                   placeholder="Afiş Açıklama Giriniz. " value="<?php echo $nbs_cek['nbs_afis_aciklama'] ?>" required>
                        </div>

                    </div>


                    <button type="submit" name="nbs_kaydet" class="btn btn-primary me-2">Kaydet</button>
                </form>


            </div>
        </div>
    </div>


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">NBS Sayfa Kapağı</h6>
                <form action="islem.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="form-group">
                            <img style="width: 25%;"
                                 src="resimler/nbs_resimler/<?php echo $nbs_cek['nbs_baslik_resim'] ?>">
                        </div>
                        <br><label class="form-label" for="formFile">NBS Sayfa Kapağı Seçiniz </label>
                        <input class="form-control" name="nbs_baslik_resim" type="file" required>
                        <input type="hidden" name="eskiresim"  value="<?php echo $nbs_cek['nbs_baslik_resim'] ?>">
                    </div>
                    <button type="submit" name="nbs_kaydet1" class="btn btn-primary me-2">Kaydet</button>
                </form>


            </div>
        </div>
    </div>


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">NBS Açıklama Görseli</h6>
                <form action="islem.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">

                        <div class="form-group">
                            <img style="width: 25%;"
                                 src="resimler/nbs_resimler/<?php echo $nbs_cek['nbs_aciklama_resim'] ?>">
                        </div>
                        <br><label class="form-label" for="formFile">NBS Açıklama Görseli Seçiniz</label>
                        <input class="form-control" type="file" name="nbs_aciklama_resim" required>
                        <input type="hidden" name="eskiresim1"
                               value="<?php echo $nbs_cek['nbs_aciklama_resim'] ?>">
                    </div>
                    <button type="submit" name="nbs_kaydet2" class="btn btn-primary me-2">Kaydet</button>
                </form>


            </div>
        </div>
    </div>


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">NBS Afiş Görseli</h6>

                <form action="islem.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">

                        <div class="form-group">
                            <img style="width: 25%;"
                                 src="resimler/nbs_resimler/<?php echo $nbs_cek['nbs_afis_resim'] ?>">
                        </div>
                        <br><label class="form-label" for="formFile">NBS Afiş Görseli Seçiniz </label>
                        <input class="form-control" name="nbs_afis_resim" type="file" required>
                        <input type="hidden" name="eskiresim2" value="<?php echo $nbs_cek['nbs_afis_resim'] ?>">
                    </div>
                    <button type="submit" name="nbs_kaydet3" class="btn btn-primary me-2">Kaydet</button>

                </form>

            </div>
        </div>
    </div>


</div>


<?php require_once "footer.php"; ?>
