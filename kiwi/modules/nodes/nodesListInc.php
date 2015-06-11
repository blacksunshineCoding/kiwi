<?php
$data['entries'] = getRows('SELECT * FROM nodes ORDER BY navigation ASC, position ASC, id ASC');