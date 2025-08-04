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
                <h6 class="card-title">Kategori Ayarları</h6>


                <form action="islem.php" method="POST" class="forms-sample" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Kategori Adı</label>
                        <input name="kategori_adi" type="text" class="form-control" autocomplete="off" placeholder="Kategori Adı Oluşturunuz.">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Kategori Durum</label>
                        <select name="kategori_durum" class="form-select" >
                            <option selected disabled>Yayınlanma Durumunu Seçiniz</option>
                            <option value="1" >Aktif</option>
                            <option value="0" >Pasif</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Kategori Sıra</label></strong>
                        <input name="kategori_sira" type="text" class="form-control"    autocomplete="off" placeholder="Kategori Sırasını Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Başlık</label></strong>
                        <input name="sayfa_baslik" type="text" class="form-control"  autocomplete="off" placeholder="Sayfa Başlığını Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Açıklama 1. Başlık</label></strong>
                        <input name="sayfa_aciklama_baslik1" type="text" class="form-control"  autocomplete="off" placeholder="Sayfa Kısmında Sayfa Başı Açıklamayı Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Açıklama 1. Kısım</label></strong>
                        <input name="sayfa_aciklama1" type="text" class="form-control"   autocomplete="off" placeholder="Sayfa Açıklama 1. Kısmı Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Açıklama 2. Başlık</label></strong>
                        <input name="sayfa_aciklama_baslik2" type="text" class="form-control"   autocomplete="off" placeholder="Sayfa Açıklama İçin 2. Kısmı Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Açıklama 2. Kısım</label></strong>
                        <input name="sayfa_aciklama2" type="text" class="form-control"  autocomplete="off" placeholder="Açıklama 2. Kısmı Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Maddeler Üst Başlık </label></strong>
                        <input name="sayfa_madde_baslik" type="text" class="form-control"   autocomplete="off" placeholder="Maddeler Kısmının Başlığını Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Maddeler Üst Başlık Açıklama</label></strong>
                        <input name="sayfa_madde_aciklama" type="text" class="form-control"  autocomplete="off" placeholder="Madde Açıklamayı Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık 1. Kısım</label></strong>
                        <input name="sayfa_madde_altbaslik1" type="text" class="form-control"   autocomplete="off" placeholder="Maddeler 1. Alt Başlığı Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık Açıklama 1. Kısım</label></strong>
                        <input name="sayfa_madde_altbaslik_aciklama1" type="text" class="form-control"   autocomplete="off" placeholder="Madde 1. Başlık  İçin Açıklama Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık 2. Kısım</label></strong>
                        <input name="sayfa_madde_altbaslik2" type="text" class="form-control"   autocomplete="off" placeholder="Maddeler 2. Alt Başlığı Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık Açıklama 2. Kısım</label></strong>
                        <input name="sayfa_madde_altbaslik_aciklama2" type="text" class="form-control"   autocomplete="off" placeholder="Madde 2. Başlık İçin Açıklama Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık 3. Kısım</label></strong>
                        <input name="sayfa_madde_altbaslik3" type="text" class="form-control"   autocomplete="off" placeholder="Maddeler 3. Alt Başlığı Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık Açıklama 3. Kısım</label></strong>
                        <input name="sayfa_madde_altbaslik_aciklama3" type="text" class="form-control"   autocomplete="off" placeholder="Madde 3. Başlık İçin Açıklama Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık 4. Kısım</label></strong>
                        <input name="sayfa_madde_altbaslik4" type="text" class="form-control"   autocomplete="off" placeholder="Maddeler 4. Alt Başlığı Giriniz.">
                    </div>
                    <div class="mb-3">
                        <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık Açıklama 4. Kısım</label></strong>
                        <input name="sayfa_madde_altbaslik_aciklama4" type="text" class="form-control"   autocomplete="off" placeholder="Madde 4. Başlık İçin Açıklama Giriniz.">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Sayfa Resim </label>
                        <input class="form-control" name="sayfa_resim" type="file" required>
                    </div>

                    <div class="mb-3">
                        <strong><label class="form-label" for="form File">Sayfa Açıklama Resim </label></strong>
                        <input class="form-control" type="file"  name="sayfa_aciklama_resim" required>

                    </div>

                    <button name="kategori_kaydet" type="submit" class="btn btn-primary me-2">Gönder</button>

                </form>

            </div>
        </div>
    </div>
    </div>

<?php require_once 'footer.php'; ?>