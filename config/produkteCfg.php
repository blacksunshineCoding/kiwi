<?php
$table = new Table();
$table->name = 'produkte';
$table->label = 'Produkte';
$table->newLabel = 'Neues Produkt';
$table->singular = 'Produkt';
$table->plural = 'Produkte';
$table->icon = 'fa fa-inbox';
$table->topActions = '';
$table->sideActions = 'all,new';
$table->listActions = 'edit,copy,delete';
$table->icons['all'] = 'fa fa-inbox';
$table->icons['new'] = 'fa fa-plus-square';
$table->order = 'position, id ASC';
$table->childtableList = 'produktvarianten';
$table->childtables['produktvarianten']['parentIdField'] = 'produktId';

$field = new Field();
$field->name = 'id';
$field->label = 'Id';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'artikelnummer';
$field->label = 'Artikelnummer';
$field->type = 'text';
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
$field->name = 'text';
$field->label = 'Text';
$field->type = 'textarea';
$table->add($field);

$field = new Field();
$field->name = 'optionen';
$field->label = 'Optionen';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'preis';
$field->label = 'Preis';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'bild';
$field->label = 'Bild';
$field->type = 'file';
$table->add($field);

$field = new Field();
$field->name = 'produktkategorieId';
$field->label = 'Kategorie';
$field->type = 'select';
$field->optionNameList = getOptionNameListViaSelect('titel', 'produktkategorien', 'id ASC', true, '---');
$field->optionValueList = getOptionValueListViaSelect('id', 'produktkategorien', 'id ASC', true, 0);
$field->optionDefaultValue = 0;
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

$main['tables']['produkte'] = $table->get();