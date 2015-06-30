<?php
$data['produkte']['entries'] = getRows('SELECT * FROM produkte WHERE online = 1 ORDER BY id ASC');

foreach ($data['produkte']['entries'] as $produktEintragId => $produktEintrag) {
	$varianten = getRows('SELECT * FROM produktvarianten WHERE produktId = ' . $produktEintrag['id'] . ' ORDER BY id ASC');
	if ((isset($varianten)) && is_array($varianten) && (count($varianten) != 0)) {
		unset($variantenNew);
		foreach ($varianten as $varianteId => $variante) {
			$variantenNew[$variante['variante']]['entries'][] = $variante;
			$variantenNew[$variante['variante']]['optionList'][] = $variante['varianteOption'];
		}
		$data['produkte']['entries'][$produktEintragId]['varianten'] = $variantenNew;
	}
	
}

if (isset($_POST['warenkorb'])) {
	$_POST['produkt']['anzahl'] = 1;
	$_SESSION['produkte'][$_POST['produkt']['id']] = $_POST['produkt'];
	$_SESSION['produkte'][$_POST['produkt']['id']]['preisOriginal'] = $_POST['produkt']['preis'];
	$data['feedback'][$_POST['produkt']['id']]['type'] = 'success';
	$data['feedback'][$_POST['produkt']['id']]['text'] = 'Das Produkt wurde zum Warenkorb hinzugefügt';
}

$data['warenkorbLink'] = 'index.php?ansicht=warenkorb';

if (isset($_GET['nodesId'])) {
	$data['warenkorbLink'] = 'index.php?nodesId=' . $_GET['nodesId'] . '&ansicht=warenkorb';
} else {
	$data['warenkorbLink'] = 'index.php?ansicht=warenkorb';
}