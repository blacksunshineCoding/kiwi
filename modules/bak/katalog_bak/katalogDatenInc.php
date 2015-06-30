<?php

$_SESSION['completeSteps']['warenkorb'] = true;

$data['produkte'] = idAsIndex(getRows('SELECT * FROM produkte'));

$data['vornameClass'] = '';
$data['nachnameClass'] = '';
$data['strasseClass'] = '';
$data['hausnummerClass'] = '';
$data['adresszusatzClass'] = '';
$data['plzClass'] = '';
$data['ortClass'] = '';
$data['landClass'] = '';
$data['emailadresseClass'] = '';

if (isset($_POST['abschicken'])) {
	switch ($_GET['ansicht']) {
		case 'daten':
			
			$data['vornameClass'] = 'success';
			$data['nachnameClass'] = 'success';
			$data['strasseClass'] = 'success';
			$data['hausnummerClass'] = 'success';
			$data['adresszusatzClass'] = 'success';
			$data['plzClass'] = 'success';
			$data['ortClass'] = 'success';
			$data['landClass'] = 'success';
			$data['emailadresseClass'] = 'success';
			
			if (!isset($_POST['adresse']['vorname']) || empty($_POST['adresse']['vorname'])) {
				$allErrors['vorname'] = true;
				$data['vornameClass'] = 'failure';
			}
			
			if (!isset($_POST['adresse']['nachname']) || empty($_POST['adresse']['nachname'])) {
				$allErrors['nachname'] = true;
				$data['nachnameClass'] = 'failure';
			}
			
			if (!isset($_POST['adresse']['strasse']) || empty($_POST['adresse']['strasse'])) {
				$allErrors['strasse'] = true;
				$data['strasseClass'] = 'failure';
			}
			
			if (!isset($_POST['adresse']['hausnummer']) || empty($_POST['adresse']['hausnummer'])) {
				$allErrors['hausnummer'] = true;
				$data['hausnummerClass'] = 'failure';
			}

			if (!isset($_POST['adresse']['plz']) || empty($_POST['adresse']['plz'])) {
				$allErrors['plz'] = true;
				$data['plzClass'] = 'failure';
			}

			if (!isset($_POST['adresse']['ort']) || empty($_POST['adresse']['ort'])) {
				$allErrors['ort'] = true;
				$data['ortClass'] = 'failure';
			}
			
			if (!isset($_POST['adresse']['land']) || empty($_POST['adresse']['land'])) {
				$allErrors['land'] = true;
				$data['landClass'] = 'failure';
			} else {
				$_SESSION['land'] = $_POST['adresse']['land'];
			}
			
			if (!isset($_POST['adresse']['emailadresse']) || empty($_POST['adresse']['emailadresse'])) {
				$allErrors['emailadresse'] = true;
				$data['emailadresseClass'] = 'failure';
			} elseif(isset($_POST['adresse']['emailadresse']) && !empty($_POST['adresse']['emailadresse'])) {
				if (!validEmail($_POST['adresse']['emailadresse'])) {
					$allErrors['emailadresse'] = true;
					$data['emailadresseClass'] = 'failure';
						
					$data['emailadresseValid'] = false;
					$data['emailadresseFeedback']['type'] = 'danger';
					$data['emailadresseFeedback']['text'] = 'Die eingegebene Emailadresse ist ungültig';
				}
			}
			
			$_SESSION['adresse'] = $_POST['adresse'];
			
			if (isset($allErrors)) {
				$data['allErrors'] = $allErrors;
			} else {
				header('location: index.php?ansicht=uebersicht');
			}
			
			break;
	}
}

if (!isset($allErrors) && isset($_SESSION['adresse'])) {
	$_SESSION['completeSteps']['daten'] = true;
}
