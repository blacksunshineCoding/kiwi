<?php
class galerieController {
	private $model;
	public $modulansicht;
	public $entryId;
	
	public function __construct($model) {
		$this->model = $model;
		
		if (isset($_GET['galeriebilderId'])) {
			$modulansicht = 'detail';
			$this->model->countViews($_GET['galeriebilderId']);
			
		} elseif (isset($_GET['ansicht'])) {
			
			switch ($_GET['ansicht']) {
				
				case 'list':
					$modulansicht = 'liste';
					break;
					
				case 'detail':
					$modulansicht = 'detail';
					break;
			}
		
		} else {
			$modulansicht = 'liste';
		}
		
		$this->modulansicht = $modulansicht;
		
	}
}