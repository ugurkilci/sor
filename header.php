<header style="background:#fff;padding:20px 5px 10px 10px;" class="actions special">
    <img src="images/sor.png" width="60px" alt="Uğur KILCI - Sor">
    <a href="index.php" class="button">Anasayfa</a>
    <?php
    
        if ($_SESSION) {
            # var
            echo '<a href="'.$_SESSION["uye_kadi"].'" class="button">Ben</a> <a href="sorular.php" class="button">Sorular</a>';
        } else {
            # yok
            echo '<a href="../../uyelik?p=giris&devam=sor" class="button">Giriş Yap</a> <a href="../../uyelik?p=kayit&devam=sorr" class="button">Kayıt Ol</a>';
        }
        
    
    ?>
</header><br />