<?php require_once "header.php";


$sayfa_iletisim = $conn->prepare("SELECT * FROM  sayfa_iletisim WHERE sayfa_iletisim_id=?");
$sayfa_iletisim->execute(array(1));
$sayfa_iletisim_cek = $sayfa_iletisim->fetch(PDO::FETCH_ASSOC);


?>
<?php if (isset($_GET['yuklenme'])) { ?>
    <script>
        <?php
        switch($_GET['yuklenme']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'İletişim Ayarları Ekleme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'İletişim Ayarları Eklerken Bir Sorun Oluştu',
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


        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">İletişim Ayarları</h6>
                        <form action="islem.php" method="POST" class="forms-sample">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Telefon Numaranız:</label>
                                    <input class="form-control mb-4 mb-md-0" value="<?php echo $sayfa_iletisim_cek['sayfa_iletisim_telefon'] ?>" name="sayfa_iletisim_telefon"/>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-label">LinkedIn Hesap Url:</label>
                                    <input class="form-control mb-4 mb-md-0"  value="<?php echo $sayfa_iletisim_cek['sayfa_iletisim_linkedin'] ?>" name="sayfa_iletisim_linkedin"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Adres Url:</label>
                                    <input class="form-control mb-4 mb-md-0"  value="<?php echo $sayfa_iletisim_cek['sayfa_iletisim_adres_url'] ?>" name="sayfa_iletisim_adres_url" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mesai Saatleriniz:</label>
                                    <input class="form-control"  value="<?php echo $sayfa_iletisim_cek['sayfa_iletisim_mesai'] ?>" name="sayfa_iletisim_mesai" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Mail Adresiniz:</label>
                                    <input class="form-control mb-4 mb-md-0"  value="<?php echo $sayfa_iletisim_cek['sayfa_iletisim_mail'] ?>" name="sayfa_iletisim_mail"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">İnstagram Hesap Url:</label>
                                    <input class="form-control"  value="<?php echo $sayfa_iletisim_cek['sayfa_iletisim_instagram'] ?>" name="sayfa_iletisim_instagram"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Twitter Hesap Url:</label>
                                    <input class="form-control mb-4 mb-md-0"  value="<?php echo $sayfa_iletisim_cek['sayfa_iletisim_twitter'] ?>" name="sayfa_iletisim_twitter"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Facebook Hesap Url:</label>
                                    <input class="form-control"  value="<?php echo $sayfa_iletisim_cek['sayfa_iletisim_facebook'] ?>" name="sayfa_iletisim_facebook"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">Adresiniz:</label>
                                    <input class="form-control"  value="<?php echo $sayfa_iletisim_cek['sayfa_iletisim_adres'] ?>" name="sayfa_iletisim_adres"/>
                                </div>

                            </div>
                            <button type="submit" name="sayfa_iletisim_kaydet" class="btn btn-primary">Kaydet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>


<?php  require_once "footer.php"?>