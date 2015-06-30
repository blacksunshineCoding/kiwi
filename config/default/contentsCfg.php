<?php
$table = new Table();
$table->name = 'contents';
$table->label = 'Inhalte';
$table->newLabel = 'Neuer Inhalt';
$table->singular = 'Inhalt';
$table->plural = 'Inhalte';
$table->icon = 'fa fa-puzzle-piece';
$table->topActions = '';
$table->sideActions = 'all';
$table->listActions = 'edit,copy,delete';
$table->order = 'id ASC';
$table->icons['all'] = 'fa fa-puzzle-piece';
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
$field->name = 'layout';
$field->label = 'Layout';
$field->type = 'radio';
$field->optionNameList = '1,2,3,4,5,6';
$field->optionValueList = '1,2,3,4,5,6';
$field->optionDefaultValue = '1';
$table->add($field);

$field = new Field();
$field->name = 'text';
$field->label = 'Text';
$field->type = 'richtextarea';
$table->add($field);

$field = new Field();
$field->name = 'textbreite';
$field->label = 'Textbreite';
$field->type = 'select';
$field->optionNameList = '1,2,3,4,5,6,7,8,9,10,11,12';
$field->optionValueList = '1,2,3,4,5,6,7,8,9,10,11,12';
$field->optionDefaultValue = '12';
$table->add($field);

$field = new Field();
$field->name = 'bilderbreite';
$field->label = 'Bilderbreite';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'bilderhoehe';
$field->label = 'Bilderhöhe';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'klasse';
$field->label = 'Klasse';
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

$field = new Field();
$field->name = 'parentId';
$field->label = 'Mutter ID';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'parentTable';
$field->label = 'Mutter Table';
$field->type = 'text';
$table->add($field);

$main['tables']['contents'] = $table->get();