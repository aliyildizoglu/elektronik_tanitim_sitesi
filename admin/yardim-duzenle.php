<?php
require_once 'header.php';
?>

<?php if (isset($_GET['yuklenme'])) { ?>
    <script>
        <?php
        switch($_GET['yuklenme']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Yardım && SSS Güncelleme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Yardım && SSS Güncelleme Bir Sorun Oluştu',
            showConfirmButton: false,
            timer: 1500
        })

        <?php
        break;
        }
        ?>
    </script>
<?php } ?>


<?php


if($_GET['id'] == ''){
    ?>
    <div style="text-align: center;font-size:20px;color:red">
        Boş id değeri !
    </div>
    <?php
} else {



$yardim = $conn->prepare("SELECT * FROM  yardim WHERE yardim_id=:yardim_id");
$yardim->execute(['yardim_id'=>$_GET['id']]);
$yardim_cek = $yardim->fetch(PDO::FETCH_ASSOC);



?>



    <div class="page-content">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Yardım & SSS Ayarları</h6>


                    <form action="islem.php" method="POST" class="forms-sample">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Yardım & SSS Başlık</label>
                            <input name="yardim_baslik" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $yardim_cek['yardim_baslik'] ?>" autocomplete="off" placeholder="Yardım Başlığı Giriniz." required>
                        </div>
                        <input type="hidden" name="yardim_id" value="<?php echo $yardim_cek['yardim_id'] ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Yardım & SSS Açıklama</label>
                            <input name="yardim_aciklama" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $yardim_cek['yardim_aciklama'] ?>" autocomplete="off" placeholder="Yardım Açıklamasını Giriniz." required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Yayınlanma Durumunu Seçiniz</label>
                            <select name="yardim_durum" class="form-select" id="exampleFormControlSelect1" required>
                                <option selected disabled>Yayınlanma Durumunu Seçiniz</option>
                                <option value="1" <?php
                                if ($yardim_cek['yardim_durum'] == 1){
                                    echo "selected";
                                }
                                ?> >Aktif</option>
                                <option value="2" <?php
                                if ($yardim_cek['yardim_durum'] == 2){
                                    echo "selected";
                                }
                                ?> >Pasif</option>

                            </select>
                        </div>

                        <button name="yardim_duzenle" type="submit" class="btn btn-primary me-2">Gönder</button>

                    </form>

                </div>
            </div>
        </div>

    </div>


<?php } ?>
<?php require_once 'footer.php'; ?>