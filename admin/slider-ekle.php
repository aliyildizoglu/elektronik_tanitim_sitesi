<?php
require_once  'header.php';


?>


<?php if (isset($_GET['yuklenme'])) { ?>
    <script>
        <?php
        switch($_GET['yuklenme']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Kayan Resim Ekleme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Kayan Resim Ekleme İşleminde Bir Sorun Oluştu',
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
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Kayan Resim Başlık</label>
                            <input name="slider_baslik" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Kayan Resim Başlık Giriniz." required>
                        </div>
                      <div class="mb-3">
                          <label for="exampleInputUsername1" class="form-label">Kayan Resim Açıklama</label>
                          <input name="slider_aciklama" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Kayan Resim Açıklama Giriniz." required>
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputUsername1" class="form-label">Kayan Resim Sırası</label>
                          <input name="slider_sira" type="number" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Kayan Resim Açıklama Giriniz." required>
                      </div>
                      <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Kayan Resim Durumu</label>
                            <select name="slider_durum" class="form-select" id="exampleFormControlSelect1">
                                <option selected disabled>Yayınlanma Durumunu Seçiniz</option>
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>

                            </select>
                        </div>

                      <div class="mb-3">
                          <label for="exampleInputUsername1" class="form-label">Kayan Resim </label>
                          <input name="slider_resim" type="file" class="form-control" id="exampleInputUsername1" required >
                      </div>
                        <button name="slider_kaydet" type="submit" class="btn btn-primary me-2">Gönder</button>

                    </form>

                </div>
            </div>
        </div>

    </div>


<?php require_once 'footer.php'; ?>