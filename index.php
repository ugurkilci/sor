<?php
	session_start();
	include '../ayar.php';
	$base = "http://kilci.xyz/sor/";
	$sorgu = $db->prepare("SELECT COUNT(*) FROM sor_sorular");
	$sorgu->execute();
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
		<base href="<?php echo $base; ?>">
		<title>Sor</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>" />

		<meta name="url" content="<?php echo $base; ?>">
		<meta name="title" content="Sor">
		<meta name="description" content="Sor, arkadaşlarınızdan dürüst geribildirim alabileceğiniz bir web sitedir.">
		<meta property="keywords" content="Sor, KILCI, kilci xyz, kılcı xyz, kılcı sor, kilci sor, soru sor, sor bana, sarahah">
		<meta name="image" content="images/avatar.jpg">
		<meta property="og:title" content="Sor" >
		<meta property="og:url" content="<?php echo $base; ?>">
		<meta property="og:description" content="Sor, arkadaşlarınızdan dürüst geribildirim alabileceğiniz bir web sitedir.">
		<meta property="og:keywords" content="Sor, KILCI, kilci xyz, kılcı xyz, kılcı sor, kilci sor, soru sor, sor bana, sarahah">
		<meta property="og:image" content="images/avatar.jpg">
		<meta name="author" content="KILCI Sor">
		<meta name="twitter:card" content="@toosbam">
		<meta name="twitter:url" content="<?php echo $base; ?>">
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
	</head>
	<body class="is-preload">
		<?php include 'header.php'; ?>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
				
					<section id="main">
						<h1>Sor Nedir?</h1>
						<p>Arkadaşlarınızdan dürüst geribildirim alabileceğiniz bir web sitesidir.</p>
						<h1>Duyurular</h1>
						<a href="images/rozetler.PNG" style="background:red;color:#fff;padding:5px;border-radius:5px;" target="_blank">* <strong style="color:#fff;">YENİ</strong> rozetler özelliği eklendi!</a>
						<p>> <strong>Instagram</strong> hikayede paylaş özelliği getirildi!</p>
						<hr>
						<h2>Biz güzeliz diğerleri çirkin.</h2>
						<h3>Toplam <?php echo $say?> soru soruldu.</h3>
						<hr>
						<h2>En Çok Soru Sorulanlar</h2>
						<?php
							$ce = $db->prepare("SELECT * FROM uyeler ORDER BY uye_soru DESC LIMIT 5");
							$ce->execute();
							$cek = $ce->fetchALL(PDO::FETCH_ASSOC);

							foreach ($cek as $row) {
							echo '<a href="'.$row["uye_kadi"].'" style="width:100%;" class="button" title="'.$row["uye_adsoyad"].'">'.$row["uye_adsoyad"].' ('.$row["uye_soru"].')</a><br /><br />';
							}
						?>
						<hr>
						<a href="bugavcilari.php" style="width:100%;" class="button" title="Sor Bug Avcıları">Sor Bug Avcıları</a>
						<br /><br />
						<a href="https://goo.gl/forms/BPDCmCyfmkZBlBdx1" style="width:100%;" class="button" target="_blank" title="Feedback Yap!">Feedback Yap!</a>
					</section>

				<?php include 'footer.php'; ?>