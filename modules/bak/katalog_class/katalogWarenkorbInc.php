<?php
$data['lagerbestandFeedback'] = '';

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
				
				$produktSizeVorhanden = getRow('SELECT * FROM produktvarianten WHERE produktId = ' . $produktId . ' AND variante LIKE "Größe" AND varianteOption LIKE "' . sqlEscape($warenkorbProdukt['size'])  . '"');
				
				if ($warenkorbProdukt['anzahl'] > $produktSizeVorhanden['lagerbestand']) {
					$_SESSION['produkte'][$warenkorbProduktId]['anzahl'] = $produktSizeVorhanden['lagerbestand'];
					$data['lagerbestandFeedback']['type'] = 'warning';
					$data['lagerbestandFeedback']['text'] = 'Die gewünschte Menge des Produktes ist größer als der Lagerbestand, die Menge wurde auf die vorrätige Menge reduziert';
				}
				
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

foreach ($data['produkte'] as $produktEintragId => $produktEintrag) {
	$varianten = getRows('SELECT * FROM produktvarianten WHERE produktId = ' . $produktEintrag['id'] . ' ORDER BY id ASC');
	if ((isset($varianten)) && is_array($varianten) && (count($varianten) != 0)) {
		unset($variantenNew);
		foreach ($varianten as $varianteId => $variante) {
			$variantenNew[$variante['variante']]['entries'][] = $variante;
			$variantenNew[$variante['variante']]['optionList'][] = $variante['varianteOption'];
		}
		$data['produkte'][$produktEintragId]['varianten'] = $variantenNew;
	}

}