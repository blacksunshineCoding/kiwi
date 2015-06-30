<?php
$table = new Table();
$table->name = 'settings';
$table->label = 'Einstellungen';
$table->newLabel = 'Neue Einstellung';
$table->singular = 'Einstellung';
$table->plural = 'Einstellungen';
$table->icon = 'fa fa-cogs';
$table->topActions = '';
$table->sideActions = 'all,new';
$table->listActions = 'edit';
$table->order = 'id ASC';
$table->icons['all'] = 'fa fa-cogs';
$table->icons['new'] = 'fa fa-plus-square';

$field = new Field();
$field->name = 'id';
$field->label = 'Id';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'name';
$field->label = 'Name';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'titel';
$field->label = 'Titel';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'wert';
$field->label = 'Wert';
$field->type = 'text';
$table->add($field);

$main['tables']['settings'] = $table->get();