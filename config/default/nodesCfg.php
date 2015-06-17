<?php
unset($table);
$table['name'] = 'nodes';
$table['label'] = 'Navigationspunkte';
$table['singular'] = 'Navigationspunkt';
$table['plural'] = 'Navigationspunkte';
$table['showTop'] = 1;
$table['icon'] = 'fa fa-outdent';
$table['topActions'] = '';
$table['sideActions'] = 'all,tree,new';
$table['listActions'] = 'edit,copy,delete';
$table['icons']['all'] = 'fa fa-list';
$table['icons']['new'] = 'fa fa-plus-square';
$table['icons']['tree'] = 'fa fa-outdent';
$table['fields'] = array();

unset($field);
$field['name'] = 'id';
$field['label'] = 'Id';
$field['type'] = 'text';
$field['edit'] = 0;
$table['fields']['id'] = $field;

unset($field);
$field['name'] = 'name';
$field['label'] = 'Name';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['name'] = $field;

unset($field);
$field['name'] = 'titel';
$field['label'] = 'Titel';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['titel'] = $field;

unset($field);
$field['name'] = 'klasse';
$field['label'] = 'Klasse';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['klasse'] = $field;

unset($field);
$field['name'] = 'position';
$field['label'] = 'Position';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['position'] = $field;

unset($field);
$field['name'] = 'navigation';
$field['label'] = 'Navigation';
$field['type'] = 'select';
$field['optionNameList'] = 'hauptnavigation,servicenavigation';
$field['optionValueList'] = 'hauptnavigation,servicenavigation';
$field['optionDefaultValue'] = 'hauptnavigation';
$field['edit'] = 1;
$table['fields']['navigation'] = $field;

unset($field);
$field['name'] = 'typ';
$field['label'] = 'Typ';
$field['type'] = 'select';
$field['optionNameList'] = 'Seite,URL';
$field['optionValueList'] = 'site,url';
$field['optionDefaultValue'] = 'site';
$field['edit'] = 1;
$table['fields']['typ'] = $field;

unset($field);
$field['name'] = 'seitenId';
$field['label'] = 'Seite';
$field['type'] = 'select';
$field['optionNameList'] = getOptionNameListViaSelect('titel', 'sites', 'id ASC', true, '---');
$field['optionValueList'] = getOptionValueListViaSelect('id', 'sites', 'id ASC', true, 0);
$field['optionDefaultValue'] = 0;
$field['edit'] = 1;
$table['fields']['seitenId'] = $field;

unset($field);
$field['name'] = 'url';
$field['label'] = 'Link';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['url'] = $field;

unset($field);
$field['name'] = 'parentId';
$field['label'] = 'Parent';
$field['type'] = 'select';
$field['optionNameList'] = getOptionNameListViaSelect('titel', $table['name'], 'id ASC', true, '---');
$field['optionValueList'] = getOptionValueListViaSelect('id', $table['name'], 'id ASC', true, 0);
$field['optionDefaultValue'] = 0;
$field['edit'] = 1;
$table['fields']['parentId'] = $field;

$main['tables']['nodes'] = $table;