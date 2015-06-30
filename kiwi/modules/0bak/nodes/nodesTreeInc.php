<?php
$data['entries'] = getRows('SELECT * FROM nodes');
$data['navigations'] = prepareNodes($data['entries']);