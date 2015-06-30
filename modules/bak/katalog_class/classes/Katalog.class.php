<?php
class Katalog {
	var $settings;
	
	function __construct() {
		$this->produkte = idAsIndex(getRows('SELECT * FROM produkte WHERE online = 1'));
		$this->lagerbestaende = getRows('SELECT * FROM produktvarianten');
		
		foreach ($this->produkte as $produktEintragId => $produktEintrag) {
			$varianten = getRows('SELECT * FROM produktvarianten WHERE produktId = ' . $produktEintrag['id'] . ' ORDER BY id ASC');
			if ((isset($varianten)) && is_array($varianten) && (count($varianten) != 0)) {
				unset($variantenNew);
				foreach ($varianten as $varianteId => $variante) {
					$variantenNew[$variante['variante']]['entries'][] = $variante;
					$variantenNew[$variante['variante']]['optionList'][] = $variante['varianteOption'];
				}
				$this->produkte[$produktEintragId]['varianten'] = $variantenNew;
			}
		
		}
	}
	
	function getAnsicht() {
		if (isset($_GET['produkteId'])) {
			$modulansicht = 'detail';
		
		} elseif (isset($_GET['ansicht'])) {
		
			switch ($_GET['ansicht']) {
		
				case 'warenkorb':
					$modulansicht = 'warenkorb';
					break;
		
				case 'daten':
					$modulansicht = 'daten';
					break;
						
				case 'uebersicht':
					$modulansicht = 'uebersicht';
					break;
						
				case 'abschluss':
					$modulansicht = 'kassa';
					break;
			}
		
		} else {
			$modulansicht = 'liste';
		}
		
		return $modulansicht;
	}
	
	function prepareKatalog() {
		
	}
	
	function renderKatalog() {
		
	}
	
	function prepareAnsicht() {
		
	}
	
	function renderAnsicht() {
		
	}
	
	function getProdukt($id) {
		return $this->produkte[$id];
	}
	
	function renderProdukte() {
		if (isset($this->produkte) && count($this->produkte) > 0) {
			foreach ($this->produkte as $entry) {
				include dirname(__FILE__) . '/layouts/produktListe.php';
			}
		}
	}
	
	function addCart($produkt) {
		
	}
	
}