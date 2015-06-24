<?php
$table = new Table();
$table->name = 'galeriebilder';
$table->label = 'Galerie';
$table->singular = 'Galeriebild';
$table->plural = 'Galeriebilder';
$table->showTop = 1;
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
$field->name = 'position';
$field->label = 'Position';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'produktId';
$field->label = 'Produktzuordnung';
$field->type = 'select';
$field->optionNameList = getOptionNameListViaSelect('titel', 'produkte', 'id ASC', true, '---');
$field->optionValueList = getOptionValueListViaSelect('id', 'produkte', 'id ASC', true, 0);
$field->optionDefaultValue = 0;
$table->add($field);

$main['tables']['galeriebilder'] = $table->get();