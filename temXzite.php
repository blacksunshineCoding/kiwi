<!DOCTYPE html>
<html lang="<?php echo $main['lang']; ?>">
	<head>
		<?php
			include_once dirname(__FILE__) . '/modules/headCmp.php';
		?>
	</head>
	<body>
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.3";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
		<div id="template" class="container">
			<header id="header">
				<a id="logo" href=".">
					<img src="images/logo57kkk.png">
					<span class="title">57KKK - Store</span>
				</a>
<!-- 				<div class="fb-like" data-href="https://www.facebook.com/stoffdrueckerelite" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div> -->
				<div class="clear"></div>
			</header>
			<section id="main">
				<?php
					include_once dirname(__FILE__) . '/modules/siteCmp.php';
				?>
			</section>
			<footer id="footer">
			<p class="copyright">Programmierung und Design von <a href="&#109;&#97;&#x69;&#108;&#x74;&#111;&#x3a;&#x73;&#116;&#101;&#102;&#97;&#110;&#95;&#103;&#x72;&#x75;&#98;&#x65;&#114;&#x32;&#64;&#x67;&#109;&#120;&#x2e;&#97;&#x74;">Black Sunshine</a></p>
			</footer>
		</div>
	</body>
</html>