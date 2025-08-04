<?php require_once 'header.php'; ?>

<?php if (isset($_GET['durum'])) { ?>
    <script>
        <?php
        switch($_GET['durum']){
        case 'basarili': ?>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Yardım && SSS Silme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Yardım && SSS Silme İşlemi Oluşurken Bir Sorun Oluştu',
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

                        <h6 class="card-title col-md-11" style="float: left">Yardım & SSS</h6>
                        <a class="btn btn-primary col-md-1" href="yardim-ekle.php" role="button">Yardım Ekle</a>
                        <div style="clear-after: both"></div>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Sıra Numarası</th>
                                    <th>Yardım & SSS Başlık </th>
                                    <th>Yardım & SSS Açıklama </th>
                                    <th>Yardım & SSS Durum </th>
                                    <th>Yardım & SSS Düzenle </th>
                                    <th>Yardım & SSS Sil </th>

                                </tr>
                                </thead>
                                <tbody>


                                <?php

                                $yardim = $conn->prepare("SELECT * FROM   yardim  order by yardim_id ASC");
                                $yardim->execute();
                                $sayac =0;
                                while ($yardim_cek = $yardim->fetch(PDO::FETCH_ASSOC)) {
                                $sayac++;

                                    ?>
                                    <tr>
                                        <td><?php echo $sayac ?></td>
                                        <td><?php echo $yardim_cek['yardim_baslik'] ?></td>
                                        <td><?php echo $yardim_cek['yardim_aciklama'] ?></td>



                                        <td><span class="tag tag-success">

                      <?php

                      if ($yardim_cek['yardim_durum'] == "1") { ?>
                          <p ><?php echo "Aktif" ?></p> <?php
                      } elseif ($yardim_cek['yardim_durum'] == "2") { ?>

                          <p ><?php echo "Pasif" ?></p>
                          <?php
                      }

                      ?>




                      </span></td>
                                        <td><a href="yardim-duzenle.php?id=<?php echo $yardim_cek['yardim_id'] ?>">
                                                <button type="submit" class="btn btn-warning">Düzenle</button>
                                            </a></td>
                                        <td>
                                            <a href="islem.php?yardimsil&id=<?php echo $yardim_cek['yardim_id'] ?>">
                                                <button type="submit" class="btn btn-danger">Sil</button>
                                            </a></td>
                                    </tr>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'footer.php'; ?>