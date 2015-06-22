<?php
unset($table);
$table['name'] = 'releases';
$table['label'] = 'Releases';
$table['singular'] = 'Release';
$table['plural'] = 'Releases';
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
$field['name'] = 'position';
$field['label'] = 'Position';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['position'] = $field;

unset($field);
$field['name'] = 'interpret';
$field['label'] = 'Interpret';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['interpret'] = $field;

unset($field);
$field['name'] = 'tracklist';
$field['label'] = 'Tracklist';
$field['type'] = 'textarea';
$field['edit'] = 1;
$table['fields']['tracklist'] = $field;

unset($field);
$field['name'] = 'bild';
$field['label'] = 'Bild';
$field['type'] = 'file';
$field['edit'] = 1;
$table['fields']['bild'] = $field;

unset($field);
$field['name'] = 'datei';
$field['label'] = 'Datei';
$field['type'] = 'file';
$field['edit'] = 1;
$table['fields']['datei'] = $field;

$main['tables']['releases'] = $table;