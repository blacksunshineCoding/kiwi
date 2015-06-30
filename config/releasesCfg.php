<?php
$table = new Table();
$table->name = 'releases';
$table->label = 'Releases';
$table->newLabel = 'Neuer Release';
$table->singular = 'Release';
$table->plural = 'Releases';
$table->icon = 'fa fa-download';
$table->topActions = '';
$table->sideActions = 'all,new';
$table->listActions = 'edit,copy,delete';
$table->order = 'position, id ASC';
$table->icons['all'] = 'fa fa-download';
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
$field->name = 'position';
$field->label = 'Position';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'interpret';
$field->label = 'Interpret';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'tracklist';
$field->label = 'Tracklist';
$field->type = 'textarea';
$table->add($field);

$field = new Field();
$field->name = 'bild';
$field->label = 'Bild';
$field->type = 'file';
$table->add($field);

$field = new Field();
$field->name = 'datei';
$field->label = 'Datei';
$field->type = 'file';
$table->add($field);

$field = new Field();
$field->name = 'downloads';
$field->label = 'Downloads';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'online';
$field->label = 'Online';
$field->type = 'select';
$field->optionNameList = 'ja,nein';
$field->optionValueList = '1,0';
$field->optionDefaultValue = 1;
$table->add($field);

$main['tables']['releases'] = $table->get();