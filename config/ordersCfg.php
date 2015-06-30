<?php
$table = new Table();
$table->name = 'orders';
$table->label = 'Bestellungen';
$table->newLabel = 'Neue Bestellung';
$table->singular = 'Bestellung';
$table->plural = 'Bestellungen';
$table->onlyMinList = 1;
$table->icon = 'fa fa-shopping-cart';
$table->minFieldList = 'bestellnummer,vorname,nachname,zahlungErhalten,versendet,bestelldatum';
$table->topActions = '';
$table->sideActions = 'all';
$table->listActions = 'edit,delete';
$table->order = 'id ASC';
$table->icons['all'] = 'fa fa-shopping-cart';
$table->icons['new'] = 'fa fa-plus-square';
$table->fields = array();

$field = new Field();
$field->name = 'id';
$field->label = 'Id';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'bestellnummer';
$field->label = 'Bestellnummer';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'vorname';
$field->label = 'Vorname';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'nachname';
$field->label = 'Nachname';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'strasse';
$field->label = 'Straße';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'hausnummer';
$field->label = 'Hausnummer';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'adresszusatz';
$field->label = 'Adresszusatz';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'plz';
$field->label = 'PLZ';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'ort';
$field->label = 'Ort';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'land';
$field->label = 'Land';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'emailadresse';
$field->label = 'Emailadresse';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'anmerkung';
$field->label = 'Anmerkung';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'produktGesamtPreis';
$field->label = 'Produktgesamtpreis';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'versandkosten';
$field->label = 'Versandkosten';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'gesamtpreis';
$field->label = 'Gesamtpreis';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'zahlungsmethode';
$field->label = 'Zahlungsmethode';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'versandmethode';
$field->label = 'Versandmethode';
$field->type = 'text';
$table->add($field);

$field = new Field();
$field->name = 'zahlungErhalten';
$field->label = 'Zahlung erhalten';
$field->type = 'select';
$field->optionNameList = 'ja,nein';
$field->optionValueList = '1,0';
$field->optionDefaultValue = 0;
$field->showNameInList = 1;
$table->add($field);

$field = new Field();
$field->name = 'versendet';
$field->label = 'Produkte versendet';
$field->type = 'select';
$field->optionNameList = 'ja,nein';
$field->optionValueList = '1,0';
$field->optionDefaultValue = 0;
$field->showNameInList = 1;
$table->add($field);

$field = new Field();
$field->name = 'bestelldatum';
$field->label = 'Bestelldatum';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'zahlungsdatum';
$field->label = 'Zahlungsdatum';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'versanddatum';
$field->label = 'Versanddatum';
$field->type = 'text';
$field->edit = 0;
$table->add($field);

$field = new Field();
$field->name = 'produkte';
$field->label = 'bestellte Produkte';
$field->type = 'textarea';
$table->add($field);

$main['tables']['orders'] = $table->get();