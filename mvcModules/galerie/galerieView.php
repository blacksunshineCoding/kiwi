<?php
class galerieView {
	private $model;
	private $controller;

	public function __construct($controller,$model) {
		$this->controller = $controller;
		$this->model = $model;
	}
	 
	public function render() {
		$layoutFile = dirname(__FILE__) . '/layouts/' . $this->model->table['name'] . ucfirst($this->controller->modulansicht) . '.php';
		$entries = $this->model->entries;
		if (isset($this->controller->entryId) && !empty($this->controller->entryId)) $entry = $entries[$this->controller->entryId];
		if (file_exists($layoutFile)) {
			include_once $layoutFile;
		}
	}
}