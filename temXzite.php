<!DOCTYPE html>
<html lang="<?php echo $main['lang']; ?>">
	<head>
		<?php
			include_once dirname(__FILE__) . '/modules/headCmp.php';
		?>
	</head>
	<body>
		<div id="template">
			<header id="header">
				<div id="logo">
					<a class="logo" href=".">
						<img src="images/logo57kkk.png">
					</a>
				</div>
				<nav id="navigation" class="container">
					<a href="javascript:toggleNav();" class="toggleNav"><i class="fa fa-bars"></i></a>
					<?php
						renderNavigation($main['navigations']['hauptnavigation']);
					?>
					<span class="warenkorbCount">
						<?php
							if (isset($_SESSION['produkte']) && (count($_SESSION['produkte']) != 0)) {
								echo count($_SESSION['produkte']);
							} else {
								echo 0;
							}
						?>
					</span>
				</nav>
			</header>
			<section id="main" class="container">
				<?php
					include_once dirname(__FILE__) . '/modules/siteCmp.php';
				?>
			</section>
			<footer id="footer" class="container">
				<p class="copyright">
					&copy; Programmierung und Design von <a href="&#109;&#97;&#x69;&#108;&#x74;&#111;&#x3a;&#x73;&#116;&#101;&#102;&#97;&#110;&#95;&#103;&#x72;&#x75;&#98;&#x65;&#114;&#x32;&#64;&#x67;&#109;&#120;&#x2e;&#97;&#x74;">Black Sunshine</a>
				</p>
			</footer>
		</div>
	</body>
</html>