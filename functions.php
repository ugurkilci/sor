<?php
$base = "http://kilci.xyz/sor/";
    function rozet($a){
        if ($a >= 0 && $a <=5) { // bebek
            echo '<img src="images/rozet/bebek.png" width="32" height="32" alt="Bebek Rozeti" title="Bebek Rozeti" />';
        } elseif ($a >= 6 && $a <=15) { // çocuk
            echo '<img src="images/rozet/cocuk.png" width="32" height="32" alt="Çocuk Rozeti" title="Çocuk Rozeti" />';
        } elseif ($a >= 16 && $a <=45) { // sevecen
            echo '<img src="images/rozet/sevecen.png" width="32" height="32" alt="Sevecen Rozeti" title="Sevecen Rozeti" />';
        } elseif ($a >= 46 && $a <=70) { // ponçik
            echo '<img src="images/rozet/poncik.png" width="32" height="32" alt="Ponçik Rozeti" title="Ponçik Rozeti" />';
        } elseif ($a >= 71 && $a <=99) { // tonton
            echo '<img src="images/rozet/tonton.png" width="32" height="32" alt="Tonton Rozeti" title="Tonton Rozeti" />';
        } elseif ($a >= 100 && $a <=150) { // arkadaş canlısı
            echo '<img src="images/rozet/arkadascanlisi.png" width="32" height="32" alt="Arkadaş Canlısı Rozeti" title="Arkadaş Canlısı Rozeti" />';
        } elseif ($a >= 151 && $a <=250) { // kanka
            echo '<img src="images/rozet/kanka.png" width="32" height="32" alt="Kanka Rozeti" title="Kanka Rozeti" />';
        } elseif ($a >= 251 && $a <=499) { // havalı
            echo '<img src="images/rozet/havali.png" width="32" height="32" alt="Havalı Rozeti" title="Havalı Rozeti" />';
        } elseif ($a >= 500 && $a <=999) { // popüler
            echo '<img src="images/rozet/populer.png" width="32" height="32" alt="Popüler Rozeti" title="Popüler Rozeti" />';
        } elseif ($a >= 1000) { // fenomen
            echo '<img src="images/rozet/fenomen.png" width="32" height="32" alt="Fenomen Rozeti" title="Fenomen Rozeti" />';
        }
        
    }

    function rozetyazi($a){
        if ($a >= 0 && $a <=5) { // bebek
            echo 'Bebek';
        } elseif ($a >= 6 && $a <=15) { // çocuk
            echo 'Çocuk';
        } elseif ($a >= 16 && $a <=45) { // sevecen
            echo 'Sevecen';
        } elseif ($a >= 46 && $a <=70) { // ponçik
            echo 'Ponçik';
        } elseif ($a >= 71 && $a <=99) { // tonton
            echo 'Tonton';
        } elseif ($a >= 100 && $a <=150) { // arkadaş canlısı
            echo 'Arkadaş Canlısı';
        } elseif ($a >= 151 && $a <=250) { // kanka
            echo 'Kanka';
        } elseif ($a >= 251 && $a <=499) { // havalı
            echo 'Havalı';
        } elseif ($a >= 500 && $a <=999) { // popüler
            echo 'Popüler';
        } elseif ($a >= 1000) { // fenomen
            echo 'Fenomen';
        }
        
    }