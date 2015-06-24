<?php

$data['produkte'] = idAsIndex(getRows('SELECT * FROM produkte'));

$data['vornameClass'] = '';
$data['nachnameClass'] = '';
$data['strasseClass'] = '';
$data['hausnummerClass'] = '';
$data['adresszusatzClass'] = '';
$data['plzClass'] = '';
$data['ortClass'] = '';
$data['landClass'] = '';