<?php
require_once "header.php";


$hakkimizda = $conn->prepare("SELECT * FROM  hakkimizda WHERE hakkimizda_id=?");
$hakkimizda->execute(array(1));
$hakkimizda_cek = $hakkimizda->fetch(PDO::FETCH_ASSOC);


$hakkimizda_madde = $conn->prepare("SELECT * FROM  hakkimizda_madde WHERE hakkimizda_madde_id=?");
$hakkimizda_madde->execute(array(1));
$madde_cek = $hakkimizda_madde->fetch(PDO::FETCH_ASSOC);



?>


<?php if (isset($_GET['yuklenme'])) { ?>
    <script>
        <?php
        switch($_GET['yuklenme']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Kategori Ekleme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Kategori Ekleme İşlemi Oluşurken Bir Sorun Oluştu',
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
                <h6 class="card-title">Hakkımızda Ayarlar</h6>
                <form action="islem.php" method="POST" enctype="multipart/form-data" >
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Sayfa Başlığı</label>
                        <div class="col-sm-9">
                            <input type="text" name="hakkimizda_sayfa_baslik"  class="form-control"  value="<?php echo $hakkimizda_cek['hakkimizda_sayfa_baslik'] ?>"  placeholder="Hakkımızda Sayfa Başlığını Giriniz " required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Açıklama Başlık  </label>
                        <div class="col-sm-9">
                            <input type="text"  name="hakkimizda_aciklama_baslik" class="form-control" value="<?php echo $hakkimizda_cek['hakkimizda_aciklama_baslik'] ?>" placeholder="Hakkımızda Açıklama Başlığı Giriniz " required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Açıklama </label>
                        <div class="col-sm-9">
                            <input type="text" name="hakkimizda_aciklama" class="form-control" value="<?php echo $hakkimizda_cek['hakkimizda_aciklama'] ?>" placeholder="Hakkımızda Açıklama Giriniz" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş Başlığı</label>
                        <div class="col-sm-9">
                            <input type="text" name="hakkimizda_afis_baslik" value="<?php echo $hakkimizda_cek['hakkimizda_afis_baslik'] ?>" class="form-control"  placeholder="Hakkımızda Kısmı Afiş Başlığı Giriniz " required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş 1.Madde </label>
                        <div  class="col-sm-9">
                            <input type="text" name="madde_1" class="form-control"  value="<?php echo $madde_cek['madde_1'] ?>" placeholder="Hakkımızda Afiş 1. Maddeyi Giriniz." required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş 2. Madde</label>
                        <div  class="col-sm-9">
                            <input type="text" name="madde_2" class="form-control"  value="<?php echo $madde_cek['madde_2'] ?>" placeholder="Hakkımızda Afiş 2. Maddeyi Giriniz. " required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş 3. Madde</label>
                        <div  class="col-sm-9">
                            <input type="text" name="madde_3" class="form-control"  value="<?php echo $madde_cek['madde_3'] ?>" placeholder="Hakkımızda Afiş 3. Maddeyi Giriniz. " required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş 4. Madde</label>
                        <div  class="col-sm-9">
                            <input type="text" name="madde_4" class="form-control"  value="<?php echo $madde_cek['madde_4'] ?>" placeholder="Hakkımızda Afiş 4. Maddeyi Giriniz" required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş 5. Madde</label>
                        <div  class="col-sm-9">
                            <input type="text" name="madde_5" class="form-control"  value="<?php echo $madde_cek['madde_5'] ?>" placeholder="Hakkımızda Afiş 5. Maddeyi Giriniz"required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş 6. Madde</label>
                        <div  class="col-sm-9">
                            <input type="text" name="madde_6" class="form-control"  value="<?php echo $madde_cek['madde_6'] ?>" placeholder="Hakkımızda Afiş 6. Maddeyi Giriniz." required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş 7. Madde</label>
                        <div  class="col-sm-9">
                            <input type="text" name="madde_7" class="form-control"  value="<?php echo $madde_cek['madde_7'] ?>" placeholder="Hakkımızda Afiş 7. Maddeyi Giriniz. " required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Hakkımızda Afiş 8. Madde</label>
                        <div  class="col-sm-9">
                            <input type="text" name="madde_8" class="form-control"  value="<?php echo $madde_cek['madde_8'] ?>" placeholder="Hakkımızda Afiş 8. Maddeyi Giriniz." required>
                        </div>

                    </div>
                    <button  type="submit" name="hakkimizda_kaydet" class="btn btn-primary me-2">Kaydet</button>
                </form>

            </div>
        </div>
    </div>


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Hakkımızda Sayfa Kapağı</h6>
                <form action="islem.php" method="POST" enctype="multipart/form-data" >
                    <div class="mb-3">
                        <div class="form-group">
                            <img style="width: 25%;" src="resimler/hakkimizda_resimler/<?php echo $hakkimizda_cek['hakkimizda_sayfa_kapagi'] ?>">
                        </div>
                        <br><label class="form-label" for="formFile">Hakkımızda Sayfa Kapağı </label>
                        <input class="form-control" name="hakkimizda_sayfa_kapagi" type="file"  required>
                        <input type="hidden" name="eskiresim" value="<?php echo $hakkimizda_cek['hakkimizda_sayfa_kapagi'] ?>">
                    </div>
                    <button type="submit" name="hakkimizda_kaydet1" class="btn btn-primary me-2">Kaydet</button>
                </form>


            </div>
        </div>
    </div>



    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Hakkımızda Açıklama Görseli</h6>
                <form action="islem.php" method="POST" enctype="multipart/form-data" >
                    <div class="mb-3">

                        <div class="form-group">
                            <img style="width: 25%;" src="resimler/hakkimizda_resimler/<?php echo $hakkimizda_cek['hakkimizda_aciklama_gorsel'] ?>">
                        </div>
                        <br><label class="form-label" for="formFile">Hakkımızda Açıklama Görseli </label>
                        <input class="form-control" type="file"  name="hakkimizda_aciklama_gorsel" required>
                        <input type="hidden" name="eskiresim1" value="<?php echo $hakkimizda_cek['hakkimizda_aciklama_gorsel']?>">
                    </div>
                    <button type="submit" name="hakkimizda_kaydet2" class="btn btn-primary me-2">Kaydet</button>
                </form>


            </div>
        </div>
    </div>



    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Hakkımızda Afiş Görseli</h6>

                <form action="islem.php" method="POST" enctype="multipart/form-data" >
                    <div class="mb-3">

                        <div class="form-group">
                            <img style="width: 25%;" src="resimler/hakkimizda_resimler/<?php echo $hakkimizda_cek['hakkimizda_afis_gorsel'] ?>">
                        </div>
                        <br><label class="form-label" for="formFile">Hakkımızda Afiş Görseli Seçiniz </label>
                        <input class="form-control" name="hakkimizda_afis_gorsel" type="file" required>
                        <input type="hidden" name="eskiresim2" value="<?php echo $hakkimizda_cek['hakkimizda_afis_gorsel']?>">
                    </div>
                    <button type="submit" name="hakkimizda_kaydet3" class="btn btn-primary me-2">Kaydet</button>

                </form>

            </div>
        </div>
    </div>




</div>


<?php
require_once  "footer.php";


?>
