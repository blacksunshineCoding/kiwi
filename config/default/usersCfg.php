<?php
unset($table);
$table['name'] = 'users';
$table['label'] = 'Benutzer';
$table['singular'] = 'Benutzer';
$table['plural'] = 'Benutzer';
$table['showTop'] = 1;
$table['icon'] = 'fa fa-users';
$table['topActions'] = 'all,new';
$table['listActions'] = 'edit,copy,delete';
$table['fields'] = array();

unset($field);
$field['name'] = 'id';
$field['label'] = 'Id';
$field['type'] = 'text';
$field['edit'] = 0;
$table['fields']['id'] = $field;

unset($field);
$field['name'] = 'benutzername';
$field['label'] = 'Benutzername';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['benutzername'] = $field;

unset($field);
$field['name'] = 'passwort';
$field['label'] = 'Passwort';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['passwort'] = $field;

$main['tables']['users'] = $table;