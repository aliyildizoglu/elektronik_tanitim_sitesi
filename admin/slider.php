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
            title: 'Kayan Resim Silme İşlemi Başarıyla Gerçekleşti',
            showConfirmButton: false,
            timer: 1500
        })
        <?php
        break;
        case 'basarisiz': ?>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Kayan Resim Silme İşleminde Bir Sorun Oluştu',
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
                        <h6 class="card-title col-md-10" style="float: left">Kayan Resimler</h6>
                        <a class="btn btn-primary col-md-2" href="slider-ekle.php" role="button">Kayan Resim Ekle</a>
                        <div style="clear-after: both"></div>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Kayan Resim</th>
                                    <th>Kayan Resimler Başlık </th>
                                    <th>Kayan Resimler Sıra </th>
                                    <th>Kayan Resimler Durum </th>
                                    <th>Kayan Resimler Düzenle </th>
                                    <th>Kayan Resimler Sil </th>


                                </tr>
                                </thead>
                                <tbody>


                                <?php

                                $slider = $conn->prepare("SELECT * FROM   kayan_resimler  order by slider_id ASC");
                                $slider->execute();
                                while ($slider_cek = $slider->fetch(PDO::FETCH_ASSOC)) {


                                    ?>
                                    <tr>
                                        <td><img width="100%" height="100%" src="resimler/slider_resimler/<?php echo $slider_cek['slider_resim'] ?>"></td>
                                        <td><?php echo $slider_cek['slider_baslik'] ?></td>
                                        <td><?php echo $slider_cek['slider_sira'] ?></td>
                                        <td><span class="tag tag-success">

                      <?php

                      if ($slider_cek['slider_durum'] == "1") { ?>
                          <p ><?php echo "Aktif" ?></p> <?php
                      } elseif ($slider_cek['slider_durum'] == "0") { ?>

                          <p ><?php echo "Pasif" ?></p>
                          <?php
                      }

                      ?>




                      </span></td>
                                        <td><a href="slider-duzenle.php?id=<?php echo $slider_cek['slider_id'] ?>">
                                                <button type="submit" class="btn btn-warning">Düzenle</button>
                                            </a></td>
                                        <form action="islem.php" method="POST" enctype="multipart/form-data"><td>
                                                <input type="hidden" name="id" value="<?php echo $slider_cek['slider_id'] ?>">
                                                <input type="hidden" name="slider_resim" value="<?php echo $slider_cek['slider_resim'] ?>">
                                                <button name="slider_sil" type="submit" class="btn btn-danger">Sil</button>
                                            </td>
                                        </form>


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







<?php
require_once "footer.php";
?>