<?php
unset($table);
$table['name'] = 'produktkategorien';
$table['label'] = 'Produktkategorien';
$table['singular'] = 'Produktkategorie';
$table['plural'] = 'Produktkategorien';
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
$field['name'] = 'online';
$field['label'] = 'Online';
$field['type'] = 'select';
$field['optionNameList'] = 'ja,nein';
$field['optionValueList'] = '1,0';
$field['optionDefaultValue'] = 1;
$field['edit'] = 1;
$table['fields']['online'] = $field;

$main['tables']['produktkategorien'] = $table;