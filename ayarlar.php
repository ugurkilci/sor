<?php

	session_start();
	include 'ayar.php';
	if($_SESSION){
		$cek = $db->prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
		$cek->execute(array($_SESSION["uye_kadi"]));
		$cekx = $cek->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<base href="<?php echo $base; ?>ayarlar.php">
		<title>Ayarlar - Sor</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>" />

		<meta name="url" content="<?php echo $base; ?>ayarlar.php">
		<meta name="title" content="Sor">
		<meta name="description" content="Sor, arkadaşlarınızdan dürüst geribildirim alabileceğiniz bir web sitedir.">
		<meta property="keywords" content="Sor, KILCI, kilci xyz, kılcı xyz, kılcı sor, kilci sor, soru sor, sor bana, sarahah">
		<meta name="image" content="images/avatar.jpg">
		<meta property="og:title" content="Sor" >
		<meta property="og:url" content="<?php echo $base; ?>ayarlar.php">
		<meta property="og:description" content="Sor, arkadaşlarınızdan dürüst geribildirim alabileceğiniz bir web sitedir.">
		<meta property="og:keywords" content="Sor, KILCI, kilci xyz, kılcı xyz, kılcı sor, kilci sor, soru sor, sor bana, sarahah">
		<meta property="og:image" content="images/avatar.jpg">
		<meta name="author" content="KILCI Sor">
		<meta name="twitter:card" content="@toosbam">
		<meta name="twitter:url" content="<?php echo $base; ?>ayarlar.php">
		<meta name="twitter:title" content="Sor">
		<meta name="twitter:description" content="Sor, arkadaşlarınızdan dürüst geribildirim alabileceğiniz bir web sitedir.">
		<meta name="twitter:image" content="images/avatar.jpg">
		<link rel="icon" href="ico.ico" type="image/ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="475">
		<meta name="viewport" content="width=device-width">
		<meta name="robots" content="index,follow">
		<style>
			body, body:after{
				background-color: #ddd;
			}
		</style>
	</head>
	<body class="is-preload">
		<?php include 'header.php'; ?>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<h1>Ayarlar</h1>
						</header>
						<?php
							if ($_POST) {
								$instagram = htmlspecialchars($_POST["instagram"]);
								$kaynak = file_get_contents("https://www.instagram.com/$instagram/");
								preg_match('<meta property="og:image" content="(.*?)" />', $kaynak, $iglink);
								
								$guncelle = $db->prepare("UPDATE uyeler SET uye_instagram=?, uye_instagramlink=? WHERE uye_kadi=?");
								$guncelle->execute([$instagram, $iglink[1], $_SESSION["uye_kadi"]]);
								
								if ($guncelle) {
									echo '<h2>Başarıyla güncellendi. :)</h2><meta http-equiv="refresh" content="2;URL='.$base.'ayarlar.php">';
								} else {
									echo '<h2>Lanet olsun bir sorun çıktı tekrar dene kanka. :(</h2>';
								}
								
							}
						?>
						<form method="POST" action="">
							<div class="fields">
								<div class="field">
                                    <strong>Instagram Kullanıcı Adı:</strong><input type="text" name="instagram" value="<?php echo $cekx["uye_instagram"]; ?>">
									
								</div>
							</div>
							<ul class="actions special">
                                <li><button type="submit" class="button">Güncelle</button></li>
                            </ul><p>Not: Instagram'ı sadece Instagram fotoğrafınız için kullanmaktayız!</p>
                            <hr>
                                <a href="../../uyelik?p=cikis&devam=sor" class="button">Çıkış Yap</a>
						</form>
					</section>

				<?php include 'footer.php'; }else{ echo'<meta http-equiv="refresh" content="0;index.php">'; } ?>