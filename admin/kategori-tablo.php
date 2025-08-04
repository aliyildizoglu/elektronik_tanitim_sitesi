<?php
require_once  "header.php";
?>


<?php if (isset($_GET['durum'])) { ?>
    <script>
        <?php
        switch($_GET['durum']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Kategori Silme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Kategori Silme İşlemi Oluşurken Bir Sorun Oluştu',
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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-11">
                                <h6 class="card-title">Kategoriler</h6>
                            </div>
                            <div class="col-md-1">
                                <a class="btn btn-primary" href="kategori-ekle.php" role="button">Kategori Ekle</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Kategori Başlık</th>
                                    <th>Kategori Durum</th>
                                    <th>Kategori Sıra</th>
                                    <th>Kategori Düzenle</th>
                                    <th>Kategori Sil</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $kategori = $conn->prepare("SELECT * FROM kategori ORDER BY kategori_sira ASC");
                                $kategori->execute();
                                while ($kategori_cek = $kategori->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $kategori_cek['kategori_adi'] ?></td>
                                        <td>
                                            <span class="tag tag-success">
                                                <?php
                                                if ($kategori_cek['kategori_durum'] == "1") {
                                                    echo "Aktif";
                                                } elseif ($kategori_cek['kategori_durum'] == "0") {
                                                    echo "Pasif";
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td><?php echo $kategori_cek['kategori_sira'] ?></td>
                                        <td>
                                            <a href="kategori-duzenle.php?id=<?php echo $kategori_cek['kategori_id'] ?>">
                                                <button type="button" class="btn btn-warning">Düzenle</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="islem.php?kategorisil&id=<?php echo $kategori_cek['kategori_id'] ?>">
                                                <button type="button" class="btn btn-danger">Sil</button>
                                            </a>
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








<?php
require_once "footer.php";
?>