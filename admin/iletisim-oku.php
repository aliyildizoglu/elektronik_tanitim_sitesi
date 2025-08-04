<?php require_once "header.php "?>

<?php
$iletisim = $conn->prepare("SELECT * FROM   iletisim  WHERE iletisim_id=:iletisim_id ");
$iletisim->execute(['iletisim_id'=>$_GET['id']]);
$iletisim_cek = $iletisim->fetch(PDO::FETCH_ASSOC)

?>
    <div class="page-content">

        <div class="row inbox-wrapper">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="star" class="text-primary icon-lg me-2"></i>
                                        <span>Mesaj</span>
                                    </div>
                                    <div>
                                        <a href="iletisim-tablo.php?iletisimsil&id=<?php echo $iletisim_cek['iletisim_id'] ?>"><i data-feather="trash" class="text-muted icon-lg" data-bs-toggle="tooltip" title="Delete"></i></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <img src="https://via.placeholder.com/36x36" alt="Avatar" class="rounded-circle img-xs">
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="text-body"><?php echo $iletisim_cek['iletisim_ad'] ?></a>


                                        </div>
                                    </div>
                                    <div ><?php echo $iletisim_cek['iletisim_tarin'] ?></div>
                                </div>
                                <div class="p-4 border-bottom">
                                    <p><?php echo $iletisim_cek['iletisim_mesaj'] ?></p>



                                </div>
                                <div class="d-flex align-items-center">

                                <p><strong>Telefon Numarası:  </strong><?php echo $iletisim_cek['iletisim_numara'] ?> </p>

                                </div>
                                <p style="position: "><strong>E-posta Adresi:  </strong><?php echo $iletisim_cek['iletisim_mail'] ?> </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>





        <?php require_once "footer.php"; ?>

