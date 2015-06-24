<?php
$table = new Table();
$table->name = 'nodes';
$table->label = 'Navigationspunkte';
$table->singular = 'Navigationspunkt';
$table->plural = 'Navigationspunkte';
$table->icon = 'fa fa-outdent';
$table->topActions = '';
$table->sideActions = 'all,tree,new';
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
$field->name = 'klasse';
$field->label = 'Klasse';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'position';
$field->label = 'Position';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'navigation';
$field->label = 'Navigation';
$field->type = 'select';
$field->optionNameList = 'hauptnavigation,servicenavigation';
$field->optionValueList = 'hauptnavigation,servicenavigation';
$field->optionDefaultValue = 'hauptnavigation';
$table->add($field);

$field = new Field();
$field->name = 'typ';
$field->label = 'Typ';
$field->type = 'select';
$field->optionNameList = 'Seite,URL';
$field->optionValueList = 'site,url';
$field->optionDefaultValue = 'site';
$table->add($field);

$field = new Field();
$field->name = 'seitenId';
$field->label = 'Seite';
$field->type = 'select';
$field->optionNameList = getOptionNameListViaSelect('titel', 'sites', 'id ASC', true, '---');
$field->optionValueList = getOptionValueListViaSelect('id', 'sites', 'id ASC', true, 0);
$field->optionDefaultValue = 0;
$table->add($field);

$field = new Field();
$field->name = 'url';
$field->label = 'Link';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'parentId';
$field->label = 'Parent';
$field->type = 'select';
$field->optionNameList = getOptionNameListViaSelect('titel', $table->name, 'id ASC', true, '---');
$field->optionValueList = getOptionValueListViaSelect('id', $table->name, 'id ASC', true, 0);
$field->optionDefaultValue = 0;
$table->add($field);

$main['tables']['nodes'] = $table->get();