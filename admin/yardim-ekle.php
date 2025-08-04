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
            title: 'Yardım && SSS Ekleme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Yardım && SSS Eklerken Bir Sorun Oluştu',
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
                    <h6 class="card-title">Yardım & SSS Ayarları</h6>





                  <form action="islem.php" method="POST"  class="forms-sample">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Yardım & SSS Başlık</label>
                            <input name="yardim_baslik" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Yardım Başlığı Giriniz." required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Yardım & SSS Açıklama</label>
                            <textarea name="yardim_aciklama" class="form-control" id="exampleFormControlTextarea1" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Yardım Durumu</label>
                            <select name="yardim_durum" class="form-select" id="exampleFormControlSelect1" required >
                                <option selected disabled >Yayınlanma Durumunu Seçiniz</option>
                                <option value="1">Aktif</option>
                                <option value="2">Pasif</option>

                            </select>
                        </div>




                        <button name="yardim_kaydet"  type="submit" class="btn btn-primary me-2">Gönder</button>

                    </form>



                </div>
            </div>
        </div>

    </div>


<?php require_once 'footer.php'; ?>