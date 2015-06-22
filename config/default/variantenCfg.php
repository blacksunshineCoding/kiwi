<?php
unset($table);
$table['name'] = 'produktvarianten';
$table['label'] = 'Varianten';
$table['singular'] = 'Variante';
$table['plural'] = 'Varianten';
$table['showTop'] = 0;
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
$field['name'] = 'produktId';
$field['label'] = 'Produkt';
$field['type'] = 'text';
$field['edit'] = 0;
$table['fields']['produktId'] = $field;

unset($field);
$field['name'] = 'variante';
$field['label'] = 'Variante';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['variante'] = $field;

unset($field);
$field['name'] = 'varianteOption';
$field['label'] = 'Option';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['option'] = $field;

unset($field);
$field['name'] = 'lagerbestand';
$field['label'] = 'Lagerbestand';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['lagerbestand'] = $field;

$main['tables']['produktvarianten'] = $table;