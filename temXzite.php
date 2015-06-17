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
		<div id="template">
			<header id="header">
				<div id="logo">
					<a class="logo" href=".">
						<img src="images/logo57kkk.png">
					</a>
					<h1>57KKK Store</h1>
				</div>
				<nav id="navigation">
					<?php
						renderNavigation($main['navigations']['hauptnavigation']);
					?>
				</nav>
			</header>
			<section id="main">
				<?php
					include_once dirname(__FILE__) . '/modules/siteCmp.php';
				?>
			</section>
			<footer id="footer">
				<p class="copyright">
					&copy; Programmierung und Design von <a href="&#109;&#97;&#x69;&#108;&#x74;&#111;&#x3a;&#x73;&#116;&#101;&#102;&#97;&#110;&#95;&#103;&#x72;&#x75;&#98;&#x65;&#114;&#x32;&#64;&#x67;&#109;&#120;&#x2e;&#97;&#x74;">Black Sunshine</a>
				</p>
			</footer>
		</div>
	</body>
</html>