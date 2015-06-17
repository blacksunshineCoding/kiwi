<?php

if (isset($_SESSION['produkte']) && count($_SESSION['produkte']) > 0) {
	foreach ($_SESSION['produkte'] as $produktId => $produkt) {
		$preis = getRow('SELECT preis FROM produkte WHERE id ="' . sqlEscape($produktId) . '"');
		$_SESSION['produkte'][$produktId]['preis'] = $preis['preis'];
	}
}

if (isset($_POST['aktualisieren']) && $_POST['aktualisieren'] == 1) {
	if (count($_POST['produkte']) > 0) {
		foreach ($_POST['produkte'] as $warenkorbProduktId => $warenkorbProdukt) {
			
			if (isset($warenkorbProdukt['entfernen']) && $warenkorbProdukt['entfernen'] == 1) {
				unset($_SESSION['produkte'][$warenkorbProduktId]);
			}
			
			if (isset($_SESSION['produkte'][$warenkorbProduktId]['id'])) {
				$_SESSION['produkte'][$warenkorbProduktId]['anzahl'] = $warenkorbProdukt['anzahl'];
				$_SESSION['produkte'][$warenkorbProduktId]['size'] = $warenkorbProdukt['size'];
				
				if (isset($_POST['produkte'][$warenkorbProduktId]['signatur']) && $_POST['produkte'][$warenkorbProduktId]['signatur'] == 1) {
					$_SESSION['produkte'][$warenkorbProduktId]['signatur'] = 1;
					$_SESSION['produkte'][$warenkorbProduktId]['preis'] = 200;
				} else {
					$_SESSION['produkte'][$warenkorbProduktId]['signatur'] = 0;
					$_SESSION['produkte'][$warenkorbProduktId]['preis'] = $_SESSION['produkte'][$warenkorbProduktId]['preisOriginal'];
				}
			}
		}
	}
	
	if (isset($_POST['land'])) {
		$_SESSION['land'] = $_POST['land'];
	}
}

$data['produkte'] = idAsIndex(getRows('SELECT * FROM produkte'));

