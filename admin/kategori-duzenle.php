<?php


require_once 'header.php';

?>




    <div class="page-content">


<?php if (isset($_GET['yuklenme'])) { ?>
    <script>
        <?php
        switch($_GET['yuklenme']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Kategori Düzenleme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Kategori Düzenleme  İşlemi Oluşurken Bir Sorun Oluştu',
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
    <a href="404.php"></a>
    <?php
} else {



    $kategori = $conn->prepare("SELECT * FROM  kategori where kategori_id=:kategori_id");
    $kategori->execute(['kategori_id'=>$_GET['id']]);
    $kategori_cek = $kategori->fetch(PDO::FETCH_ASSOC);







    ?>


        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Kategori Ayarları</h6>


                    <form action="islem.php" method="POST" class="forms-sample">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Kategori Adı</label>
                            <input name="kategori_adi" type="text" class="form-control"  value="<?php echo $kategori_cek['kategori_adi'] ?>" autocomplete="off" placeholder="Kategori Adı Oluşturunuz.">
                        </div>

                        <input type="hidden" name="kategori_id" value="<?=$kategori_cek['kategori_id']?>">

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Kategori Durum</label>
                            <select name="kategori_durum" class="form-select" >
                                <option selected disabled>Yayınlanma Durumunu Seçiniz</option>
                                <option value="1" <?php
                                if ($kategori_cek['kategori_durum'] == 1){
                                    echo "selected";
                                }
                                ?> >Aktif</option>
                                <option value="0" <?php
                                if ($kategori_cek['kategori_durum'] == 0){
                                    echo "selected";
                                }
                                ?> >Pasif</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Kategori Sıra</label></strong>
                            <input name="kategori_sira" type="number" class="form-control" value="<?php echo $kategori_cek['kategori_sira'] ?>"   autocomplete="off" placeholder="Kategori Sırasını Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Başlık</label></strong>
                            <input name="sayfa_baslik" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_baslik'] ?>" autocomplete="off" placeholder="Sayfa Başlığını Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Açıklama 1. Başlık</label></strong>
                            <input name="sayfa_aciklama_baslik1" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_aciklama_baslik1'] ?>" autocomplete="off" placeholder="Sayfa Kısmında Sayfa Başı Açıklamayı Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Açıklama 1. Kısım</label></strong>
                            <input name="sayfa_aciklama1" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_aciklama1'] ?>" autocomplete="off" placeholder="Sayfa Açıklama 1. Kısmı Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Açıklama 2. Başlık</label></strong>
                            <input name="sayfa_aciklama_baslik2" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_aciklama_baslik2'] ?>" autocomplete="off" placeholder="Sayfa Açıklama İçin 2. Kısmı Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Açıklama 2. Kısım</label></strong>
                            <input name="sayfa_aciklama2" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_aciklama2'] ?>" autocomplete="off" placeholder="Açıklama 2. Kısmı Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Maddeler Üst Başlık </label></strong>
                            <input name="sayfa_madde_baslik" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_madde_baslik'] ?>" autocomplete="off" placeholder="Maddeler Kısmının Başlığını Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Maddeler Üst Başlık Açıklama</label></strong>
                            <input name="sayfa_madde_aciklama" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_madde_aciklama'] ?>" autocomplete="off" placeholder="Madde Açıklamayı Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık 1. Kısım</label></strong>
                            <input name="sayfa_madde_altbaslik1" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_madde_altbaslik1'] ?>" autocomplete="off" placeholder="Maddeler 1. Alt Başlığı Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık Açıklama 1. Kısım</label></strong>
                            <input name="sayfa_madde_altbaslik_aciklama1" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_madde_altbaslik_aciklama1'] ?>" autocomplete="off" placeholder="Madde 1. Başlık  İçin Açıklama Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık 2. Kısım</label></strong>
                            <input name="sayfa_madde_altbaslik2" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_madde_altbaslik2'] ?>" autocomplete="off" placeholder="Maddeler 2. Alt Başlığı Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık Açıklama 2. Kısım</label></strong>
                            <input name="sayfa_madde_altbaslik_aciklama2" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_madde_altbaslik_aciklama2'] ?>" autocomplete="off" placeholder="Madde 2. Başlık İçin Açıklama Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık 3. Kısım</label></strong>
                            <input name="sayfa_madde_altbaslik3" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_madde_altbaslik3'] ?>" autocomplete="off" placeholder="Maddeler 3. Alt Başlığı Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık Açıklama 3. Kısım</label></strong>
                            <input name="sayfa_madde_altbaslik_aciklama3" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_madde_altbaslik_aciklama3'] ?>" autocomplete="off" placeholder="Madde 3. Başlık İçin Açıklama Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık 4. Kısım</label></strong>
                            <input name="sayfa_madde_altbaslik4" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_madde_altbaslik4'] ?>" autocomplete="off" placeholder="Maddeler 4. Alt Başlığı Giriniz.">
                        </div>
                        <div class="mb-3">
                            <strong><label for="exampleInputUsername1" class="form-label">Sayfa Madde Alt Başlık Açıklama 4. Kısım</label></strong>
                            <input name="sayfa_madde_altbaslik_aciklama4" type="text" class="form-control"  value="<?php echo $kategori_cek['sayfa_madde_altbaslik_aciklama4'] ?>" autocomplete="off" placeholder="Madde 4. Başlık İçin Açıklama Giriniz.">
                        </div>

                        <button name="kategori_duzenle" type="submit" class="btn btn-primary me-2">Gönder</button>

                    </form>

                </div>
            </div>
        </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Sayfa Resim </h6>
                <form action="islem.php" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="kategori_id" value="<?=$kategori_cek['kategori_id']?>">
                    <div class="mb-3">
                        <div class="form-group">
                            <img style="width: 25%;" src="resimler/kategori_resimler/<?php echo $kategori_cek['sayfa_resim'] ?>">
                        </div>
                        <br><label class="form-label" for="formFile">Sayfa Resim </label>
                        <input class="form-control" name="sayfa_resim" type="file" required >
                        <input type="hidden" name="eskiresim" value="<?php echo $kategori_cek['sayfa_resim'] ?>">
                    </div>
                    <button type="submit" name="kategori_kaydet1" class="btn btn-primary me-2">Kaydet</button>
                </form>


            </div>
        </div>
    </div>




    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Sayfa Açıklama Resim</h6>
                <form action="islem.php" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="kategori_id" value="<?=$kategori_cek['kategori_id']?>">
                    <div class="mb-3">

                        <div class="form-group">
                            <img style="width: 25%;" src="resimler/kategori_resimler/<?php echo $kategori_cek['sayfa_aciklama_resim'] ?>">
                        </div>
                        <br><label class="form-label" for="form File">Sayfa Açıklama Resim </label>
                        <input class="form-control" type="file"  name="sayfa_aciklama_resim" required>
                        <input type="hidden" name="eskiresim1" value="<?php echo $kategori_cek['sayfa_aciklama_resim']?>">
                    </div>
                    <button type="submit" name="kategori_kaydet2" class="btn btn-primary me-2">Kaydet</button>
                </form>


            </div>
        </div>
    </div>


</div>


<?php } ?>

<?php
require_once 'footer.php'; ?>