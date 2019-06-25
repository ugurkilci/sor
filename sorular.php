<?php

	session_start();
	include 'ayar.php';
	include 'functions.php';
	require_once('emoji.php');
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
		<base href="<?php echo $base; ?>sorular.php">
		<title>Sorular - Sor</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>" />

		<meta name="url" content="<?php echo $base; ?>sorular.php">
		<meta name="title" content="Sor">
		<meta name="description" content="Sor, arkadaşlarınızdan dürüst geribildirim alabileceğiniz bir web sitedir.">
		<meta property="keywords" content="Sor, KILCI, kilci xyz, kılcı xyz, kılcı sor, kilci sor, soru sor, sor bana, sarahah">
		<meta name="image" content="images/avatar.jpg">
		<meta property="og:title" content="Sor" >
		<meta property="og:url" content="<?php echo $base; ?>sorular.php">
		<meta property="og:description" content="Sor, arkadaşlarınızdan dürüst geribildirim alabileceğiniz bir web sitedir.">
		<meta property="og:keywords" content="Sor, KILCI, kilci xyz, kılcı xyz, kılcı sor, kilci sor, soru sor, sor bana, sarahah">
		<meta property="og:image" content="images/avatar.jpg">
		<meta name="author" content="KILCI Sor">
		<meta name="twitter:card" content="@toosbam">
		<meta name="twitter:url" content="<?php echo $base; ?>sorular.php">
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
		<style>.div{background:#ededed;font-size:17px;border:1px solid #aaa;display:block;text-align:left;padding:10px;margin-bottom:20px;}.fa-times, .fa-instagram{margin-left:5px;}.fa-times{color:darkred;}</style>
	</head>
	<body class="is-preload">
		<?php include 'header.php'; ?>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<h1>Sana Sorulan Sorular</h1>
						</header>
						<?php
							function kisalt($kelime, $str = 10){
								if (strlen($kelime) > $str){
								if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8").'..';
								else $kelime = substr($kelime, 0, $str).'..';
								}
								return $kelime;
							}
							$veri = $db->prepare("SELECT * FROM sor_sorular WHERE sor_kadi=? && sor_onay=? ORDER BY sor_id DESC");
							$veri->execute([$_SESSION["uye_kadi"], 0]);
							$islem = $veri->fetchALL(PDO::FETCH_ASSOC);
							
							foreach($islem as $row){
								echo '
								<div class="div">
									'.Emoji::Decode($row["sor_mesaj"]).'
									<br />
									<span class="icons">
										<a href="https://twitter.com/intent/tweet?text='; echo kisalt(Emoji::Decode($row["sor_mesaj"]), 140); echo'%0D%0ACevap: %0D%0A https://kilci.xyz/proje/sor/'.$base.$row["sor_kadi"].'%3Fp=post%26id='.$row["sor_id"].'" target="_blank" title="Twitterda Paylaş!">
											<i class="fa fa-twitter"></i>
										</a>
										<a href="story.php?uye='.$row["sor_kadi"].'&p=cevap&id='.$row["sor_id"].'" target="_blank" title="İnstagram Hikayede Paylaş!">
											<i class="fa fa-instagram"></i>
										</a>
										<a href="'.$row["sor_kadi"].'?p=delete&id='.$row["sor_id"].'"><i class="fa fa-times"></i></a>
									</span>
								</div>';
							}
						?>
					</section>

				<?php include 'footer.php'; }else{ echo'<meta http-equiv="refresh" content="0;index.php">'; } ?>