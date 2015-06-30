<?php
$table = new Table();
$table->name = 'users';
$table->label = 'Benutzer';
$table->newLabel = 'Neuer Benutzer';
$table->singular = 'Benutzer';
$table->plural = 'Benutzer';
$table->icon = 'fa fa-users';
$table->topActions = 'all,new';
$table->sideActions = 'all,new';
$table->listActions = 'edit,copy,delete';
$table->order = 'id ASC';
$table->icons['all'] = 'fa fa-users';
$table->icons['new'] = 'fa fa-user-plus';

$field = new Field();
$field->name = 'id';
$field->label = 'Id';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'benutzername';
$field->label = 'Benutzername';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'passwort';
$field->label = 'Passwort';
$field->type = 'text';
$table->add($field);

$main['tables']['users'] = $table->get();