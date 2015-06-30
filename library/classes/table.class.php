<?php
class Table {
	var $name;
	var $label;
	var $singular;
	var $plural;
	var $showTop = 1;
	var $onlyMinList = 0;
	var $minFieldList;
	var $icon;
	var $topActions;
	var $sideActions;
	var $listActions;
	var $icons;
	var $childtableList;
	var $childtables;
	var $fields = array();
	
	function add($field) {
		$field = (array) $field;
		$this->fields[$field['name']] = $field;
	}
	
	function get() {
		$table = (array) $this;
		return $table;
	}
}