<?php
unset($table);
$table['name'] = 'produkte';
$table['label'] = 'Produkte';
$table['singular'] = 'Produkt';
$table['plural'] = 'Produkte';
$table['showTop'] = 1;
$table['icon'] = 'fa fa-outdent';
$table['topActions'] = '';
$table['sideActions'] = 'all,new';
$table['listActions'] = 'edit,copy,delete';
$table['icons']['all'] = 'fa fa-list';
$table['icons']['new'] = 'fa fa-plus-square';
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
$field['name'] = 'text';
$field['label'] = 'Text';
$field['type'] = 'textarea';
$field['edit'] = 1;
$table['fields']['text'] = $field;

unset($field);
$field['name'] = 'optionen';
$field['label'] = 'Optionen';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['optionen'] = $field;

unset($field);
$field['name'] = 'preis';
$field['label'] = 'Preis';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['preis'] = $field;

unset($field);
$field['name'] = 'bild';
$field['label'] = 'Bild';
$field['type'] = 'file';
$field['edit'] = 1;
$table['fields']['bild'] = $field;

unset($field);
$field['name'] = 'produktkategorieId';
$field['label'] = 'Produktkategorie';
$field['type'] = 'select';
$field['optionNameList'] = getOptionNameListViaSelect('titel', 'produktkategorien', 'id ASC', true, '---');
$field['optionValueList'] = getOptionValueListViaSelect('id', 'produktkategorien', 'id ASC', true, 0);
$field['optionDefaultValue'] = 0;
$field['edit'] = 1;
$table['fields']['produktkategorieId'] = $field;

unset($field);
$field['name'] = 'online';
$field['label'] = 'Online';
$field['type'] = 'select';
$field['optionNameList'] = 'ja,nein';
$field['optionValueList'] = '1,0';
$field['optionDefaultValue'] = 1;
$field['edit'] = 1;
$table['fields']['online'] = $field;

$main['tables']['produkte'] = $table;