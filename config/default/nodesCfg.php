<?php
unset($table);
$table['name'] = 'nodes';
$table['label'] = 'Navigationspunkte';
$table['singular'] = 'Navigationspunkt';
$table['plural'] = 'Navigationspunkte';
$table['showTop'] = 1;
$table['icon'] = 'fa fa-outdent';
$table['topActions'] = 'tree';
$table['listActions'] = 'edit,copy,delete';
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
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['navigation'] = $field;

unset($field);
$field['name'] = 'seitenId';
$field['label'] = 'Seite';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['seitenId'] = $field;

unset($field);
$field['name'] = 'parentId';
$field['label'] = 'Parent';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['parentId'] = $field;

$main['tables']['nodes'] = $table;