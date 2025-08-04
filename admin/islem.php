<?php

include "conn.php";
session_start();
if (isset($_POST['yardim_kaydet'])) {


    $yardim_aciklama = $_POST['yardim_aciklama'];
    $yardim_baslik = $_POST['yardim_baslik'];
    $yardim_durum = $_POST['yardim_durum'];

    $duzenle = $conn->prepare("INSERT INTO yardim SET
            yardim_baslik=:yardim_baslik,
            yardim_aciklama=:yardim_aciklama,
            yardim_durum=:yardim_durum       
                   ");


    $insert = $duzenle->execute(['yardim_baslik' => $yardim_baslik, 'yardim_aciklama' => $yardim_aciklama, 'yardim_durum' => $yardim_durum]);




        if ($insert) {

            header("Location:yardim-ekle.php?yuklenme=basarili");
        }else{

            header("Location:yardim-ekle.php?yuklenme=basarisiz");
        }




}

if (isset($_GET['yardimsil'])) {

    $yardim_sil = $conn->prepare("DELETE  FROM yardim where yardim_id=:yardim_id");


    $yardim_sil->execute(['yardim_id' => intval($_GET['id'])]);

    if (yardim_sil) {
        header("Location:yardim-tablo.php?durum=basarili");

    } else {
        header("Location:yardim-tablo.php?durum=basarisiz");
    }


}


if (isset($_POST['yardim_duzenle'])) {

    /*

    $duzenle = $conn->prepare("UPDATE yardim SET 
	
	yardim_baslik=:yardim_baslik,
	yardim_aciklama=:yardim_aciklama

	WHERE id=$yardim_id;
		");

    $update = $duzenle->execute(['yardim_durum' => $_POST['yardim_durum'], 'yardim_baslik' => $_POST['yardim_baslik']]);


    if ($update) {
        header("Location:yardim-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:yardim-duzenle.php?yuklenme=basarisiz");
    }
       */
    print_r($_POST);

    $id = $_POST['yardim_id'];
    $baslik = $_POST['yardim_baslik'];
    $aciklama= $_POST['yardim_aciklama'];
    $category_statu = $_POST['yardim_durum'];

    $update = $conn->prepare('update yardim set yardim_baslik=?, yardim_aciklama=?, yardim_durum=? where yardim_id=?');
    $control = $update->execute([
        $_POST['yardim_baslik'], $_POST['yardim_aciklama'] ,$_POST['yardim_durum'],$_POST['yardim_id']
    ]);
    if ($control) {
        header("Location:yardim-duzenle.php?id=".$_POST['yardim_id']."&yuklenme=basarili");
    } else {
        header("Location:yardim-duzenle.php?id=".$_POST['yardim_id']."&yuklenme=basarisiz");
    }

}

if (isset($_POST['hakkimizda_kaydet'])) {


    $duzenle = $conn->prepare("UPDATE hakkimizda SET 

        hakkimizda_sayfa_baslik=:hakkimizda_sayfa_baslik,
        hakkimizda_aciklama_baslik=:hakkimizda_aciklama_baslik,
        hakkimizda_aciklama=:hakkimizda_aciklama,
        hakkimizda_afis_baslik=:hakkimizda_afis_baslik
       
        
        
        WHERE hakkimizda_id = 1
                          
                             ");

    $update = $duzenle->execute([
        'hakkimizda_sayfa_baslik'=>$_POST['hakkimizda_sayfa_baslik'],
        'hakkimizda_aciklama_baslik'=>$_POST['hakkimizda_aciklama_baslik'],
        'hakkimizda_aciklama'=>$_POST['hakkimizda_aciklama'],
        'hakkimizda_afis_baslik'=>$_POST['hakkimizda_afis_baslik']



    ]);


    if ($update) {


        header("Location:hakkimizda-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:hakkimizda-duzenle.php?yuklenme=basarisiz");
    }


}

if (isset($_POST['hakkimizda_kaydet1'])) {

    $uploads_dir = 'resimler/hakkimizda_resimler';
    @$tmp_name = $_FILES['hakkimizda_sayfa_kapagi']["tmp_name"];
    @$name = $_FILES['hakkimizda_sayfa_kapagi']["name"];
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $sayi1 = rand(1, 9999);
    $name = str_replace(' ','',$name);
    $resimyolu = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

    $duzenle = $conn->prepare("UPDATE hakkimizda SET 
     hakkimizda_sayfa_kapagi=:hakkimizda_sayfa_kapagi
      WHERE hakkimizda_id = 1
                          
                             ");


    $update = $duzenle->execute([
        'hakkimizda_sayfa_kapagi' => $resimyolu

    ]);


    if ($update) {

        $resimsil = $_POST['eskiresim'];
        unlink("resimler/hakkimizda_resimler/$resimsil");


        header("Location:hakkimizda-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:hakkimizda-duzenle.php?yuklenme=basarisiz");
    }


}

if (isset($_POST['hakkimizda_kaydet2'])) {


    $uploads_dir1 = 'resimler/hakkimizda_resimler';
    @$tmp_name = $_FILES['hakkimizda_aciklama_gorsel']["tmp_name"];
    @$name = $_FILES['hakkimizda_aciklama_gorsel']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace(' ','',$name);
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $resimyolu1 = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir1/$sayi1$name");


    $duzenle = $conn->prepare("UPDATE hakkimizda SET 
     hakkimizda_aciklama_gorsel=:hakkimizda_aciklama_gorsel
      WHERE hakkimizda_id = 1
                          
                             ");


    $update = $duzenle->execute([
        'hakkimizda_aciklama_gorsel' => $resimyolu1


    ]);


    if ($update) {
        $resimsil1 = $_POST['eskiresim1'];
        unlink("resimler/hakkimizda_resimler/$resimsil1");


        header("Location:hakkimizda-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:hakkimizda-duzenle.php?yuklenme=basarisiz");
    }
}


if (isset($_POST['hakkimizda_kaydet3'])) {

        $uploads_dir2 = 'resimler/hakkimizda_resimler';
        @$tmp_name = $_FILES['hakkimizda_afis_gorsel']["tmp_name"];
        @$name = $_FILES['hakkimizda_afis_gorsel']["name"];
        $sayi1 = rand(1, 9999);
        $name = str_replace(' ','',$name);
        $name = str_replace('(','',$name);
        $name = str_replace(')','',$name);
        $resimyolu2 = $sayi1 . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir2/$sayi1$name");


        $duzenle = $conn->prepare("UPDATE hakkimizda SET 
     hakkimizda_afis_gorsel=:hakkimizda_afis_gorsel
      WHERE hakkimizda_id = 1
                          
                             ");


        $update = $duzenle->execute([
            'hakkimizda_afis_gorsel' => $resimyolu2


        ]);


        if ($update) {

            $resimsil2 = $_POST['eskiresim2'];
            unlink("resimler/hakkimizda_resimler/$resimsil2");


            header("Location:hakkimizda-duzenle.php?yuklenme=basarili");
        } else {
            header("Location:hakkimizda-duzenle.php?yuklenme=basarisiz");
        }
}

if(isset($_POST['hakkimizda_kaydet'])){

    $duzenle = $conn->prepare("UPDATE hakkimizda_madde SET 
                            
        madde_1=:madde_1,
        madde_2=:madde_2,
        madde_3=:madde_3,
        madde_4=:madde_4,
        madde_5=:madde_5,
        madde_6=:madde_6,
        madde_7=:madde_7,
        madde_8=:madde_8

        WHERE hakkimizda_madde_id = 1
    
                             ");

    $update = $duzenle->execute([


        'madde_1' => $_POST['madde_1'],
        'madde_2' => $_POST['madde_2'],
        'madde_3' => $_POST['madde_3'],
        'madde_4' => $_POST['madde_4'],
        'madde_5' => $_POST['madde_5'],
        'madde_6' => $_POST['madde_6'],
        'madde_7' => $_POST['madde_7'],
        'madde_8' => $_POST['madde_8']



    ]);


    if ($update) {


        header("Location:hakkimizda-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:hakkimizda-duzenle.php?yuklenme=basarisiz");
    }


}

if(isset($_POST['nbs_kaydet'])){

    $duzenle = $conn ->prepare("UPDATE neden_bizi_secmelisiniz SET
    
    nbs_baslik=:nbs_baslik,
    nbs_baslik_aciklama=:nbs_baslik_aciklama,
    nbs_aciklama=:nbs_aciklama,
    nbs_afis_baslik=:nbs_afis_baslik,                             
    nbs_afis_madde1=:nbs_afis_madde1,                               
    nbs_afis_madde2=:nbs_afis_madde2,                              
    nbs_afis_madde3=:nbs_afis_madde3,
    nbs_afis_aciklama=:nbs_afis_aciklama
    
    WHERE nbs_id=1


 " );


    $update = $duzenle->execute([


        'nbs_baslik'=>$_POST['nbs_baslik'],
        'nbs_baslik_aciklama'=>$_POST['nbs_baslik_aciklama'],
        'nbs_aciklama'=>$_POST['nbs_aciklama'],
        'nbs_afis_baslik'=>$_POST['nbs_afis_baslik'],
        'nbs_afis_madde1'=>$_POST['nbs_afis_madde1'],
        'nbs_afis_madde2'=>$_POST['nbs_afis_madde2'],
        'nbs_afis_madde3'=>$_POST['nbs_afis_madde3'],
        'nbs_afis_aciklama'=>$_POST['nbs_afis_aciklama']



    ]);

    if ($update) {


        header("Location:nbs-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:nbs-duzenle.php?yuklenme=basarisiz");
    }





}

if (isset($_POST['nbs_kaydet1'])) {

    $uploads_dir = 'resimler/nbs_resimler';
    @$tmp_name = $_FILES['nbs_baslik_resim']["tmp_name"];
    @$name = $_FILES['nbs_baslik_resim']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace(' ','',$name);
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $resimyolu = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

    $duzenle = $conn->prepare("UPDATE neden_bizi_secmelisiniz SET 
     nbs_baslik_resim=:nbs_baslik_resim
      WHERE nbs_id = 1
                          
                             ");


    $update = $duzenle->execute([
        'nbs_baslik_resim' => $resimyolu

    ]);


    if ($update) {

        $resimsil = $_POST['eskiresim'];
        unlink("resimler/nbs_resimler/$resimsil");


        header("Location:nbs-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:nbs-duzenle.php?yuklenme=basarisiz");
    }


}

if (isset($_POST['nbs_kaydet2'])) {


    $uploads_dir1 = 'resimler/nbs_resimler';
    @$tmp_name = $_FILES['nbs_aciklama_resim']["tmp_name"];
    @$name = $_FILES['nbs_aciklama_resim']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace(' ','',$name);
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $resimyolu1 = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir1/$sayi1$name");


    $duzenle = $conn->prepare("UPDATE neden_bizi_secmelisiniz SET 
     nbs_aciklama_resim=:nbs_aciklama_resim
      WHERE nbs_id = 1
                          
                             ");


    $update = $duzenle->execute([
        'nbs_aciklama_resim' => $resimyolu1


    ]);


    if ($update) {
        $resimsil1 = $_POST['eskiresim1'];
        unlink("resimler/nbs_resimler/$resimsil1");


        header("Location:nbs-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:nbs-duzenle.php?yuklenme=basarisiz");
    }
}


if (isset($_POST['nbs_kaydet3'])) {

    $uploads_dir2 = 'resimler/nbs_resimler';
    @$tmp_name = $_FILES['nbs_afis_resim']["tmp_name"];
    @$name = $_FILES['nbs_afis_resim']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace(' ','',$name);
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $resimyolu2 = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir2/$sayi1$name");


    $duzenle = $conn->prepare("UPDATE neden_bizi_secmelisiniz SET 
     nbs_afis_resim=:nbs_afis_resim
      WHERE nbs_id = 1
                          
                             ");


    $update = $duzenle->execute([
        'nbs_afis_resim' => $resimyolu2


    ]);


    if ($update) {

        $resimsil2 = $_POST['eskiresim2'];
        unlink("resimler/nbs_resimler/$resimsil2");


        header("Location:nbs-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:nbs-duzenle.php?yuklenme=basarisiz");
    }
}

if(isset($_POST['iletisim_gonder'])){

    $iletisim_ad=$_POST['iletisim_ad'];
    $iletisim_mail=$_POST['iletisim_mail'];
    $iletisim_numara=$_POST['iletisim_numara'];
    $iletisim_mesaj=$_POST['iletisim_mesaj'];



    $duzenle = $conn->prepare("INSERT INTO iletisim SET
                         
     iletisim_ad=:iletisim_ad,
     iletisim_mail=:iletisim_mail,
     iletisim_numara=:iletisim_numara,
     iletisim_mesaj=:iletisim_mesaj
    
                     ");

    $insert = $duzenle->execute(['iletisim_ad' => $iletisim_ad, 'iletisim_mail' => $iletisim_mail, 'iletisim_numara' => $iletisim_numara, 'iletisim_mesaj' => $iletisim_mesaj,]);

    if ($insert) {
        header("Location:../contacs.php?yuklenme=basarili");
    } else {
        header("Location:../contacs.php?yuklenme=basarisiz");
    }




}


if(isset($_POST['iletisim_gonder1'])){

    $iletisim_ad=$_POST['iletisim_ad'];
    $iletisim_mail=$_POST['iletisim_mail'];
    $iletisim_numara=$_POST['iletisim_numara'];
    $iletisim_mesaj=$_POST['iletisim_mesaj'];



    $duzenle = $conn->prepare("INSERT INTO iletisim SET
                         
     iletisim_ad=:iletisim_ad,
     iletisim_mail=:iletisim_mail,
     iletisim_numara=:iletisim_numara,
     iletisim_mesaj=:iletisim_mesaj
    
                     ");

    $insert = $duzenle->execute(['iletisim_ad' => $iletisim_ad, 'iletisim_mail' => $iletisim_mail, 'iletisim_numara' => $iletisim_numara, 'iletisim_mesaj' => $iletisim_mesaj,]);

    if ($insert) {
        header("Location:../index?yuklenme=basarili");
    } else {
        header("Location:../index?yuklenme=basarisiz");
    }




}

if(isset($_GET['iletisimsil'])){


    $iletisim_sil = $conn->prepare("DELETE  FROM iletisim where iletisim_id=:iletisim_id");


    $iletisim_sil->execute(['iletisim_id' => intval($_GET['id'])]);

    if (iletisim_sil) {
        header("Location:iletisim-tablo.php?durum=basarili");

    } else {
        header("Location:iletisim-tablo.php?durum=basarisiz");
    }


}

if(isset($_GET['iletisimoku'])){

    $id = intval($_GET['id']);

    $duzenle = $conn->prepare("UPDATE iletisim SET 
                    iletisim_durum=:iletisim_durum
    where iletisim_id='$id'
                    ");
    $update = $duzenle->execute([

        'iletisim_durum'=>'1'

    ]);

}
if(isset($_GET['hepsinisil'])){


    $iletisim_sil = $conn->prepare("DELETE FROM iletisim ");

    $iletisim_sil->execute([]);


    if (iletisim_sil) {
        header("Location:iletisim-tablo.php?durum=basarili");

    } else {
        header("Location:iletisim-tablo.php?durum=basarisiz");
    }




}






if(isset($_POST['sayfa_iletisim_kaydet'])){

    $duzenle = $conn->prepare("UPDATE sayfa_iletisim SET 
	
	sayfa_iletisim_telefon=:sayfa_iletisim_telefon, /* DATABASEDEKİ İSİM  GECİCİ İSİM */
	sayfa_iletisim_adres=:sayfa_iletisim_adres,
	sayfa_iletisim_adres_url=:sayfa_iletisim_adres_url,
	sayfa_iletisim_mesai=:sayfa_iletisim_mesai,
	sayfa_iletisim_instagram=:sayfa_iletisim_instagram,
	sayfa_iletisim_twitter=:sayfa_iletisim_twitter,
	sayfa_iletisim_facebook=:sayfa_iletisim_facebook,
	sayfa_iletisim_linkedin=:sayfa_iletisim_linkedin,
	sayfa_iletisim_mail=:sayfa_iletisim_mail

	WHERE sayfa_iletisim_id= 1;
		");

    $update = $duzenle->execute([
        'sayfa_iletisim_telefon'=>$_POST['sayfa_iletisim_telefon'],     /* DATABASEDEKİ İSİM VE DİGER SAYFADAKİ İSİM */
        'sayfa_iletisim_adres'=>$_POST['sayfa_iletisim_adres'],
        'sayfa_iletisim_adres_url'=>$_POST['sayfa_iletisim_adres_url'],
        'sayfa_iletisim_mesai'=>$_POST['sayfa_iletisim_mesai'],
        'sayfa_iletisim_instagram'=>$_POST['sayfa_iletisim_instagram'],
        'sayfa_iletisim_twitter'=>$_POST['sayfa_iletisim_twitter'],
        'sayfa_iletisim_facebook'=>$_POST['sayfa_iletisim_facebook'],
        'sayfa_iletisim_linkedin'=>$_POST['sayfa_iletisim_linkedin'],
        'sayfa_iletisim_mail'=>$_POST['sayfa_iletisim_mail']
    ]);


    if ($update) {
        header("Location:sayfa-iletisim-tablo.php?yuklenme=basarili");
    } else {
        header("Location:sayfa-iletisim-tablo.php?yuklenme=basarisiz");
    }
}


if (isset($_POST['kategori_kaydet'])) {

    $uploads_dir = 'resimler/kategori_resimler';
    @$tmp_name = $_FILES['sayfa_resim']["tmp_name"];
    @$name = $_FILES['sayfa_resim']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $name = str_replace(' ','',$name);
    $resimyolu1 = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

    $uploads_dir = 'resimler/kategori_resimler';
    @$tmp_name = $_FILES['sayfa_aciklama_resim']["tmp_name"];
    @$name2 = $_FILES['sayfa_aciklama_resim']["name2"];
    $sayi2 = rand(1, 9999);
    $name2 = str_replace('(','',$name2);
    $name2 = str_replace(')','',$name2);
    $name2 = str_replace(' ','',$name2);
    $resimyolu2 = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi2$name");

    $kategori_adi = $_POST['kategori_adi'];
    $kategori_durum = boolval(intval($_POST['kategori_durum']));
    $kategori_sira = $_POST['kategori_sira'];
    $sayfa_baslik=$_POST['sayfa_baslik'];
    $sayfa_aciklama_baslik1=$_POST['sayfa_aciklama_baslik1'];
    $sayfa_aciklama1=$_POST['sayfa_aciklama1'];
    $sayfa_aciklama_baslik2=$_POST['sayfa_aciklama_baslik2'];
    $sayfa_aciklama2=$_POST['sayfa_aciklama2'];
    $sayfa_madde_baslik=$_POST['sayfa_madde_baslik'];
    $sayfa_madde_aciklama=$_POST['sayfa_madde_aciklama'];
    $sayfa_madde_altbaslik1=$_POST['sayfa_madde_altbaslik1'];
    $sayfa_madde_altbaslik_aciklama1=$_POST['sayfa_madde_altbaslik_aciklama1'];
    $sayfa_madde_altbaslik2=$_POST['sayfa_madde_altbaslik2'];
    $sayfa_madde_altbaslik_aciklama2=$_POST['sayfa_madde_altbaslik_aciklama2'];
    $sayfa_madde_altbaslik3=$_POST['sayfa_madde_altbaslik3'];
    $sayfa_madde_altbaslik_aciklama3=$_POST['sayfa_madde_altbaslik_aciklama3'];
    $sayfa_madde_altbaslik4=$_POST['sayfa_madde_altbaslik4'];
    $sayfa_madde_altbaslik_aciklama4=$_POST['sayfa_madde_altbaslik_aciklama4'];


    $duzenle = $conn->prepare("INSERT INTO kategori SET

                    kategori_adi=:kategori_adi,
                    kategori_durum=:kategori_durum,
                    kategori_sira=:kategori_sira,
                    sayfa_baslik=:sayfa_baslik,
                    sayfa_aciklama_baslik1=:sayfa_aciklama_baslik1,
                    sayfa_aciklama1=:sayfa_aciklama1,
                    sayfa_aciklama_baslik2=:sayfa_aciklama_baslik2,
                    sayfa_aciklama2=:sayfa_aciklama2,
                    sayfa_madde_baslik=:sayfa_madde_baslik,
                    sayfa_madde_aciklama=:sayfa_madde_aciklama,
                    sayfa_madde_altbaslik1=:sayfa_madde_altbaslik1,
                    sayfa_madde_altbaslik_aciklama1=:sayfa_madde_altbaslik_aciklama1,
                    sayfa_madde_altbaslik2=:sayfa_madde_altbaslik2,
                    sayfa_madde_altbaslik_aciklama2=:sayfa_madde_altbaslik_aciklama2,
                    sayfa_madde_altbaslik3=:sayfa_madde_altbaslik3,
                    sayfa_madde_altbaslik_aciklama3=:sayfa_madde_altbaslik_aciklama3,
                    sayfa_madde_altbaslik4=:sayfa_madde_altbaslik4,
                    sayfa_madde_altbaslik_aciklama4=:sayfa_madde_altbaslik_aciklama4,
                    sayfa_resim=:sayfa_resim,
                    sayfa_aciklama_resim=:sayfa_aciklama_resim
  
                     
                  
                   ");



    $insert = $duzenle->execute([
        'kategori_adi'=>$kategori_adi,
        'kategori_durum'=>$kategori_durum,
        'kategori_sira'=>$kategori_sira,
        'sayfa_baslik'=>$sayfa_baslik,
        'sayfa_aciklama_baslik1'=>$sayfa_aciklama_baslik1,
        'sayfa_aciklama1'=>$sayfa_aciklama1,
        'sayfa_aciklama_baslik2'=>$sayfa_aciklama_baslik2,
        'sayfa_aciklama2'=>$sayfa_aciklama2,
        'sayfa_madde_baslik'=>$sayfa_madde_baslik,
        'sayfa_madde_aciklama'=>$sayfa_madde_aciklama,
        'sayfa_madde_altbaslik1'=>$sayfa_madde_altbaslik1,
        'sayfa_madde_altbaslik_aciklama1'=>$sayfa_madde_altbaslik_aciklama1,
        'sayfa_madde_altbaslik2'=>$sayfa_madde_altbaslik2,
        'sayfa_madde_altbaslik_aciklama2'=>$sayfa_madde_altbaslik_aciklama2,
        'sayfa_madde_altbaslik3'=>$sayfa_madde_altbaslik3,
        'sayfa_madde_altbaslik_aciklama3'=>$sayfa_madde_altbaslik_aciklama3,
        'sayfa_madde_altbaslik4'=>$sayfa_madde_altbaslik4,
        'sayfa_madde_altbaslik_aciklama4'=>$sayfa_madde_altbaslik_aciklama4,
        'sayfa_resim' => $resimyolu1,
        'sayfa_aciklama_resim' => $resimyolu2,

        ]);



    if ($insert) {
        header("Location:kategori-ekle.php?yuklenme=basarili");
    } else {
        header("Location:kategori-ekle.php?yuklenme=basarisiz");
    }

}


if (isset($_GET['kategorisil'])) {

    $kategori_sil = $conn->prepare("DELETE  FROM kategori where kategori_id=:kategori_id");


    $kategori_sil->execute(['kategori_id' => intval($_GET['id'])]);

    if ($kategori_sil) {
        header("Location:kategori-tablo.php?durum=basarili");

    } else {
        header("Location:kategori-tablo.php?durum=basarisiz");
    }


}


if (isset($_POST['kategori_duzenle'])) {


    $kategori_adi = $_POST['kategori_adi'];
    $kategori_durum = $_POST['kategori_durum'];
    $kategori_sira = $_POST['kategori_sira'];
    $sayfa_baslik=$_POST['sayfa_baslik'];
    $sayfa_aciklama_baslik1=$_POST['sayfa_aciklama_baslik1'];
    $sayfa_aciklama1=$_POST['sayfa_aciklama1'];
    $sayfa_aciklama_baslik2=$_POST['sayfa_aciklama_baslik2'];
    $sayfa_aciklama2=$_POST['sayfa_aciklama2'];
    $sayfa_madde_baslik=$_POST['sayfa_madde_baslik'];
    $sayfa_madde_aciklama=$_POST['sayfa_madde_aciklama'];
    $sayfa_madde_altbaslik1=$_POST['sayfa_madde_altbaslik1'];
    $sayfa_madde_altbaslik_aciklama1=$_POST['sayfa_madde_altbaslik_aciklama1'];
    $sayfa_madde_altbaslik2=$_POST['sayfa_madde_altbaslik2'];
    $sayfa_madde_altbaslik_aciklama2=$_POST['sayfa_madde_altbaslik_aciklama2'];
    $sayfa_madde_altbaslik3=$_POST['sayfa_madde_altbaslik3'];
    $sayfa_madde_altbaslik_aciklama3=$_POST['sayfa_madde_altbaslik_aciklama3'];
    $sayfa_madde_altbaslik4=$_POST['sayfa_madde_altbaslik4'];
    $sayfa_madde_altbaslik_aciklama4=$_POST['sayfa_madde_altbaslik_aciklama4'];

    $update = $conn->prepare('update kategori set 
                    kategori_adi=?,
                    kategori_durum=?,
                    kategori_sira=?,
                    sayfa_baslik=?,
                    sayfa_aciklama_baslik1=?,
                    sayfa_aciklama1=?,
                    sayfa_aciklama_baslik2=?,
                    sayfa_aciklama2=?,
                    sayfa_madde_baslik=?,
                    sayfa_madde_aciklama=?,
                    sayfa_madde_altbaslik1=?,
                    sayfa_madde_altbaslik_aciklama1=?,
                    sayfa_madde_altbaslik2=?,
                    sayfa_madde_altbaslik_aciklama2=?,
                    sayfa_madde_altbaslik3=?,
                    sayfa_madde_altbaslik_aciklama3=?,
                    sayfa_madde_altbaslik4=?,
                    sayfa_madde_altbaslik_aciklama4=?
    
                where kategori_id=?');


    $control = $update->execute([
        $_POST['kategori_adi'],
        $_POST['kategori_durum'],
        $_POST['kategori_sira'],
        $_POST['sayfa_baslik'],
        $_POST['sayfa_aciklama_baslik1'],
        $_POST['sayfa_aciklama1'],
        $_POST['sayfa_aciklama_baslik2'],
        $_POST['sayfa_aciklama2'],
        $_POST['sayfa_madde_baslik'],
        $_POST['sayfa_madde_aciklama'],
        $_POST['sayfa_madde_altbaslik1'],
        $_POST['sayfa_madde_altbaslik_aciklama1'],
        $_POST['sayfa_madde_altbaslik2'],
        $_POST['sayfa_madde_altbaslik_aciklama2'],
        $_POST['sayfa_madde_altbaslik3'],
        $_POST['sayfa_madde_altbaslik_aciklama3'],
        $_POST['sayfa_madde_altbaslik4'],
        $_POST['sayfa_madde_altbaslik_aciklama4'],
        $_POST['kategori_id']
    ]);



   if ($control) {
        header("Location:kategori-duzenle.php?id=".$_POST['kategori_id']."&yuklenme=basarili");
    } else {
       header("Location:kategori-duzenle.php?id=".$_POST['kategori_id']."&yuklenme=basarisiz");
   }

}
if (isset($_POST['kategori_kaydet1'])) {


    $id = $_POST['kategori_id'];
    $uploads_dir = 'resimler/kategori_resimler';
    @$tmp_name = $_FILES['sayfa_resim']["tmp_name"];
    @$name = $_FILES['sayfa_resim']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $name = str_replace(' ','',$name);
    $resimyolu1 = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");


    $duzenle = $conn->prepare("UPDATE kategori SET 
                    
     sayfa_resim=:sayfa_resim
                
      WHERE kategori_id= '$id'


                             ");


    $update = $duzenle->execute([


        'sayfa_resim' => $resimyolu1


    ]);


    if ($update) {

        $resimsil1 = $_POST['eskiresim'];
        unlink("resimler/kategori_resimler/$resimsil1");
        header("Location:kategori-duzenle.php?id=".$_POST['kategori_id']."&yuklenme=basarili");
    } else {
        header("Location:kategori-duzenle.php?id=".$_POST['kategori_id']."&yuklenme=basarisiz");
    }

}


if (isset($_POST['kategori_kaydet2'])) {


    $id = $_POST['kategori_id'];
    $uploads_dir = 'resimler/kategori_resimler';
    @$tmp_name = $_FILES['sayfa_aciklama_resim']["tmp_name"];
    @$name = $_FILES['sayfa_aciklama_resim']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $name = str_replace(' ','',$name);
    $resimyolu1 = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");


    $duzenle = $conn->prepare("UPDATE kategori SET 
                    
     sayfa_aciklama_resim=:sayfa_aciklama_resim
                
      WHERE kategori_id= '$id'


                             ");


    $update = $duzenle->execute([


        'sayfa_aciklama_resim' => $resimyolu1


    ]);


    if ($update) {

        $resimsil1 = $_POST['eskiresim1'];
        unlink("resimler/kategori_resimler/$resimsil1");
        header("Location:kategori-duzenle.php?id=".$_POST['kategori_id']."&yuklenme=basarili");
    } else {
        header("Location:kategori-duzenle.php?id=".$_POST['kategori_id']."&yuklenme=basarisiz");
    }

}




if(isset($_POST['kullanici_ekle'])){

    $kullanici_adi = $_POST['kullanici_adi'];
    $kullanici_sifre = $_POST['kullanici_sifre'];
    $kullanici_sifre1 = $_POST['kullanici_sifre1'];

    if ($kullanici_sifre ==  $kullanici_sifre1){


        $hashed_sifre = password_hash($kullanici_sifre, PASSWORD_BCRYPT);

        $duzenle = $conn->prepare("INSERT INTO kullanici SET 
                    
        kullanici_adi =:kullanici_adi,
        kullanici_sifre =:kullanici_sifre
                          
                          ");
        $insert = $duzenle->execute([

            'kullanici_adi' => $kullanici_adi,
            'kullanici_sifre' => $hashed_sifre
        ]);


        if ($insert){
            header("Location:kullanicilar.php?durum=basarili");
        }else{
            header("Locotion:kullanicilar.php?durum=basarisiz");
        }

    }else{
        header("Location:kullanicilar.php");
    }

}
if (isset($_POST['giris_yap'])) {

    $kullanici = $conn->prepare("SELECT * FROM kullanici WHERE kullanici_adi = ?");
    $kullanici->execute(array($_POST['kullanici_adi']));
    $kullanici_cek = $kullanici->fetch(PDO::FETCH_ASSOC);

    if ($kullanici->rowCount() == 1) {
        $hashed_sifre = $kullanici_cek['kullanici_sifre'];

        // Şifreyi doğrulayın
        if (password_verify($_POST['kullanici_sifre'], $hashed_sifre)) {
            // Giriş başarılı, oturum başlatın ve ana sayfaya yönlendirin
            $_SESSION['kullanici_adi'] = $kullanici_cek['kullanici_adi'];
            header("Location: index.php");
            exit();
        } else {
            // Giriş başarısız, hata mesajı gösterin
            header("Location: login.php");
        }
    } else {
        // Kullanıcı bulunamadı, hata mesajı gösterin
        header("Location: login.php");
    }
}


if (isset($_GET['kullanici_sil'])){

    $kullanici_sil = $conn->prepare("DELETE FROM kullanici  WHERE kullanici_id=:kullanici_id");

    $kullanici_sil->execute(['kullanici_id'=> $_GET['id']]);


    if (kullanici_sil) {
        header("Location:kullanicilar.php?durum=basarili");

    } else {
        header("Location:kullanicilar.php?durum=basarisiz");
    }




}




if(isset($_POST['slider_kaydet'])){

    $uploads_dir = 'resimler/slider_resimler';
    @$tmp_name = $_FILES['slider_resim']["tmp_name"];
    @$name = $_FILES['slider_resim']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace(' ','',$name);
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $resimyolu = $sayi1.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

    $slider_baslik=$_POST['slider_baslik'];
    $slider_aciklama=$_POST['slider_aciklama'];
    $slider_sira=$_POST['slider_sira'];
    $slider_durum=$_POST['slider_durum'];


    $duzenle = $conn->prepare("INSERT INTO kayan_resimler SET
            
            slider_baslik=:slider_baslik,
            slider_aciklama=:slider_aciklama,
            slider_sira=:slider_sira,
            slider_durum=:slider_durum,
            slider_resim=:slider_resim
                         
                           
                   ");



    $insert = $duzenle->execute(['slider_baslik' => $slider_baslik, 'slider_aciklama' => $slider_aciklama,
        'slider_sira'=> $slider_sira, 'slider_durum' => $slider_durum, 'slider_resim' => $resimyolu]);


    if ($insert) {



        header("Location:slider-ekle.php?yuklenme=basarili");
    } else {
        header("Location:slider-ekle.php?yuklenme=basarisiz");
    }
}


if (isset($_POST['slider_sil'])) {

    $slider_sil = $conn->prepare("DELETE  FROM kayan_resimler where slider_id=:slider_id");


    $slider_sil->execute(['slider_id' => $_POST['id']]);

    if (slider_sil) {

        $resimsil=$_POST['slider_resim'];
        unlink("resimler/slider_resimler/$resimsil");
        header("Location:slider.php?durum=basarili");

    } else {
        header("Location:slider.php?durum=basarisiz");
    }


}


if (isset($_POST['slider_duzenle'])) {
        $slider_id = $_POST['sid'];
        $slider_baslik = $_POST['slider_baslik'];
        $slider_aciklama = $_POST['slider_aciklama'];
        $slider_sira = $_POST['slider_sira'];
        $slider_durum = $_POST['slider_durum'];


        $duzenle = $conn->prepare("UPDATE kayan_resimler SET 
        slider_baslik=:slider_baslik,
        slider_aciklama=:slider_aciklama,
        slider_sira=:slider_sira,
        slider_durum=:slider_durum
                      
      WHERE slider_id='$slider_id'
            
                             ");

        $update = $duzenle->execute([

            'slider_baslik'=>$_POST['slider_baslik'],
            'slider_aciklama'=>$_POST['slider_aciklama'],
            'slider_sira'=>$_POST['slider_sira'],
            'slider_durum'=>$_POST['slider_durum']

        ]);
    if ($update) {

        header("Location:slider-duzenle.php?id=".$_POST['sid']."&yuklenme=basarili");
    } else {
        header("Location:slider-duzenle.php?id=".$_POST['sid']."&yuklenme=basarisiz");
    }


}


if (isset($_POST['slider_duzenle1'])) {

    $slider_id = $_POST['sid'];
    $uploads_dir2 = 'resimler/slider_resimler';
    @$tmp_name = $_FILES['slider_resim']["tmp_name"];
    @$name = $_FILES['slider_resim']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace(' ', '', $name);
    $name = str_replace('(', '', $name);
    $name = str_replace(')', '', $name);
    $name = str_replace('-', '', $name);
    $resimyolu2 = $sayi1.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir2/$sayi1$name");


    $duzenle = $conn->prepare("UPDATE kayan_resimler SET 
     slider_resim=:slider_resim
      WHERE slider_id = '$slider_id'
                          
                             ");


    $update = $duzenle->execute([

        'slider_resim' => $resimyolu2,

    ]);


    if ($update) {

        $resimsil2 = $_POST['eskiresim2'];
        unlink("resimler/slider_resimler/$resimsil2");


        header("Location:slider-duzenle.php?id=".$_POST['sid']."&yuklenme=basarili");
    } else {
        header("Location:slider-duzenle.php?id=".$_POST['sid']."&yuklenme=basarisiz");
    }

}


if (isset($_POST['anasayfa_kaydet'])) {


    $duzenle = $conn->prepare("UPDATE anasayfa SET 

       sayfa_aciklama_baslik=:sayfa_aciklama_baslik,
       sayfa_aciklama=:sayfa_aciklama,
       sayfa_aciklama_1=:sayfa_aciklama_1,
       sayfa_aciklama_2=:sayfa_aciklama_2,
       calisan_sayisi=:calisan_sayisi,
       isler_sayisi=:isler_sayisi,
       musteri_sayisi=:musteri_sayisi,
        calisan_yazi=:calisan_yazi,
       is_yazi=:is_yazi,
       musteri_yazi=:musteri_yazi,
       bilgi_baslik=:bilgi_baslik,
       bilgi_aciklama=:bilgi_aciklama, 
       bilgi_not=:bilgi_not
           
        WHERE anasayfa_id = 1
                          
                             ");

    $update = $duzenle->execute([

        'sayfa_aciklama_baslik'=>$_POST['sayfa_aciklama_baslik'],
        'sayfa_aciklama'=>$_POST['sayfa_aciklama'],
        'sayfa_aciklama_1'=>$_POST['sayfa_aciklama_1'],
        'sayfa_aciklama_2'=>$_POST['sayfa_aciklama_2'],
        'calisan_sayisi'=>$_POST['calisan_sayisi'],
        'calisan_yazi'=>$_POST['calisan_yazi'],
        'is_yazi'=>$_POST['is_yazi'],
        'musteri_yazi'=>$_POST['musteri_yazi'],
        'isler_sayisi'=>$_POST['isler_sayisi'],
        'musteri_sayisi'=>$_POST['musteri_sayisi'],
        'bilgi_baslik'=>$_POST['bilgi_baslik'],
        'bilgi_aciklama'=>$_POST['bilgi_aciklama'],
        'bilgi_not'=>$_POST['bilgi_not']



    ]);


    if ($update) {


        header("Location:anasayfa-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:anasayfa-duzenle.php?yuklenme=basarisiz");
    }


}





if (isset($_POST['anasayfa_kaydet2'])) {

    $uploads_dir = 'resimler/anasayfa_resimler';
    @$tmp_name = $_FILES['afis_resim']["tmp_name"];
    @$name = $_FILES['afis_resim']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $name = str_replace(' ','',$name);


    $resimyolu1 = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

    $duzenle = $conn->prepare("UPDATE anasayfa SET 
     afis_resim=:afis_resim
      WHERE anasayfa_id = 1
                          
                             ");


    $update = $duzenle->execute([
        'afis_resim' => $resimyolu1

    ]);


    if ($update) {

        $resimsil1 = $_POST['eskiresim1'];
        unlink("resimler/anasayfa_resimler/$resimsil1");
        header("Location:anasayfa-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:anasayfa-duzenle.php?yuklenme=basarisiz");
    }


}


if (isset($_POST['anasayfa_kaydet3'])) {

    $uploads_dir = 'resimler/anasayfa_resimler';
    @$tmp_name = $_FILES['bilgi_resim']["tmp_name"];
    @$name = $_FILES['bilgi_resim']["name"];
    $sayi1 = rand(1, 9999);
    $name = str_replace('(','',$name);
    $name = str_replace(')','',$name);
    $name = str_replace(' ','',$name);


    $resimyolu2 = $sayi1 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi1$name");

    $duzenle = $conn->prepare("UPDATE anasayfa SET 
     bilgi_resim=:bilgi_resim
      WHERE anasayfa_id = 1
                             ");


    $update = $duzenle->execute([
        'bilgi_resim' => $resimyolu2

    ]);


    if ($update) {

        $resimsil2 = $_POST['eskiresim2'];
        unlink("resimler/anasayfa_resimler/$resimsil2");
        header("Location:anasayfa-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:anasayfa-duzenle.php?yuklenme=basarisiz");
    }

}



if(isset($_POST['sayfa_duzenle'])){



    $duzenle = $conn->prepare("UPDATE sayfalar SET
            
            sayfa_baslik=:sayfa_baslik,
            sayfa_aciklama_baslik1=:sayfa_aciklama_baslik1,
            sayfa_aciklama1=:sayfa_aciklama1,
            sayfa_aciklama_baslik2=:sayfa_aciklama_baslik2,
            sayfa_aciklama2=:sayfa_aciklama2,
            sayfa_madde_baslik=:sayfa_madde_baslik,
            sayfa_madde_aciklama=:sayfa_madde_aciklama,
            sayfa_madde_altbaslik1=:sayfa_madde_altbaslik1,
            sayfa_madde_altbaslik_aciklama1=:sayfa_madde_altbaslik_aciklama1,
            sayfa_madde_altbaslik2=:sayfa_madde_altbaslik2,
            sayfa_madde_altbaslik_aciklama2=:sayfa_madde_altbaslik_aciklama2,
            sayfa_madde_altbaslik3=:sayfa_madde_altbaslik3,
            sayfa_madde_altbaslik_aciklama3=:sayfa_madde_altbaslik_aciklama3,
            sayfa_madde_altbaslik4=:sayfa_madde_altbaslik4,
            sayfa_madde_altbaslik_aciklama4=:sayfa_madde_altbaslik_aciklama4
                
            WHERE sayfa_id=1
                         
                           
                   ");



    $insert = $duzenle->execute([

        'sayfa_baslik' => $_POST['sayfa_baslik'],
        'sayfa_aciklama_baslik1'=> $_POST['sayfa_aciklama_baslik1'],
        'sayfa_aciklama1'=> $_POST['sayfa_aciklama1'],
        'sayfa_aciklama_baslik2'=> $_POST['sayfa_aciklama_baslik2'],
        'sayfa_aciklama2'=> $_POST['sayfa_aciklama2'],
        'sayfa_madde_baslik'=>$_POST['sayfa_madde_baslik'],
        'sayfa_madde_aciklama'=> $_POST['sayfa_madde_aciklama'],
        'sayfa_madde_altbaslik1'=> $_POST['sayfa_madde_altbaslik1'],
        'sayfa_madde_altbaslik_aciklama1'=> $_POST['sayfa_madde_altbaslik_aciklama1'],
        'sayfa_madde_altbaslik2' => $_POST['sayfa_madde_altbaslik2'],
        'sayfa_madde_altbaslik_aciklama2' => $_POST['sayfa_madde_altbaslik_aciklama2'],
        'sayfa_madde_altbaslik3' => $_POST['sayfa_madde_altbaslik3'],
        'sayfa_madde_altbaslik_aciklama3' => $_POST['sayfa_madde_altbaslik_aciklama3'],
        'sayfa_madde_altbaslik4' => $_POST['sayfa_madde_altbaslik4'],
        'sayfa_madde_altbaslik_aciklama4' => $_POST['sayfa_madde_altbaslik_aciklama4']
    ]);

    if ($insert) {



        header("Location:sayfa-duzenle.php?yuklenme=basarili");
    } else {
        header("Location:sayfa-duzenle.php?yuklenme=basarisiz");
    }
}

if(isset($_POST['sayfa_kaydet'])){


    $yukleme = $_POST['katid'];
    $sayfa_baslik=$_POST['sayfa_baslik'];
    $sayfa_aciklama_baslik1=$_POST['sayfa_aciklama_baslik1'];
    $sayfa_aciklama1=$_POST['sayfa_aciklama1'];
    $sayfa_aciklama_baslik2=$_POST['sayfa_aciklama_baslik2'];
    $sayfa_aciklama2=$_POST['sayfa_aciklama2'];
    $sayfa_madde_baslik=$_POST['sayfa_madde_baslik'];
    $sayfa_madde_aciklama=$_POST['sayfa_madde_aciklama'];
    $sayfa_madde_altbaslik1=$_POST['sayfa_madde_altbaslik1'];
    $sayfa_madde_altbaslik_aciklama1=$_POST['sayfa_madde_altbaslik_aciklama1'];
    $sayfa_madde_altbaslik2=$_POST['sayfa_madde_altbaslik2'];
    $sayfa_madde_altbaslik_aciklama2=$_POST['sayfa_madde_altbaslik_aciklama2'];
    $sayfa_madde_altbaslik3=$_POST['sayfa_madde_altbaslik3'];
    $sayfa_madde_altbaslik_aciklama3=$_POST['sayfa_madde_altbaslik_aciklama3'];
    $sayfa_madde_altbaslik4=$_POST['sayfa_madde_altbaslik4'];
    $sayfa_madde_altbaslik_aciklama4=$_POST['sayfa_madde_altbaslik_aciklama4'];


    $duzenle = $conn->prepare("INSERT INTO sayfalar SET
            
            sayfa_baslik=:sayfa_baslik,
            sayfa_aciklama_baslik1=:sayfa_aciklama_baslik1,
            sayfa_aciklama1=:sayfa_aciklama1,
            sayfa_aciklama_baslik2=:sayfa_aciklama_baslik2,
            sayfa_aciklama2=:sayfa_aciklama2,
            sayfa_madde_baslik=:sayfa_madde_baslik,
            sayfa_madde_aciklama=:sayfa_madde_aciklama,
            sayfa_madde_altbaslik1=:sayfa_madde_altbaslik1,
            sayfa_madde_altbaslik_aciklama1=:sayfa_madde_altbaslik_aciklama1,
            sayfa_madde_altbaslik2=:sayfa_madde_altbaslik2,
            sayfa_madde_altbaslik_aciklama2=:sayfa_madde_altbaslik_aciklama2,
            sayfa_madde_altbaslik3=:sayfa_madde_altbaslik3,
            sayfa_madde_altbaslik_aciklama3=:sayfa_madde_altbaslik_aciklama3,
            sayfa_madde_altbaslik4=:sayfa_madde_altbaslik4,
            sayfa_madde_altbaslik_aciklama4=:sayfa_madde_altbaslik_aciklama4
                         
                           
                   ");



    $insert = $duzenle->execute([


            'sayfa_baslik'=>$sayfa_baslik,
           'sayfa_aciklama_baslik1'=> $sayfa_aciklama_baslik1,
           'sayfa_aciklama1'=> $sayfa_aciklama1,
           'sayfa_aciklama_baslik2' =>$sayfa_aciklama_baslik2,
           'sayfa_aciklama2'=> $sayfa_aciklama2,
           'sayfa_madde_baslik' =>$sayfa_madde_baslik,
           'sayfa_madde_aciklama' =>$sayfa_madde_aciklama,
           'sayfa_madde_altbaslik1' =>$sayfa_madde_altbaslik1,
           'sayfa_madde_altbaslik_aciklama1' =>$sayfa_madde_altbaslik_aciklama1,
           'sayfa_madde_altbaslik2' =>$sayfa_madde_altbaslik2,
           'sayfa_madde_altbaslik_aciklama2' =>$sayfa_madde_altbaslik_aciklama2,
           'sayfa_madde_altbaslik3' =>$sayfa_madde_altbaslik3,
           'sayfa_madde_altbaslik_aciklama3' =>$sayfa_madde_altbaslik_aciklama3,
           'sayfa_madde_altbaslik4' =>$sayfa_madde_altbaslik4,
           'sayfa_madde_altbaslik_aciklama4' =>$sayfa_madde_altbaslik_aciklama4


    ]);


    if ($insert) {



        header("Location:sayfa-ekle.php?katid=$yukleme&durum=basarili");
    } else {
        header("Location:sayfa-ekle.php?katid=$yukleme&durum=basarisiz");
    }
}





