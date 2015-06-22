<?php
$warenkorbAktiv = '';
$datenAktiv = '';
$uebersichtAktiv = '';
$abschlussAktiv = '';

$warenkorbComplete = '';
$datenComplete = '';
$uebersichtComplete = '';
$abschlussComplete = '';

if (isset($_GET['produkteId'])) {
	$modulansicht = 'detail';
	
} elseif (isset($_GET['ansicht'])) {
	
	switch ($_GET['ansicht']) {
		
		case 'warenkorb':
			$modulansicht = 'warenkorb';
			$warenkorbAktiv = 'aktiv';
			break;
		
		case 'daten':
			$modulansicht = 'daten';
			$datenAktiv = 'aktiv';
			break;
			
		case 'uebersicht':
			$modulansicht = 'uebersicht';
			$uebersichtAktiv = 'aktiv';
			break;
			
		case 'abschluss':
			$modulansicht = 'kassa';
			$abschlussAktiv = 'aktiv';
			break;
	}

} else {
	$modulansicht = 'liste';
}


$warenkorbLink = 'index.php?ansicht=warenkorb';
$datenLink = 'index.php?ansicht=daten';
$abschlussLink = '';
$uebersichtLink = '';

if (isset($_SESSION['completeSteps']['warenkorb']) && $_SESSION['completeSteps']['warenkorb']) {
	$warenkorbComplete = 'complete';
}

if (isset($_SESSION['completeSteps']['daten']) && $_SESSION['completeSteps']['daten']) {
	$datenComplete = 'complete';
	$uebersichtLink = 'index.php?ansicht=uebersicht';
}

if (isset($_SESSION['completeSteps']['uebersicht']) && $_SESSION['completeSteps']['uebersicht']) {
	$uebersichtComplete = 'complete';
	$abschlussLink = 'index.php?ansicht=abschluss';
}

if (isset($_SESSION['completeSteps']['abschluss']) && $_SESSION['completeSteps']['abschluss']) {
	$abschlussComplete = 'complete';
}


if ($modulansicht != 'liste' && $modulansicht != 'detail') {

	
	
	
	echo '<div class="katalogSchritte">';
		echo '<ul class="stepsNavigation">';
			echo '<li class="step stepWarenkorb ' . $warenkorbAktiv . ' ' . $warenkorbComplete . '">';
				echo '<a href="' . $warenkorbLink . '">Warenkorb</a>';
				echo '<span class="arrow"></span>';
			echo '</li>';
			echo '<li class="step stepDaten ' . $datenAktiv . ' ' . $datenComplete . '">';
				echo '<a href="' . $datenLink. '">Dateneingabe</a>';
				echo '<span class="arrow"></span>';
			echo '</li>';
			echo '<li class="step stepUebersicht ' . $uebersichtAktiv . ' ' . $uebersichtComplete . '">';
				echo '<a href="' . $uebersichtLink . '">Übersicht</a>';
				echo '<span class="arrow"></span>';
			echo '</li>';
			echo '<li class="step stepAbschluss ' . $abschlussAktiv . ' ' . $abschlussComplete . '">';
				echo '<a href="' . $abschlussLink . '">Abschluss</a>';
				echo '<span class="arrow"></span>';
			echo '</li>';
		echo '</ul>';
		echo '<div class="clear"></div>';
	echo '</div>';
}

$katalogCmpFile = dirname(__FILE__) . '/katalog' . ucfirst($modulansicht) . 'Cmp.php';
if (file_exists($katalogCmpFile)) {
	include_once($katalogCmpFile);
}

if (isset($data['lagerbestaende']) && (count($data['lagerbestaende']) > 0)) {
	echo '<div id="lagerbestaende">';
	foreach ($data['lagerbestaende'] as $lagerbestand) {
		echo '<input type="hidden" data-produktid="' . $lagerbestand['produktId'] . '" data-variante="' . $lagerbestand['variante'] . '" data-option="' . $lagerbestand['varianteOption'] . '" data-lagerbestand="' . $lagerbestand['lagerbestand'] . '">';
	}
	echo '</div>';
}