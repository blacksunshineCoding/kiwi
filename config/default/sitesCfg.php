<?php
unset($table);
$table['name'] = 'sites';
$table['label'] = 'Seiten';
$table['singular'] = 'Seite';
$table['plural'] = 'Seiten';
$table['showTop'] = 1;
$table['icon'] = 'fa fa-outdent';
$table['topActions'] = 'new';
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
$field['name'] = 'text';
$field['label'] = 'Text';
$field['type'] = 'textarea';
$field['edit'] = 1;
$table['fields']['text'] = $field;

unset($field);
$field['name'] = 'module';
$field['label'] = 'Modul';
$field['type'] = 'select';
$field['optionNameList'] = '---,Produktkatalog';
$field['optionValueList'] = '0,modules/katalog/katalog';
$field['optionDefaultValue'] = '0';
$field['edit'] = 1;
$table['fields']['module'] = $field;

$main['tables']['sites'] = $table;