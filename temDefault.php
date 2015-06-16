<!DOCTYPE html>
<html lang="<?php echo $main['lang']; ?>">
	<head>
		<?php
			include_once dirname(__FILE__) . '/modules/headCmp.php';
		?>
	</head>
	<body>
		<div id="template">
			<header id="header">##HEADER</header>
			<nav id="navigation">
				<?php
					renderNavigation($main['navigations']['hauptnavigation']);
				?>
			</nav>
			<section id="main">
				<?php
					include_once dirname(__FILE__) . '/modules/siteCmp.php';
				?>
			</section>
			<footer id="footer">##FOOTER</footer>
		</div>
	</body>
</html>