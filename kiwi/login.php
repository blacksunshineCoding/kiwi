<?php
	if (isset($_POST['benutzername'])) {
		$link = getDbLink();
		$sql = 'SELECT
					*
				FROM
					users
				WHERE
					benutzername LIKE "' . mysqli_real_escape_string($link, $_POST['benutzername']) . '"
				AND
					passwort LIKE "' . mysqli_real_escape_string($link, $_POST['passwort']) . '"';
		$user = getRow($sql);
		
		if (isset($user['id'])) {
			$_SESSION['user'] = $user;
			header('location: index.php');
		} else {
			$error = 'Die eingegebenen Daten sind nicht korrekt!';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="<?php echo $main['xua']; ?>">
		<meta charset="<?php echo $main['charset']; ?>">
		<meta name="description" content="<?php echo $main['description']; ?>">
		<meta name="keywords" content="<?php echo $main['keywords']; ?>">
		<link rel="shortcut icon" href="<?php echo $main['favicon']; ?>" type="image/x-icon">
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="login.css">
		<script src="../js/bootstrap.js"></script>
		<title>Kiwi - Login</title>
	</head>
	<body>
		<div id="template" class="administration login">
			<section id="center">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Administration Login</h3>
					</div>
					<div class="panel-body">
						<form action="index.php" method="post">
							<div class="input-group">
								<input type="text" name="benutzername" class="form-control" placeholder="Benutzername">
							</div>
							<div class="input-group">
								<input type="password" name="passwort" class="form-control" placeholder="Passwort">
							</div>
							<div class="input-group">
								<button type="submit" class="btn btn-default">Anmelden</button>
							</div>
							<?php if (isset($error)) { ?>
								<div class="alert alert-danger" role="alert">
									<?php
										renderParagraph($error);
									?>
								</div>
							<?php } ?>
						</form>
					</div>
				</div>
			</section>
		</div>
	</body>
</html>