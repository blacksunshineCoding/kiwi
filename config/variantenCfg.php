<?php
$table = new Table();
$table->name = 'produktvarianten';
$table->label = 'Varianten';
$table->singular = 'Variante';
$table->plural = 'Varianten';
$table->icon = 'fa fa-outdent';
$table->showTop = 0;
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
$field->name = 'produktId';
$field->label = 'Produkt';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'variante';
$field->label = 'Variante';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'varianteOption';
$field->label = 'Option';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'lagerbestand';
$field->label = 'Lagerbestand';
$field->type = 'text';
$table->add($field);

$main['tables']['produktvarianten'] = $table->get();