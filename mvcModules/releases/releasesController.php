<?php
class releasesController {
	private $model;
	public $modulansicht;
	public $entryId;
	
	public function __construct($model) {
		$this->model = $model;
		
		if (isset($_GET['releasesId'])) {
			$modulansicht = 'detail';
			$this->entryId = $_GET['releasesId'];
			
		} elseif (isset($_GET['ansicht'])) {
			
			switch ($_GET['ansicht']) {
				
				case 'list':
					$modulansicht = 'liste';
					break;
					
				case 'detail':
					$modulansicht = 'detail';
					$this->entryId = $_GET['releasesId'];
					break;
			}
		
		} else {
			$modulansicht = 'liste';
		}
		
		$this->modulansicht = $modulansicht;
		
		if (isset($_GET['download']) && isset($this->entryId)) {
			$this->model->countDownload($this->model->entries[$this->entryId]['id']);
			$downloadUrl = 'uploads/' . getFileName($this->model->entries[$this->entryId]['datei'], 0);
			header('location:' . $downloadUrl);
			
		}
	}
}