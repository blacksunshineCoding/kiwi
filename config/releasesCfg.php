<?php
$table = new Table();
$table->name = 'releases';
$table->label = 'Releases';
$table->singular = 'Release';
$table->plural = 'Releases';
$table->icon = 'fa fa-outdent';
$table->topActions = '';
$table->sideActions = 'all,new';
$table->listActions = 'edit,copy,delete';
$table->icons['all'] = 'fa fa-list';
$table->icons['new'] = 'fa fa-plus-square';
$table->icons['tree'] = 'fa fa-outdent';

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

$main['tables']['releases'] = $table->get();