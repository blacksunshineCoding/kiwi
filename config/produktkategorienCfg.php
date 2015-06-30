<?php
$table = new Table();
$table->name = 'produktkategorien';
$table->label = 'Produktkategorien';
$table->newLabel = 'Neue Produktkategorie';
$table->singular = 'Produktkategorie';
$table->plural = 'Produktkategorien';
$table->icon = 'fa fa-th-large';
$table->topActions = '';
$table->sideActions = 'all,new';
$table->listActions = 'edit,copy,delete';
$table->order = 'id ASC';
$table->icons['all'] = 'fa fa-th-large';
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
$field->name = 'online';
$field->label = 'Online';
$field->type = 'select';
$field->optionNameList = 'ja,nein';
$field->optionValueList = '1,0';
$field->optionDefaultValue = 1;
$table->add($field);

$main['tables']['produktkategorien'] = $table->get();