<?php
if (isset($_POST['aktualisieren']) && $_POST['aktualisieren'] == 1) {
	if (count($_POST['produkte']) > 0) {
		foreach ($_POST['produkte'] as $warenkorbProduktId => $warenkorbProdukt) {
			if (isset($warenkorbProdukt['entfernen']) && $warenkorbProdukt['entfernen'] == 1) {
				unset($_SESSION['produkte'][$warenkorbProduktId]);
			}
			
			if (isset($_SESSION['produkte'][$warenkorbProduktId]['id'])) {
				$_SESSION['produkte'][$warenkorbProduktId]['anzahl'] = $warenkorbProdukt['anzahl'];
				$_SESSION['produkte'][$warenkorbProduktId]['size'] = $warenkorbProdukt['size'];
			}
		}
	}
}

$data['produkte'] = idAsIndex(getRows('SELECT * FROM produkte'));

