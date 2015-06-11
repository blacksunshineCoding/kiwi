<?php
	include_once dirname(__FILE__) . '/modules/mainInc.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $main['lang']; ?>">
	<head>
		<meta http-equiv="X-UA-Compatible" content="<?php echo $main['xua']; ?>">
		<meta charset="<?php echo $main['charset']; ?>">
		<meta name="description" content="<?php echo $main['description']; ?>">
		<meta name="keywords" content="<?php echo $main['keywords']; ?>">
		<link rel="shortcut icon" href="<?php echo $main['favicon']; ?>" type="image/x-icon">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="kiwi.css">
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/jquery-ui.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="kiwi.js"></script>
		<title>Kiwi - Administration</title>
	</head>
	<body>
		<div id="template">
			<header id="header">
				<figure id="logo">
					<a href=".">
						<img src="../images/logo.png" class="image" width="50" height="50" alt="Kiwi">
						<span class="title">Kiwi</span>
					</a>
					<div class="clear"></div>
				</figure>
				<nav id="top">
					<?php
						include_once dirname(__FILE__) . '/modules/top/topCmp.php';
					?>
				</nav>
				<div class="clear"></div>
			</header>
			<nav id="side">
				<?php
					include_once dirname(__FILE__) . '/modules/side/sideCmp.php';
				?>
			</nav>
			<section id="main">
				<?php
					include_once dirname(__FILE__) . '/modules/mainCmp.php';
				?>
			</section>
		</div>
	</body>
</html>