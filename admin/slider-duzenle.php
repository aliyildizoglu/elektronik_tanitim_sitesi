<?php
require_once  'header.php';

$slider = $conn->prepare("SELECT * FROM   kayan_resimler  where slider_id =:slider_id");
$slider->execute(['slider_id'=>$_GET['id']]);
$slider_cek = $slider->fetch(PDO::FETCH_ASSOC);

?>

<?php if (isset($_GET['yuklenme'])) { ?>
    <script>
        <?php
        switch($_GET['yuklenme']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Slider Düzenleme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Slider Düzenleme İşlemi Oluşurken Bir Sorun Oluştu',
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
                    <h6 class="card-title">Kayan Resim Ayarları</h6>





                  <form action="islem.php" method="POST"  enctype="multipart/form-data" class="forms-sample">
                      <input name="sid" type="hidden" value="<?php  echo $slider_cek['slider_id'] ?>">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Kayan Resim Başlık</label>
                            <input name="slider_baslik" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $slider_cek['slider_baslik'] ?>" autocomplete="off" placeholder="Kayan Resim Başlık Giriniz.">
                        </div>
                      <div class="mb-3">
                          <label for="exampleInputUsername1" class="form-label">Kayan Resim Açıklama</label>
                          <input name="slider_aciklama" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $slider_cek['slider_aciklama'] ?>" autocomplete="off" placeholder="Kayan Resim Açıklama Giriniz.">
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputUsername1" class="form-label">Kayan Resim Sırası</label>
                          <input name="slider_sira" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $slider_cek['slider_sira'] ?>" autocomplete="off" placeholder="Kayan Resim Açıklama Giriniz.">
                      </div>


                      <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Kayan Resim Durumu</label>
                            <select name="slider_durum" class="form-select" id="exampleFormControlSelect1">
                                <option selected disabled>Yayınlanma Durumunu Seçiniz</option>
                                <option value="1" <?php
                                if ($slider_cek['slider_durum'] == "1"){
                                    echo "selected";
                                }
                                ?> >Aktif</option>
                                <option value="0" <?php
                                if ($slider_cek['slider_durum'] == "0"){
                                    echo "selected";
                                }
                                ?> >Pasif</option>

                            </select>
                        </div>
                          <button name="slider_duzenle" type="submit" class="btn btn-primary">Kaydet</button>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Sayfa Resim </h6>
                    <form action="islem.php" method="POST" enctype="multipart/form-data" >
                        <input type="hidden" name="sid" value="<?=$slider_cek['slider_id']?>">

                        <div class="mb-3">

                            <div class="form-group">
                                <img style="width: 25%;" src="resimler/slider_resimler/<?php echo $slider_cek['slider_resim'] ?>">
                            </div>
                            <br><label class="form-label" for="formFile">Kayan Resim  </label>
                            <input class="form-control" type="file"  name="slider_resim" required>
                            <input type="hidden" name="eskiresim2" value="<?php echo $slider_cek['slider_resim']?>">
                        </div>

                        <button type="submit" name="slider_duzenle1" class="btn btn-primary me-2">Kaydet</button>
                    </form>


                </div>
            </div>
        </div>
    </div>


<?php require_once 'footer.php'; ?>