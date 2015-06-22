<?php
unset($table);
$table['name'] = 'orders';
$table['label'] = 'Bestellungen';
$table['singular'] = 'Bestellung';
$table['plural'] = 'Bestellungen';
$table['showTop'] = 1;
$table['onlyMinList'] = 1;
$table['icon'] = 'fa fa-outdent';
$table['minFieldList'] = 'bestellnummer,vorname,nachname,zahlungErhalten,versendet,bestelldatum';
$table['topActions'] = '';
$table['sideActions'] = 'all';
$table['listActions'] = 'edit,delete';
$table['icons']['all'] = 'fa fa-list';
$table['icons']['new'] = 'fa fa-plus-square';
$table['fields'] = array();

unset($field);
$field['name'] = 'id';
$field['label'] = 'Id';
$field['type'] = 'text';
$field['edit'] = 0;
$table['fields']['id'] = $field;

unset($field);
$field['name'] = 'bestellnummer';
$field['label'] = 'Bestellnummer';
$field['type'] = 'text';
$field['edit'] = 0;
$table['fields']['bestellnummer'] = $field;

unset($field);
$field['name'] = 'vorname';
$field['label'] = 'Vorname';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['vorname'] = $field;

unset($field);
$field['name'] = 'nachname';
$field['label'] = 'Nachname';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['nachname'] = $field;

unset($field);
$field['name'] = 'strasse';
$field['label'] = 'Straße';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['strasse'] = $field;

unset($field);
$field['name'] = 'hausnummer';
$field['label'] = 'Hausnummer';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['hausnummer'] = $field;

unset($field);
$field['name'] = 'adresszusatz';
$field['label'] = 'Adresszusatz';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['adresszusatz'] = $field;

unset($field);
$field['name'] = 'plz';
$field['label'] = 'PLZ';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['plz'] = $field;

unset($field);
$field['name'] = 'ort';
$field['label'] = 'Ort';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['ort'] = $field;

unset($field);
$field['name'] = 'land';
$field['label'] = 'Land';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['land'] = $field;

unset($field);
$field['name'] = 'emailadresse';
$field['label'] = 'Emailadresse';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['emailadresse'] = $field;

unset($field);
$field['name'] = 'anmerkung';
$field['label'] = 'Anmerkung';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['anmerkung'] = $field;

unset($field);
$field['name'] = 'produktGesamtPreis';
$field['label'] = 'Produktgesamtpreis';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['produktGesamtPreis'] = $field;

unset($field);
$field['name'] = 'versandkosten';
$field['label'] = 'Versandkosten';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['versandkosten'] = $field;

unset($field);
$field['name'] = 'gesamtpreis';
$field['label'] = 'Gesamtpreis';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['gesamtpreis'] = $field;

unset($field);
$field['name'] = 'zahlungsmethode';
$field['label'] = 'Zahlungsmethode';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['zahlungsmethode'] = $field;

unset($field);
$field['name'] = 'versandmethode';
$field['label'] = 'Versandmethode';
$field['type'] = 'text';
$field['edit'] = 1;
$table['fields']['versandmethode'] = $field;

unset($field);
$field['name'] = 'zahlungErhalten';
$field['label'] = 'Zahlung erhalten';
$field['type'] = 'select';
$field['optionNameList'] = 'ja,nein';
$field['optionValueList'] = '1,0';
$field['optionDefaultValue'] = 0;
$field['showNameInList'] = 1;
$field['edit'] = 1;
$table['fields']['zahlungErhalten'] = $field;

unset($field);
$field['name'] = 'versendet';
$field['label'] = 'Produkte versendet';
$field['type'] = 'select';
$field['optionNameList'] = 'ja,nein';
$field['optionValueList'] = '1,0';
$field['optionDefaultValue'] = 0;
$field['showNameInList'] = 1;
$field['edit'] = 1;
$table['fields']['versendet'] = $field;

unset($field);
$field['name'] = 'bestelldatum';
$field['label'] = 'Bestelldatum';
$field['type'] = 'text';
$field['edit'] = 0;
$table['fields']['bestelldatum'] = $field;

unset($field);
$field['name'] = 'zahlungsdatum';
$field['label'] = 'Zahlungsdatum';
$field['type'] = 'text';
$field['edit'] = 0;
$table['fields']['zahlungsdatum'] = $field;

unset($field);
$field['name'] = 'versanddatum';
$field['label'] = 'Versanddatum';
$field['type'] = 'text';
$field['edit'] = 0;
$table['fields']['versanddatum'] = $field;

unset($field);
$field['name'] = 'produkte';
$field['label'] = 'bestellte Produkte';
$field['type'] = 'textarea';
$field['edit'] = 1;
$table['fields']['produkte'] = $field;

$main['tables']['orders'] = $table;