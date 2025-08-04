<?php
require_once "header.php"
?>


<?php if (isset($_GET['durum'])) { ?>
    <script>
        <?php
        switch($_GET['durum']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Mesaj Silme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Mesaj Silme İşlemi Oluşurken Bir Sorun Oluştu',
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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="card-title">Mesajlar</h6>
                        <a class="btn btn-danger" href="islem.php?hepsinisil" role="button">Mesajları Sil</a>
                    </div>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sıra</th>
                                <th>İsim</th>
                                <th>E-mail</th>
                                <th>Numara</th>
                                <th>Görüntüle</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $iletisim = $conn->prepare("SELECT * FROM iletisim ORDER BY iletisim_id DESC ");
                            $iletisim->execute();
                            $say = 0;
                            while ($iletisim_cek = $iletisim->fetch(PDO::FETCH_ASSOC)) {
                                $say++;
                                ?>
                                <tr class="<?php if ($iletisim_cek['iletisim_durum'] == 1) { ?>table-responsive <?php } elseif ($iletisim_cek['iletisim_durum'] == 0) { ?>table-secondary <?php } ?>">
                                    <td><?php echo $say ?></td>
                                    <td><?php echo $iletisim_cek['iletisim_ad'] ?></td>
                                    <td><?php echo $iletisim_cek['iletisim_mail'] ?></td>
                                    <td><?php echo $iletisim_cek['iletisim_numara'] ?></td>
                                    <td>
                                        <a href="iletisim-oku.php?iletisimoku&id=<?php echo $iletisim_cek['iletisim_id'] ?>" class="btn btn-warning">Görüntüle</a>
                                    </td>
                                    <td>
                                        <a href="iletisim-tablo.php?iletisimsil&id=<?php echo $iletisim_cek['iletisim_id'] ?>" class="btn btn-danger">Sil</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once "footer.php" ?>
