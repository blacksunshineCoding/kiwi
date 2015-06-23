<?php
$data['release'] = getRow('SELECT * FROM releases WHERE id = "' . sqlEscape($_GET['releasesId']) . '"');