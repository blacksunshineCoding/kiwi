<?php
unset($table);
$table['name'] = 'galeriebilder';
$table['label'] = 'Galerie';
$table['singular'] = 'Galeriebild';
$table['plural'] = 'Galeriebilder';
$table['showTop'] = 1;
$table['icon'] = 'fa fa-outdent';
$table['topActions'] = '';
$table['sideActions'] = 'all,new';
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
$field['name'] = 'titel';
$field['label'] = 'Titel';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['titel'] = $field;

unset($field);
$field['name'] = 'kurztext';
$field['label'] = 'Kurztext';
$field['type'] = 'textarea';
$field['edit'] = 1;
$table['fields']['kurztext'] = $field;

unset($field);
$field['name'] = 'bild';
$field['label'] = 'Bild';
$field['type'] = 'file';
$field['edit'] = 1;
$table['fields']['bild'] = $field;

unset($field);
$field['name'] = 'position';
$field['label'] = 'Position';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['position'] = $field;

unset($field);
$field['name'] = 'produktId';
$field['label'] = 'Produktzuordnung';
$field['type'] = 'select';
$field['optionNameList'] = getOptionNameListViaSelect('titel', 'produkte', 'id ASC', true, '---');
$field['optionValueList'] = getOptionValueListViaSelect('id', 'produkte', 'id ASC', true, 0);
$field['optionDefaultValue'] = 0;
$field['edit'] = 1;
$table['fields']['produktId'] = $field;

$main['tables']['galeriebilder'] = $table;