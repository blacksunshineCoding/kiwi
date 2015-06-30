<?php
$data['entries'] = $db->getRows('SELECT * FROM ' . $data['table']['name']);
$data['navigations'] = prepareNodes($data['entries']);