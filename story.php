<?php

include 'ayar.php';
require_once('emoji.php');

function duzelti($a){
    $normal = array(
        "i"
    );

    $sekilli = array(
        "İ"
    );
    return str_replace($normal,$sekilli,$a);
}

function duzelt($a){
    $normal = array(
        '&quot;'
    );

    $sekilli = array(
        '"'
    );
    return str_replace($normal,$sekilli,$a);
}

$uye        = @$_GET["uye"];
$id         = @$_GET["id"];
$p          = @$_GET["p"];

$cek0       = $db->prepare("SELECT * FROM sor_sorular WHERE sor_kadi=? && sor_id=?");
$cek0       ->execute(array(htmlspecialchars( $uye ), htmlspecialchars( $id )));
$cekx0      = $cek0->fetch(PDO::FETCH_ASSOC);

$cek        = $db->prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$cek        ->execute(array(htmlspecialchars( $uye )));
$cekx       = $cek->fetch(PDO::FETCH_ASSOC);

$sorux      = duzelt("Soru: ".Emoji::Decode($cekx0["sor_mesaj"]));
$soru       = wordwrap($sorux, 50, "\n", true);

$adsoyad    = duzelti($cekx["uye_adsoyad"]);
$kadi       = duzelti("@".$cekx["uye_kadi"]);
$link       = strtolower("https://kilci.xyz/sor/".$cekx["uye_kadi"]);
$davet      = "Merhaba ben ".$cekx["uye_adsoyad"].",\nbana toplam ".$cekx["uye_soru"]." tane soru soruldu.\n\nPeki ".($cekx["uye_soru"] + 1).". olmak ister misin?";

$fligram    = imagecreatefromjpeg($cekx["uye_instagramlink"]);
$resim      = imagecreatefromjpeg('images/story.jpg');
$resim2     = imagecreatefromjpeg('images/hikaye.jpg');

$konum_x    = imagesx($fligram);
$konum_y    = imagesy($fligram);

###########################################
$font   = "assets/fonts/bebas.ttf"; // Font dosyası ve yolunu tanımlıyoruz
$font2  = "assets/fonts/arial.ttf"; // Font dosyası ve yolunu tanımlıyoruz

// Davet
$marge_right    = 790;
$marge_bottom   = 1190;

$boyut  = 70;
$sol    = 140;
$ust    = 830;

$boyut2  = 40;
$sol2    = 140;
$ust2    = 900;

$boyut3  = 26;
$sol3    = 220;
$ust3    = 1403;

$boyut4  = 30;
$sol4    = 140;
$ust4    = 1050;

// Cevap
$marge_rightc    = 790;
$marge_bottomc   = 1300;

$boyutc  = 70;
$solc    = 140;
$ustc    = 720;

$boyut2c  = 40;
$sol2c    = 140;
$ust2c    = 780;

$boyut3c  = 26;
$sol3c    = 220;
$ust3c    = 1573;

$boyut4c  = 28;
$sol4c    = 140;
$ust4c    = 850;

switch ($p) {
    case 'cevap':
        $siyah  = imagecolorallocate($resim2, 0, 0, 0);
        imagecopy($resim2, $fligram, imagesx($resim2) - $konum_x - $marge_rightc, imagesy($resim2) - $konum_y - $marge_bottomc, 0, 0, imagesx($fligram), imagesy($fligram));

        imagettftext($resim2, $boyutc, 0, $solc, $ustc, $siyah, $font, $adsoyad);
        imagettftext($resim2, $boyut2c, 0, $sol2c, $ust2c, $siyah, $font, $kadi);
        imagettftext($resim2, $boyut3c, 0, $sol3c, $ust3c, $siyah, $font2, $link);
        imagettftext($resim2, $boyut4c, 0, $sol4c, $ust4c, $siyah, $font2, $soru);

        header('Content-type: image/jpeg');

        imagejpeg($resim2);
        imagedestroy($resim2);
        break;
    
    default:
        $siyah  = imagecolorallocate($resim, 0, 0, 0);
        imagecopy($resim, $fligram, imagesx($resim) - $konum_x - $marge_right, imagesy($resim) - $konum_y - $marge_bottom, 0, 0, imagesx($fligram), imagesy($fligram));

        imagettftext($resim, $boyut, 0, $sol, $ust, $siyah, $font, $adsoyad);
        imagettftext($resim, $boyut2, 0, $sol2, $ust2, $siyah, $font, $kadi);
        imagettftext($resim, $boyut3, 0, $sol3, $ust3, $siyah, $font2, $link);
        imagettftext($resim, $boyut4, 0, $sol4, $ust4, $siyah, $font2, $davet);
        
        header('Content-type: image/jpeg');

        imagejpeg($resim);
        imagedestroy($resim);
        break;
}

?>
