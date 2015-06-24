<?php
$table = new Table();
$table->name = 'sites';
$table->label = 'Seiten';
$table->singular = 'Seite';
$table->plural = 'Seiten';
$table->icon = 'fa fa-outdent';
$table->topActions = '';
$table->sideActions = 'all,new';
$table->listActions = 'edit,copy,delete';
$table->icons['all'] = 'fa fa-list';
$table->icons['new'] = 'fa fa-plus-square';

$field = new Field();
$field->name = 'id';
$field->label = 'Id';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'home';
$field->label = 'Startseite';
$field->type = 'select';
$field->optionNameList = 'ja,nein';
$field->optionValueList = '1,0';
$field->optionDefaultValue = 0;
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
$field->name = 'klasse';
$field->label = 'Klasse';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'text';
$field->label = 'Text';
$field->type = 'richtextarea';
$table->add($field);

$field = new Field();
$field->name = 'module';
$field->label = 'Modul';
$field->type = 'select';
$field->optionNameList = '---,Produktkatalog,Releases,Galerie';
$field->optionValueList = '0,modules/katalog/katalog,modules/releases/releases,modules/galeriebilder/galeriebilder';
$field->optionDefaultValue = '0';
$table->add($field);

$main['tables']['sites'] = $table->get();