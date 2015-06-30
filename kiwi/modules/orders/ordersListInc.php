<?php
$data['entries'] = $db->getRows('SELECT * FROM ' . $data['table']['name'] . ' ORDER BY ' . $data['table']['order']);