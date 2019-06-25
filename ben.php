<?php

	session_start();
	include 'ayar.php';
    require_once('emoji.php');
    require_once('functions.php');

	$uye 	= @$_GET["uye"];
	$p 		= @$_GET["p"];
	$id 	= @$_GET["id"];

	$cek = $db->prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
	$cek->execute(array($uye));
	$cekx = $cek->fetch(PDO::FETCH_ASSOC);

	$soru = $cekx["uye_soru"] + 1;

	$cekz = $db->prepare("SELECT * FROM uyeler WHERE uye_kadi =:uye_kadi");
	$cekz->execute(array('uye_kadi'=>$uye));
	$saydirma = $cekz->rowCount();
	
	if($saydirma >0){
		if ($cekx["uye_instagramlink"]) {
			$iglink = $cekx["uye_instagramlink"];
		} else {
			$iglink = "images/avatar.jpg";
		}

		if ($cekx["uye_instagram"]) {
			$instagram = $cekx["uye_instagram"];
		} else {
			$instagram = "ugur2nd";
		}
		$sorgu = $db->prepare("SELECT COUNT(*) FROM sor_sorular WHERE sor_kadi=? && sor_onay=?");
		$sorgu->execute(array($uye, 0));
		$say = $sorgu->fetchColumn();
?>
<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<base href="<?php echo $base.$uye; ?>">
		<title><?php echo $cekx["uye_adsoyad"]; ?> - Sor</title>
		<meta charset="utf-8" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>" />
		<meta name="url" content="<?php echo $base.$uye; ?>">
		<meta name="title" content="<?php echo $cekx["uye_adsoyad"]; ?> - Sor">
		<meta name="description" content="Merhaba ben <?php echo $cekx["uye_adsoyad"]; ?> hadi bana soru sor. :) kilci.xyz/sor/<?php echo $uye; ?>">
		<meta property="keywords" content="KILCI, kilci xyz, kılcı xyz, kılcı sor, kilci sor, soru sor, sor bana, sarahah, anonimsin, <?php echo $cekx["uye_adsoyad"]; ?>, <?php echo $uye; ?>">
		<meta name="image" content="<?php echo $iglink; ?>">
		<meta property="og:title" content="<?php echo $cekx["uye_adsoyad"]; ?> - Sor" >
		<meta property="og:url" content="<?php echo $base.$uye; ?>">
		<meta property="og:description" content="Merhaba ben <?php echo $cekx["uye_adsoyad"]; ?> hadi bana soru sor. :) kilci.xyz/sor/<?php echo $uye; ?>">
		<meta property="og:keywords" content="KILCI, kilci xyz, kılcı xyz, kılcı sor, kilci sor, soru sor, sor bana, sarahah, anonimsin, <?php echo $cekx["uye_adsoyad"]; ?>, <?php echo $uye; ?>">
		<meta property="og:image" content="<?php echo $iglink; ?>">
		<meta name="author" content="KILCI Sor">
		<meta name="twitter:card" content="@toosbam">
		<meta name="twitter:url" content="<?php echo $base.$uye; ?>">
		<meta name="twitter:title" content="<?php echo $cekx["uye_adsoyad"]; ?> - Sor">
		<meta name="twitter:description" content="Merhaba ben <?php echo $cekx["uye_adsoyad"]; ?> hadi bana soru sor. :) kilci.xyz/sor/<?php echo $uye; ?>">
		<meta name="twitter:image" content="<?php echo $iglink; ?>">
		<link rel="icon" href="ico.ico" type="image/ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="475">
		<meta name="viewport" content="width=device-width">
		<meta name="robots" content="index,follow">
		<?php
			if (!$_SESSION) {
				echo '<style>.tanit{background:#fff;color:#000;padding:5px;border:1px solid #aaa;border-radius:5px;position:fixed;bottom:10px;right:10px;z-index: 3;}.tanit:hover{background:#ddd;border:1px solid #000;}</style>';
			}elseif($p || $id){
				echo '<style>.a2{border-radius:100%;width:64px;}
				.div{background:#ededed;font-size:17px;border:1px solid #aaa;display:block;text-align:left;padding:10px;margin-bottom:20px;}</style>';
			}
		?>
	</head>
	<body class="is-preload">
		<?php
			if (!$_SESSION) {
				echo '<a href="../uyelik?p=kayit" class="tanit">Kendi profilini oluştur</a>';
			}
		?>
		<?php include 'header.php'; ?>
		<!-- Wrapper -->
			<div id="wrapper">
				<section id="main">
			<?php switch ($p) { 
				case 'delete':
				$cekzx = $db->prepare("SELECT * FROM sor_sorular WHERE sor_id =:sor_id");
				$cekzx->execute(array('sor_id'=>$id));
				$saydirmax = $cekzx->rowCount();
				
				if($saydirmax >0){
					$ceki = $db->prepare("SELECT * FROM sor_sorular WHERE sor_id=?");
					$ceki->execute(array($id));
					$cekxi = $ceki->fetch(PDO::FETCH_ASSOC);
					
					if ($cekxi["sor_kadi"] == $_SESSION["uye_kadi"]) {

						if ($_POST) {
							$code = $_POST["code"];
							$sil = $db->prepare("UPDATE sor_sorular SET sor_onay=? WHERE sor_id=? && sor_kadi=?");
							$sil->execute([1, $id, $_SESSION["uye_kadi"]]);

							if ($sil) {
								echo '<header><h1>Silindi. :)</h1></header>';
								echo '<meta http-equiv="refresh" content="2;URL=sorular.php">';
							} else {
								echo '<header><h1>Silinemedi. :(</h1</header>>';
								echo '<meta http-equiv="refresh" content="2;URL=sorular.php">';
							}
							
						}else{
							echo '<header>
								<h1>Soruyu silecek misin?</h1>
								<p class="div">'.Emoji::Decode($cekxi["sor_mesaj"]).'</p>
							</header>
							<form action="" method="POST">
							<input type="hidden" name="code" value="'.rand(1,9999).'">
							<button type="submit" style="width:100%;" class="button">Sil</button><br /><br />
							<a href="http://kilci.xyz/sor/sorular.php" style="width:100%;" class="button">Geri Dön</a>
						</form>';
						}
					}else{ echo '<meta http-equiv="refresh" content="0;URL='.$uye.'">'; } }else{ echo '<meta http-equiv="refresh" content="0;URL='.$uye.'">'; }
					break;

				case 'post':
				$cekzx = $db->prepare("SELECT * FROM sor_sorular WHERE sor_id =:sor_id");
				$cekzx->execute(array('sor_id'=>$id));
				$saydirmax = $cekzx->rowCount();
				
				if($saydirmax >0){
					$ceki = $db->prepare("SELECT * FROM sor_sorular WHERE sor_id=?");
					$ceki->execute(array($id));
					$cekxi = $ceki->fetch(PDO::FETCH_ASSOC);
					
					if ($uye == $cekxi["sor_kadi"]) {
			?>
						<header style="text-align:left;">
							<img src="<?php echo $iglink; ?>" title="<?php echo $cekx["uye_adsoyad"]; ?> - Sor" class="a2" alt="<?php echo $cekx["uye_adsoyad"]; ?> - Sor" />
							<br /><a href="<?php echo $uye; ?>" title="<?php echo $cekx["uye_adsoyad"]; ?>"><strong><?php echo $cekx["uye_adsoyad"]; ?></strong> <em>@<?php echo $uye; ?></em></a>
						</header>
						<p class="div"><?php echo Emoji::Decode($cekxi["sor_mesaj"]); ?></p>
						<div class="icons">
							<a href="https://twitter.com/intent/tweet?text=Hadi bana soru sor, https://kilci.xyz/sor/<?php echo $uye; ?>&hashtags=Sor&via=ugur2nd&original_referer=http://kilci.xyz/sor/<?php echo $uye; ?>" target="_blank" title="Twitter'da Paylaş!"><i class="fa fa-twitter"> Paylaş</i></a> - 
							<a href="http://kilci.xyz/sor/story.php?uye=<?php echo $uye."&p=cevap&id=".$cekxi["sor_id"]; ?>" target="_blank" title="Instagram Hikayede Paylaş!"><i class="fa fa-instagram"> Hikaye At</i></a>
						</div>
						
				<?php }else{ echo '<meta http-equiv="refresh" content="0;URL='.$uye.'">'; } }else{ echo '<meta http-equiv="refresh" content="0;URL='.$uye.'">'; } break; default: ?>
                        <header>
                            <a href="images/rozetler.PNG" target="_blank" class="rozet"><?php rozet($cekx["uye_soru"]); ?> <strong title="<?php rozetyazi($cekx["uye_soru"]); ?>"><?php rozetyazi($cekx["uye_soru"]); ?></strong></a>
							<span class="avatar"><img src="<?php echo $iglink; ?>" title="<?php echo $cekx["uye_adsoyad"]; ?> - Sor" alt="<?php echo $cekx["uye_adsoyad"]; ?> - Sor" /></span>
							<h1><?php echo $cekx["uye_adsoyad"]; ?></h1>
							<small>Toplam <?php echo $cekx["uye_soru"]?> soru soruldu.</small>
							<div class="icons">
							<a href="https://twitter.com/intent/tweet?text=Hadi bana soru sor, https://kilci.xyz/sor/<?php echo $uye; ?>&hashtags=Sor&via=ugur2nd&original_referer=http://kilci.xyz/sor/<?php echo $uye; ?>" target="_blank" title="Twitter'da Paylaş!"><i class="fa fa-twitter"> Paylaş</i></a> - 
							<a href="http://kilci.xyz/sor/story.php?uye=<?php echo $uye; ?>" target="_blank" title="Instagram Hikayede Paylaş!"><i class="fa fa-instagram"> Hikaye At</i></a>
							</div>
						</header>
						<h2>Soru Sor!</h2>
						<?php

							if ($_POST) {
								$message 	= htmlspecialchars(Emoji::Encode(@$_POST["message"]));
								$message2 	= substr($message, 40);
								$headers 	= 'From: ' . "kilcixyz@gmail.com". "rn";
								$mmesaj 	= "Merhaba SOR ile biri sana ".$cekx["uye_soru"].". sorunu sordu. Soru: $message2... devamı için: http://kilci.xyz/sor adresini ziyaret ediniz. İyi günler.  ";
								mail($cekx["uye_eposta"], "SOR ile ".$cekx["uye_soru"].". soru", $mmesaj, $headers);

								$guncelle = $db->prepare("UPDATE uyeler SET uye_soru=? WHERE uye_kadi=?");
								$guncelle->execute([$soru, $uye]);

								if ($guncelle) {
									$ekle = $db->prepare("INSERT INTO sor_sorular SET sor_kadi=?, sor_mesaj=?");
									$ekle->execute([$uye, $message]);

									if ($ekle) {
										echo '<h2>Soru sordun istersen bir daha sor. :)</h2><meta http-equiv="refresh" content="2;URL=http://kilci.xyz/sor/'.$uye.'">';
									} else {
										echo '<h2>Lanet olsun bir sorun çıktı tekrar dene kanka. :(</h2>';
									}
								} else {
									echo '<h2>Lanet olsun bir sorun çıktı tekrar dene kanka. :(</h2>';
								}
							} else {
								echo '<form method="POST" action="">
									<div class="fields">
										<div class="field">
											<textarea name="message" id="message" placeholder="Mesaj" rows="4"></textarea>
										</div>
									</div>
									<ul class="actions special">
										<li><button type="submit" style="width:100%;" class="button">Hemen Sor</button></li>
									</ul>
								</form>';
							}
							if ($_SESSION["uye_kadi"] == $uye) {
								echo '<br /><a href="ayarlar.php" style="width:100%;" class="button">Ayarlar veya Çıkış</a>';
							}
							
						?>
						<hr />
						
						<footer>
							<ul class="icons">
							<li><a href="https://instagram.com/<?php echo $instagram; ?>/?utm_source=kilci.xyz/sor" target="_blank" class="fa-instagram">Instagram</a></li>
							</ul>
						</footer>
						<?php break; } ?>
					</section>

				<?php
					include 'footer.php';
					}else{ header("LOCATION:index.php"); }
				?>