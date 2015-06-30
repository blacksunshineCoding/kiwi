<?php
$table = new Table();
$table->name = 'galeriebilder';
$table->label = 'Galerie';
$table->newLabel = 'Neues Galeriebild';
$table->singular = 'Galeriebild';
$table->plural = 'Galeriebilder';
$table->showTop = 1;
$table->icon = 'fa fa-picture-o';
$table->topActions = '';
$table->sideActions = 'all,new';
$table->listActions = 'edit,copy,delete';
$table->order = 'position, id ASC';
$table->icons['all'] = 'fa fa-picture-o';
$table->icons['new'] = 'fa fa-plus-square';

$field = new Field();
$field->name = 'id';
$field->label = 'Id';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'titel';
$field->label = 'Titel';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'kurztext';
$field->label = 'Kurztext';
$field->type = 'textarea';
$table->add($field);

$field = new Field();
$field->name = 'bild';
$field->label = 'Bild';
$field->type = 'file';
$table->add($field);

$field = new Field();
$field->name = 'produktId';
$field->label = 'Produktzuordnung';
$field->type = 'select';
$field->optionNameList = getOptionNameListViaSelect('titel', 'produkte', 'id ASC', true, '---');
$field->optionValueList = getOptionValueListViaSelect('id', 'produkte', 'id ASC', true, 0);
$field->optionDefaultValue = 0;
$table->add($field);

$field = new Field();
$field->name = 'views';
$field->label = 'Aufrufe';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'position';
$field->label = 'Position';
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

$main['tables']['galeriebilder'] = $table->get();